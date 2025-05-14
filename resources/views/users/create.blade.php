@php
    /* @var $user app\models\User */
@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Tạo tài khoản mới</h2>
                <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
                    @csrf
                    @include('users._form', ['user' => $user, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
