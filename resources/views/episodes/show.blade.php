@php
    /* @var $episode app\models\Episode */
    /* @var $series_id integer */
    /* @var $season_id integer */

@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết mùa phim</h2>
                <form>
                    @include('episodes._form', ['episode' => $episode, 'series_id' => $series_id, 'season_id' => $season_id, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

