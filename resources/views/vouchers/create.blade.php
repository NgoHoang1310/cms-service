@php
    /* @var $voucher app\models\Voucher */
@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Tạo mã giảm giá mới</h2>
                <form method="POST" action="{{ route('vouchers.store') }}" class="needs-validation" novalidate>
                    @csrf
                    @include('vouchers._form', ['voucher' => $voucher, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
