@php
    /* @var $episode app\models\Episode */
    /* @var $series_id integer */
    /* @var $season_id integer */

    $route = !empty($season_id) ? 'series.seasons.episodes.store' : 'series.episodes.store';
@endphp
@extends('layouts.app')
@section('title', 'Tạo mùa phim mới')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Tạo tập phim mới</h2>
                <form method="POST" action="{{ route($route, ['series_id' => $series_id, 'season_id' => $season_id]) }}" class="needs-validation" novalidate>
                    @csrf
                    @include('episodes._form', ['episode' => $episode, 'series_id' => $series_id, 'season_id' => $season_id, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection

