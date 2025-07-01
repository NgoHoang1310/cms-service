@php
    /* @var $voucher app\models\Voucher */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết mã giảm giá</h2>
                <form>
                    @include('vouchers._form', ['voucher' => $voucher, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

