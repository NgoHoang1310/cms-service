@php
    /* @var $movie app\models\Movie */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết phim</h2>
                <form>
                    @include('movies._form', ['movie' => $movie, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

