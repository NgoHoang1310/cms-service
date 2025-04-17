@php
    /* @var $category app\models\Category */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div
                        class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                        <a class="btn btn-primary mt-3" href="{{ route('categories.create') }}">
                            <i class="fa-solid fa-plus me-2"></i>
                            Thêm danh mục phim
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded py-4 table-space">
                            <table id="user-list-table" class="table custom-table" role="grid"
                                   data-toggle="data-table">
                                <thead>
                                <tr class="ligth">
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th style="min-width: 100px">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>

                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-warning rounded"
                                                   data-bs-original-title="Sửa"
                                                   href="{{ route('categories.edit', $category) }}"
                                                >
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger rounded delete-btn"
                                                   data-bs-original-title="Xóa"
                                                   data-url="{{ route('categories.destroy', $category) }}">
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-trash fa-xs"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

