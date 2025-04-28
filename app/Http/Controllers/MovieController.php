<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Jobs\ProcessVideoJob;
use App\Models\Movie;
use App\Services\FirebaseService;
use App\Services\Queue\Producers\VideoProducer;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    protected $firebaseService;
    protected $videoProducer;

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
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = new Movie();
        return view('movies.create', compact('movie'));
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

            $model->save();
            $model->categories()->attach($syncCategoryData);
            $model->genres()->attach($syncGenreData);
            $this->videoProducer->processVideo([
                'id' => $model->id,
                'title' => $model->title,
                'temp_path' => $request->input('temp_path')
            ]);
            DB::commit();
            return redirect()->route('movies.index')->with('success', 'Tạo phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Tạo phim thất bại: ' . $e->getMessage());
        }
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        DB::beginTransaction();
        try {
            $movie->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa phim thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa phim thất bại: ' . $exception->getMessage()
            ]);
        }
    }
}
