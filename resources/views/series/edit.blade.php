@php
    /* @var $series app\models\Series */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-edit" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa phim</h2>
                <form method="POST" action="{{ route('series.update', $series) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('series._form', ['serie' => $series, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

