<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($series_id)
    {
        $seasons = Season::where('series_id', $series_id)->get();
        return view('seasons.index', compact('seasons', 'series_id'));
    }

    public function listSeries()
    {
        $series = Series::all();
        return view('seasons.list-series', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($series_id)
    {
        $season = new Season();
        return view('seasons.create', compact('season', 'series_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $series_id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);

            $model = new Season();
            $model->fill($data);
            $model->series_id = $series_id;
            $model->slug = Str::slug($model->title);
            $model->save();

            DB::commit();
            return redirect()->route('series.seasons.index', $series_id)->with('success', 'Tạo mùa phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tạo mùa phim thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($series_id, Season $season)
    {
        return view('seasons.show', compact('series_id', 'season'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($series_id, Season $season)
    {
        return view('seasons.edit', compact('series_id', 'season'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $series_id, Season $season)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);
            $season->update($data);

            DB::commit();
            return redirect()->route('series.seasons.index', $series_id)->with('success', 'Cập nhật mùa phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật mùa phim thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($series_id, Season $season)
    {
        DB::beginTransaction();
        try {
            $season->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa mùa phim thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa mùa phim thất bại: ' . $exception->getMessage()
            ]);
        }
    }
}
