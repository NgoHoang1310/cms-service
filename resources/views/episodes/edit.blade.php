@php
    /* @var $episode app\models\Episode */
    /* @var $series_id integer */
    /* @var $season_id integer */

    $route = !empty($season_id) ? 'series.seasons.episodes.update' : 'series.episodes.update';
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-edit" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa tập phim</h2>
                <form method="POST" action="{{ route($route, ['series_id' => $series_id, 'season_id' => $season_id, 'episode' => $episode]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('episodes._form', ['episode' => $episode, 'series_id' => $series_id, 'season_id' => $season_id, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

