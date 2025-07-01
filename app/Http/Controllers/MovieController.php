<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Genres;
use App\Models\Movie;
use App\Models\Notification;
use App\Models\Video_Quality;
use App\Services\FirebaseService;
use App\Services\Queue\Producers\SocketProducer;
use App\Services\Queue\Producers\VideoProducer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    protected FirebaseService $firebaseService;
    protected VideoProducer $videoProducer;

    public function __construct(FirebaseService $firebaseService, VideoProducer $videoProducer)
    {
        $this->videoProducer = $videoProducer;
        $this->firebaseService = $firebaseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all()->sortByDesc('id');
        return view('movies.index', compact('movies'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $categories = Category::all();
        $selectedCategories = $movie->categories->pluck('id')->toArray();
        $genres = Genres::all();
        $selectedGenres = $movie->genres->pluck('id')->toArray();
        return view('movies.show', compact('movie', 'categories', 'genres', 'selectedCategories', 'selectedGenres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = new Movie();
        $categories = Category::all();
        $genres = Genres::all();
        return view('movies.create', compact('movie', 'categories', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(MovieRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);
            $categoryIds = $request->input('categories');
            $genreIds = $request->input('genres');
            $syncCategoryData = [];
            $syncGenreData = [];

            foreach ($categoryIds as $categoryId) {
                $syncCategoryData[$categoryId] = ['target_type' => Movie::CONTENT_TARGET_TYPE_MOVIE];
            }
            foreach ($genreIds as $genreId) {
                $syncGenreData[$genreId] = ['target_type' => Movie::CONTENT_TARGET_TYPE_MOVIE];
            }

            $model = new Movie();
            $model->fill($data);
            $model->uuid = Str::uuid()->toString();
            $model->slug = Str::slug($model->title);
            $model->save();
            $model->categories()->attach($syncCategoryData);
            $model->genres()->attach($syncGenreData);
            $model->videoQualities()->createMany([
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::QUALITY_1080P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::QUALITY_720P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::QUALITY_480P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::MASTER_QUALITY,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::MASTER_QUALITY_720P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'quality' => Video_Quality::MASTER_QUALITY_480P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ]
            ]);
            $tempPath = $request->input('temp_path');
            if (!empty($tempPath)) {
                $this->videoProducer->processVideo([
                    'id' => $model->id,
                    'title' => $model->title,
                    'content_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'slug' => $model->slug,
                    'uuid' => $model->uuid,
                    'tempPath' => $tempPath,
                ]);
            }
            DB::commit();
            return redirect()->route('movies.index')->with('success', 'Tạo phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tạo phim thất bại: ' . $e->getMessage());
        }
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        $selectedCategories = $movie->categories->pluck('id')->toArray();
        $genres = Genres::all();
        $selectedGenres = $movie->genres->pluck('id')->toArray();
        return view('movies.edit', compact('movie', 'categories', 'genres', 'selectedCategories', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie){
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);
            $categoryIds = $request->input('categories', []);
            $genreIds = $request->input('genres', []);
            $syncCategoryData = [];
            $syncGenreData = [];

            foreach ($categoryIds as $categoryId) {
                $syncCategoryData[$categoryId] = ['target_type' => Movie::CONTENT_TARGET_TYPE_MOVIE];
            }
            foreach ($genreIds as $genreId) {
                $syncGenreData[$genreId] = ['target_type' => Movie::CONTENT_TARGET_TYPE_MOVIE];
            }

            $movie->update($data);

            $movie->categories()->sync($syncCategoryData);
            $movie->genres()->sync($syncGenreData);

            $tempPath = $request->input('temp_path');
            if (!empty($tempPath)) {
                $movie->videoQualities()->update([
                    'status' => Video_Quality::STATUS_PROCESSING
                ]);
                $this->videoProducer->processVideo([
                    'id' => $movie->id,
                    'title' => $movie->title,
                    'content_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
                    'slug' => $movie->slug,
                    'uuid' => $movie->uuid,
                    'tempPath' => $tempPath,
                ]);
            }
            DB::commit();
            return redirect()->route('movies.index')->with('success', 'Cập nhật phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật phim thất bại: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        DB::beginTransaction();
        try {
            $this->videoProducer->processVideo([
                'id' => $movie->id,
                'uuid' => $movie->uuid,
                'content_type' => Movie::CONTENT_TARGET_TYPE_MOVIE,
            ], VideoProducer::PROCESSING_TYPE_REVERT);
            $movie->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa phim thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            dd($exception->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa phim thất bại: ' . $exception->getMessage()
            ]);
        }
    }

    public function updateStatus($id, Request $request)
    {
        $movie = Movie::find($id);
        $status = $request->get('status');
        return $this->changeStatus($movie, $status);
    }
}
