@php
    /* @var $season app\models\Season */
    /* @var $series_id integer */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-edit" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa mùa phim</h2>
                <form method="POST" action="{{ route('series.seasons.update', ['series_id' => $series_id, 'season' => $season]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('seasons._form', ['season' => $season, 'series_id' => $series_id, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

