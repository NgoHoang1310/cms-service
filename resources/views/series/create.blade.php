@php
    /* @var $serie app\models\Series */
@endphp
@extends('layouts.app')
@section('title', 'Tạo phim mới')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Tạo phim mới</h2>
                <form method="POST" action="{{ route('series.store') }}" class="needs-validation" novalidate>
                    @csrf
                    @include('series._form', ['movie' => $serie, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection

