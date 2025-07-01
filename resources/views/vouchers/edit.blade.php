@php
    /* @var $voucher app\models\Voucher */
@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Cập nhật mã giảm giá</h2>
                <form method="POST" action="{{ route('vouchers.update', $voucher) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('vouchers._form', ['voucher' => $voucher, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

