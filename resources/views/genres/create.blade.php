@php
    /* @var $genre app\models\Genres */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Thêm thể loại phim</h2>
                <form method="POST" action="{{ route('genres.store') }}" class="needs-validation" novalidate>
                    @csrf
                    @include('genres._form', ['genre' => $genre, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection

