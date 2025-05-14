@php
    /* @var $season app\models\Season */
    /* @var $series_id integer */

@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết mùa phim</h2>
                <form>
                    @include('seasons._form', ['season' => $season, 'series_id' => $series_id, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

