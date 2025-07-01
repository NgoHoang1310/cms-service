@php
    /* @var $plan app\models\Plan */
@endphp
@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div
                            class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                        <a class="btn btn-primary mt-3" href="{{ route('plans.create') }}">
                            <i class="fa-solid fa-plus me-2"></i>
                            Thêm gói cước
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded py-4 table-space">
                            <table id="user-list-table" class="table custom-table" role="grid"
                                   data-toggle="data-table">
                                <thead>
                                <tr class="ligth">
                                    <th>Tên gói cước</th>
                                    <th>Giá (vnd)</th>
                                    <th>Thời hạn (ngày)</th>
                                    <th>Độ phân giải tối đa</th>
                                    <th>Trạng thái</th>
                                    <th style="min-width: 100px">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plans as $plan)
                                    <tr>

                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->price }}</td>
                                        <td>{{ $plan->duration_days }}</td>
                                        <td>{{ \App\Models\Video_Quality::$arrQuality[$plan->max_resolution] }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <div class="form-check form-switch ms-2">
                                                    <input
                                                            {{ $plan->status ? 'checked' : '' }} class="form-check-input"
                                                            type="checkbox"
                                                            data-plan-id="{{ $plan->id }}"
                                                    />
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                                   href="{{ route('plans.show', $plan) }}"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning rounded"
                                                   data-bs-original-title="Sửa"
                                                   href="{{ route('plans.edit', $plan) }}"
                                                >
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger rounded delete-btn"
                                                   data-bs-original-title="Xóa"
                                                   data-url="{{ route('plans.destroy', $plan) }}">
                                                    <span class="btn-inner">
                                                        <i class="fa-solid fa-trash fa-xs"></i>
                                                    </span>
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
            var planId = $(this).data('plan-id');  // Lấy movie ID từ data attribute
            var status = $(this).prop('checked') ? 1 : 0;  // Kiểm tra trạng thái checkbox (checked or not)

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '/plans/' + planId + '/update-status',  // URL tới route bạn đã định nghĩa
                method: 'POST',  // Phương thức HTTP
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token (bắt buộc trong Laravel)
                    status: status  // Gửi status mới
                },
            });
        });
    </script>
@endpush
