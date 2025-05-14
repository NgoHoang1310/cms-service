@php
    /* @var $user app\models\User */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết tài khoản</h2>
                <form>
                    @include('users._form', ['user' => $user, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

