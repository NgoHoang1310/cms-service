@php
use App\Helpers\CUtils;
use App\Facades\Firebase;

/* @var $voucher app\models\Voucher */
@endphp

@extends('layouts.app')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div
                    class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                    <a class="btn btn-primary mt-3" href="{{ route('vouchers.create') }}">
                        <i class="fa-solid fa-plus me-2"></i>
                        Tạo mã giảm giá mới
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive rounded py-4 table-space">
                        <table id="user-list-table" class="table custom-table" role="grid"
                            data-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>Mã giảm gía</th>
                                    <th>Loại</th>
                                    <th>Giá trị</th>
                                    <th>Số lần sử dụng tối đa</th>
                                    <th>Số lần đã sử dụng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th style="min-width: 100px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->code }}</td>
                                    <td>{{ $voucher->getDiscountTypeText() }}</td>
                                    <td>{{ $voucher->value }}</td>
                                    <td>{{ $voucher->max_uses }}</td>
                                    <td>{{ $voucher->used_count }}</td>
                                    <td>{{ CUtils::format_date($voucher->start_at) }}</td>
                                    <td>{{ CUtils::format_date($voucher->end_at) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input
                                                    {{ $voucher->status ? 'checked' : '' }} class="form-check-input"
                                                    type="checkbox"
                                                    data-voucher-id="{{ $voucher->id }}"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                               href="{{ route('vouchers.show', $voucher) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-outline-warning rounded"
                                               href="{{ route('vouchers.edit', $voucher) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-outline-danger delete-btn rounded"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Xoá"
                                               data-url="{{ route('vouchers.destroy', $voucher) }}"
                                            >
                                                <i class="fa-solid fa-trash"></i>
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
@push('scripts')
    <script>
        // Lắng nghe sự kiện thay đổi của checkbox
        $('.form-check-input').on('change', function () {
            var voucherId = $(this).data('voucher-id');  // Lấy movie ID từ data attribute
            var status = $(this).prop('checked') ? 1 : 0;  // Kiểm tra trạng thái checkbox (checked or not)

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '/vouchers/' + voucherId + '/update-status',  // URL tới route bạn đã định nghĩa
                method: 'POST',  // Phương thức HTTP
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token (bắt buộc trong Laravel)
                    status: status  // Gửi status mới
                },
            });
        });
    </script>
@endpush
