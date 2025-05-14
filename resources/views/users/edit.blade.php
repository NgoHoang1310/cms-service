@php
    /* @var $user app\models\User */
@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Cập nhật tài khoản</h2>
                <form method="POST" action="{{ route('users.update', $user) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('users._form', ['user' => $user, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

