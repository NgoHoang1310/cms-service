@php
    use App\Helpers\CUtils;
    /* @var $seasons app\models\Season */
    /* @var $series_id integer */

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
                                    <th>Tiêu đề</th>
                                    <th>Mùa hiện tại</th>
                                    <th>Ngày phát hành</th>
                                    <th>Số tập</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($seasons as $season)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <img
                                                    src="{{ \App\Facades\Firebase::getPublicFileUrl($season->poster_url) }}"
                                                    loading="lazy" alt="image"
                                                    class="rounded-2 avatar avatar-55 img-fluid"/>
                                                <div class="d-flex flex-column ms-3 justify-content-center">
                                                    <h6 class="text-capitalize">{{ $season->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $season->season_number }}
                                        </td>
                                        <td>
                                            <small>{{ CUtils::format_date($season->release) }}</small>
                                        </td>
                                        <td>{{ $season->countEpisodes() }} tập</td>
                                        <td>
                                            <div class="d-flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-outline-success rounded"
                                                   href="{{ route('series.seasons.episodes.index', ['series_id' => $series_id, 'season_id' => $season->id]) }}"
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
