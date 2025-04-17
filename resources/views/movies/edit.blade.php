@php
    /* @var $movie app\models\Movie */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa phim</h2>
                <form method="POST">
                    @csrf
                    @include('movies._form', ['movie' => $movie, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

