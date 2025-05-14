@php
    /* @var $season app\models\Season */
    /* @var $series_id integer */
@endphp
@extends('layouts.app')
@section('title', 'Tạo mùa phim mới')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Tạo mùa phim mới</h2>
                <form method="POST" action="{{ route('series.seasons.store', $series_id) }}" class="needs-validation" novalidate>
                    @csrf
                    @include('seasons._form', ['season' => $season, 'series_id' => $series_id, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection

