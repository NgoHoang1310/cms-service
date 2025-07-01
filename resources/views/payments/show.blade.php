@php
    /* @var $payment app\models\Payment */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 user-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết giao dịch</h2>
                <form>
                    @include('payments._form', ['payment' => $payment, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

