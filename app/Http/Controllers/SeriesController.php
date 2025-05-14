<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Category;
use App\Models\Genres;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serie = new Series();
        $categories = Category::all();
        $genres = Genres::all();
        return view('series.create', compact('serie', 'categories', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);
            $categoryIds = $request->input('categories');
            $genreIds = $request->input('genres');
            $syncCategoryData = [];
            $syncGenreData = [];

            foreach ($categoryIds as $categoryId) {
                $syncCategoryData[$categoryId] = ['target_type' => Series::CONTENT_TARGET_TYPE_SERIES];
            }
            foreach ($genreIds as $genreId) {
                $syncGenreData[$genreId] = ['target_type' => Series::CONTENT_TARGET_TYPE_SERIES];
            }

            $model = new Series();
            $model->fill($data);
            $model->uuid = Str::uuid()->toString();
            $model->slug = Str::slug($model->title);
            $model->save();
            $model->categories()->attach($syncCategoryData);
            $model->genres()->attach($syncGenreData);

            DB::commit();
            return redirect()->route('series.index')->with('success', 'Tạo phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tạo phim thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        $categories = Category::all();
        $selectedCategories = $series->categories->pluck('id')->toArray();
        $genres = Genres::all();
        $selectedGenres = $series->genres->pluck('id')->toArray();
        return view('series.show', compact('series', 'categories', 'genres', 'selectedCategories', 'selectedGenres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        $categories = Category::all();
        $selectedCategories = $series->categories->pluck('id')->toArray();
        $genres = Genres::all();
        $selectedGenres = $series->genres->pluck('id')->toArray();
        return view('series.edit', compact('series', 'categories', 'genres', 'selectedCategories', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Series $series)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);
            $categoryIds = $request->input('categories', []);
            $genreIds = $request->input('genres', []);
            $syncCategoryData = [];
            $syncGenreData = [];

            foreach ($categoryIds as $categoryId) {
                $syncCategoryData[$categoryId] = ['target_type' => Series::CONTENT_TARGET_TYPE_SERIES];
            }
            foreach ($genreIds as $genreId) {
                $syncGenreData[$genreId] = ['target_type' => Series::CONTENT_TARGET_TYPE_SERIES];
            }

            $series->update($data);

            $series->categories()->sync($syncCategoryData);
            $series->genres()->sync($syncGenreData);

            DB::commit();
            return redirect()->route('series.index')->with('success', 'Cập nhật phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật phim thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        DB::beginTransaction();
        try {
            $series->delete();
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

    public function updateStatus($id, Request $request)
    {
        $series = Series::find($id);
        $status = $request->get('status');
        return $this->changeStatus($series, $status);
    }
}
