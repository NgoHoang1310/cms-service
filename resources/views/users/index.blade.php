@php
use App\Helpers\CUtils;
use App\Facades\Firebase;

/* @var $user app\models\User */
@endphp

@extends('layouts.app')
@section('title', 'User List')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div
                    class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                    <a class="btn btn-primary mt-3" href="{{ route('users.create') }}">
                        <i class="fa-solid fa-plus me-2"></i>
                        Tạo tài khoản mới
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive rounded py-4 table-space">
                        <table id="user-list-table" class="table custom-table" role="grid"
                            data-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>Ảnh đại diện</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày sinh</th>
                                    <th>Lần đăng nhập cuối</th>
                                    <th style="min-width: 100px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><img class="bg-primary-subtle avatar-rounded img-fluid avatar-50 m-auto"
                                            src="{{ $user->avatar_link ? Firebase::getPublicFileUrl($user->avatar_link) : '' }}"
                                            alt="profile" loading="lazy">
                                    </td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td><span
                                            class="badge {{ $user->getStatusLabelAttribute() }}">{{ $user->getStatusTextAttribute() }}</span>
                                    </td>
                                    <td>{{ CUtils::format_date($user->birthday) }}</td>
                                    <td>{{ CUtils::format_unix_timestamp($user->last_login) }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                               href="{{ route('users.show', $user) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-outline-warning rounded"
                                               href="{{ route('users.edit', $user) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-outline-danger delete-btn rounded"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Xoá"
                                               data-url="{{ route('users.destroy', $user) }}"
                                            >
                                                <i class="fa-solid fa-trash"></i>
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
