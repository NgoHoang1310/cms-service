@php
    /* @var $plan app\models\Plan */
    /* @var $vouchers app\models\Voucher[] */

@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Thêm gói cước</h2>
                <form method="POST" action="{{ route('plans.store') }}" class="needs-validation" novalidate>
                    @csrf
                    @include('plans._form', ['plan' => $plan, 'voucher' => $vouchers, 'formType' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection

