@php
    /* @var $payment app\models\Payment*/
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div
                        class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                        <a class="btn btn-success mt-3" href="{{ route('revenue.export') }}">
                            <i class="fa-solid fa-plus me-2"></i>
                            Xuất Excel
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded py-4 table-space">
                            <table id="user-list-table" class="table custom-table" role="grid"
                                   data-toggle="data-table">
                                <thead>
                                <tr class="ligth">
                                    <th>Tên tài khoản</th>
                                    <th>Gói cước</th>
                                    <th>Số tiền</th>
                                    <th>Ngày thanh toán</th>
                                    <th>Mã giao dịch</th>
                                    <th>Trạng thái</th>
                                    <th style="min-width: 100px">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->user->user_name ?? $payment->user->email }}</td>
                                        <td>{{ $payment->subscription->plan->name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->payment_date }}</td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td><span
                                                class="badge {{ $payment->getStatusLabelAttribute() }}">{{ $payment->getStatusTextAttribute() }}</span>
                                        </td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                                   href="{{ route('payments.show', $payment) }}"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

