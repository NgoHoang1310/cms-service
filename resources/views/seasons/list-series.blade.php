@php
    use App\Helpers\CUtils;
    /* @var $series app\models\Series */

@endphp

@extends('layouts.app')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card pb-3">
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
                                    <th>Số mùa</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($series as $serie)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <img
                                                    src="{{ \App\Facades\Firebase::getPublicFileUrl($serie->poster_url) }}"
                                                    loading="lazy" alt="image"
                                                    class="rounded-2 avatar avatar-55 img-fluid"/>
                                                <div class="d-flex flex-column ms-3 justify-content-center">
                                                    <h6 class="text-capitalize">{{ $serie->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <small>480/720/1080</small>
                                        </td>
                                        <td>
                                            {{ $serie->directors }}
                                        </td>
                                        <td>
                                            <small>{{ CUtils::format_date($serie->release) }}</small>
                                        </td>
                                        <td>{{ $serie->countSeasons() }} mùa</td>
                                        <td>
                                            <div class="d-flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                                   href="{{ route('series.seasons.index', $serie->id) }}"
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
