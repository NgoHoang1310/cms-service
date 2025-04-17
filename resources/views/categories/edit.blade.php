@php
    /* @var $category app\models\Category */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa danh mục phim</h2>
                <form method="POST" action="{{ route('categories.update', $category) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    @include('categories._form', ['category' => $category, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

