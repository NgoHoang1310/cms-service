@php
    use App\Helpers\CUtils;
    /* @var $movie app\models\Movie */

@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card pb-3">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                        <a class="btn btn-primary mt-3" href="{{ route('movies.create') }}">
                            <i class="fa-solid fa-plus me-2"></i>
                            Tạo phim mới
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-view table-responsive pt-3 table-space">
                            <table id="seasonTable" class="data-tables table custom-table movie_table"
                                   data-toggle="data-table">
                                <thead>
                                <tr class="text-uppercase">
                                    <th>Phim</th>
                                    <th>Chất lượng</th>
                                    <th>Đạo diễn</th>
                                    <th>Ngày phát hành</th>
                                    <th>Thời lượng</th>
                                    <th>Tình trạng phim</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <img
                                                    src="{{ \App\Facades\Firebase::getPublicFileUrl($movie->backdrop_url) }}"
                                                    loading="lazy" alt="image"
                                                    class="rounded-2 avatar avatar-55 img-fluid"/>
                                                <div class="d-flex flex-column ms-3 justify-content-center">
                                                    <h6 class="text-capitalize">{{ $movie->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <small>480/720/1080</small>
                                        </td>
                                        <td>
                                            {{ $movie->directors }}
                                        </td>
                                        <td>
                                            <small>{{ CUtils::format_date($movie->release) }}</small>
                                        </td>
                                        <td>{{ $movie->duration }} phút</td>
                                        <td><span id="badge-{{ $movie->id }}"
                                                class="badge {{ $movie->getStatusLabelAttribute() }}">{{ $movie->getStatusTextAttribute() }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <div class="form-check form-switch ms-2">
                                                    <input
                                                        {{ $movie->status ? 'checked' : '' }} class="form-check-input"
                                                        type="checkbox"
                                                        data-movie-id="{{ $movie->id }}"
                                                    />
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                                   href="{{ route('movies.show', $movie) }}"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-outline-warning rounded"
                                                   href="{{ route('movies.edit', $movie) }}"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-outline-danger delete-btn rounded"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Xoá"
                                                   data-url="{{ route('movies.destroy', $movie) }}"
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
            var movieId = $(this).data('movie-id');  // Lấy movie ID từ data attribute
            var status = $(this).prop('checked') ? 1 : 0;  // Kiểm tra trạng thái checkbox (checked or not)

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '/movies/' + movieId + '/update-status',  // URL tới route bạn đã định nghĩa
                method: 'POST',  // Phương thức HTTP
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token (bắt buộc trong Laravel)
                    status: status  // Gửi status mới
                },
            });
        });

        $(document).ready(function () {
            window.socket.emit('joinRoom', ['broadcast'])
            window.socket.on('notify', function (payload) {
                $('tbody tr td #badge-' + payload?.target_id ).removeClass().addClass('badge bg-success').text('Sẵn sàng');
            });
        });


    </script>
@endpush
