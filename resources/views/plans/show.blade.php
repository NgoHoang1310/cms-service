@php
    /* @var $plan app\models\Plan */
    /* @var $selectedVouchers array  */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-show" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Chi tiết gói cước</h2>
                <form>
                    @include('plans._form', ['plan' => $plan, 'selectedVouchers' => $selectedVouchers, 'formType' => 'show'])
                </form>
            </div>
        </div>
    </div>
@endsection

