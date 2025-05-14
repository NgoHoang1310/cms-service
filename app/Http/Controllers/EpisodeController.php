<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Models\Video_Quality;
use App\Services\FirebaseService;
use App\Services\Queue\Producers\VideoProducer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EpisodeController extends Controller
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
    public function listSeasons($series_id)
    {
        $seasons = Season::where('series_id', $series_id)->get();
        return view('episodes.list-seasons', compact('seasons', 'series_id'));
    }

    public function index($series_id, $season_id = null)
    {
        $episodes = Episode::where('series_id', $series_id)
            ->where('season_id', $season_id)
            ->get();

        return view('episodes.index', compact('series_id', 'season_id', 'episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($series_id, $season_id = null)
    {
        $episode = new Episode();
        return view('episodes.create', compact('episode', 'series_id', 'season_id'));
    }

    public function listSeries()
    {
        $series = Series::all();
        return view('episodes.list-series', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $series_id, $season_id = null)
    {
        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'file']);

            $model = new Episode();
            $model->fill($data);
            $model->series_id = $series_id;
            $model->season_id = $season_id;
            $model->uuid = Str::uuid()->toString();
            $model->slug = Str::slug($model->title);
            $model->save();
            $model->videoQualities()->createMany([
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::QUALITY_1080P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::QUALITY_720P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::QUALITY_480P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::MASTER_QUALITY,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::MASTER_QUALITY_720P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ],
                [
                    'video_id' => $model->id,
                    'video_type' => Series::CONTENT_TARGET_TYPE_SERIES,
                    'quality' => Video_Quality::MASTER_QUALITY_480P,
                    'status' => Video_Quality::STATUS_PROCESSING,
                ]
            ]);
//            $tempPath = $request->input('temp_path');
//            if (!empty($tempPath)) {
//                $this->videoProducer->processVideo([
//                    'id' => $model->id,
//                    'title' => $model->title,
//                    'content_type' => Series::CONTENT_TARGET_TYPE_SERIES,
//                    'slug' => $model->slug,
//                    'uuid' => $model->uuid,
//                    'tempPath' => $tempPath,
//                ]);
//            }
            DB::commit();
            $redirectUrl = !empty($season_id) ? 'series.seasons.episodes.index' : 'series.episodes.index';
            return redirect()->route($redirectUrl, ['series_id' => $series_id, 'season_id' => $season_id])->with('success', 'Tạo tập phim thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tạo tập phim thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
