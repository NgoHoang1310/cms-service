@php
    /* @var $plan app\models\Plan */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0 movie-create" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mb-5">Sửa gói cước</h2>
                <form method="POST" action="{{ route('plans.update', $plan) }}" class="needs-validation"
                      novalidate>
                    @csrf
                    @method('PATCH')
                    @include('plans._form', ['plan' => $plan, 'formType' => 'edit'])
                </form>
            </div>
        </div>
    </div>
@endsection

