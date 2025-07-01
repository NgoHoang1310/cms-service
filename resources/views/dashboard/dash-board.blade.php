@php
    /* @var $statistic array */
    /* @var $movies array */
@endphp
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0">
                                        Tổng doanh thu
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-info">
                                    <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="16" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M2.75 12C2.75 17.108 6.891 21.25 12 21.25C17.108 21.25 21.25 17.108 21.25 12C21.25 6.892 17.108 2.75 12 2.75C6.891 2.75 2.75 6.892 2.75 12Z"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round" />
                                        <path d="M8.52832 10.5576L11.9993 14.0436L15.4703 10.5576" stroke="currentColor"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">{{ number_format($statistic['total_revenue'], 0, ',') }} vnđ</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                        Tổng phim
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-warning">
                                    <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="16" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0"> {{ $statistic['total_film'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                        Lượt xem
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-primary">
                                    <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="16" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">{{ $statistic['total_view'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                        Gói đã bán
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-success">
                                    <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="16" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9849 15.3462C8.11731 15.3462 4.81445 15.931 4.81445 18.2729C4.81445 20.6148 8.09636 21.2205 11.9849 21.2205C15.8525 21.2205 19.1545 20.6348 19.1545 18.2938C19.1545 15.9529 15.8735 15.3462 11.9849 15.3462Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9849 12.0059C14.523 12.0059 16.5801 9.94779 16.5801 7.40969C16.5801 4.8716 14.523 2.81445 11.9849 2.81445C9.44679 2.81445 7.3887 4.8716 7.3887 7.40969C7.38013 9.93922 9.42394 11.9973 11.9525 12.0059H11.9849Z"
                                            stroke="currentColor" stroke-width="1.42857" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">{{ $statistic['total_plan_sold'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center top-rated-slider">
                    <div class="iq-header-title ">
                        <h4 class="card-title">Nội dung được xem nhiều</h4>
                    </div>
                    <div class="top-swiper-arrow d-flex align-items-center">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="swiper pt-2 pt-md-4 pt-lg-4 overflow-hidden" data-swiper="top-slider">
                        <ul class="swiper-wrapper list-inline p-0 m-0">
                            @foreach($movies as $movie)
                                <li class="iq-rated-box swiper-slide">
                                    <div class="iq-card mb-0">
                                        <div class="iq-card-body p-0">
                                            <div class="iq-thumb">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ \App\Facades\Firebase::getPublicFileUrl($movie->backdrop_url) }}" class="img-fluid w-100 img-border-radius" alt="topImg-01">
                                                </a>
                                            </div>
                                            <div class="iq-feature-list mt-3">
                                                <h6 class="font-weight-600 mb-0 text-truncate">
                                                    The {{ $movie->title }}</h6>
                                                <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                    <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>{{ $movie->total_view }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card card-block card-stretch card-height">
                <div class="card-header">
                    <div class="iq-header-title">
                        <h4 class="card-title text-center">Khách hàng</h4>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div id="view-chart-01">
                    </div>
                    <div class="row mt-1">
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="card border-0">
                                <div class="card-body bg-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="iq-user-box bg-primary"></div>
                                        <div class=" ">
                                            <p class="mb-0 font-size-14 line-height">Khách hàng <br> mới
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="card border-0">
                                <div class="card-body bg-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="iq-user-box bg-warning"></div>
                                        <div class=" ">
                                            <p class="mb-0 font-size-14 line-height">Khách hàng đã đăng kí
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="card border-0">
                                <div class="card-body bg-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="iq-user-box bg-info"></div>
                                        <div class=" ">
                                            <p class="mb-0 font-size-14 line-height">Khách hàng<br>
                                                vãng lai
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="card border-0">
                                <div class="card-body bg-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="iq-user-box bg-danger"></div>
                                        <div class=" ">
                                            <p class="mb-0 font-size-14 line-height">Khách hàng đã<br>
                                                Gia hạn
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center gap-2">
                    <div class="card-title">
                        <h4 class="mb-0">Thống kê doanh thu</h4>
                    </div>
                    <div class="card-header-toolbar d-flex gap-lg-5 align-items-center seasons">
                        <div class="iq-custom-select d-flex gap-3 sea-epi s-margin">
                            <input id="start_time" name="start_time" class="form-control flatpickr_humandate btn btn-outline-warning" type="text"
                                   placeholder="Ngày bắt đầu" data-id="multiple" readonly="readonly">
                            <input id="end_time" name="end_time" class="form-control flatpickr_humandate btn btn-outline-warning" type="text"
                                   placeholder="Ngày két thúc" data-id="multiple" readonly="readonly">
                        </div>
                        <div class="iq-custom-select d-inline-block sea-epi s-margin">
                            <select id="timeframe" name="cars" class="form-control season-select btn btn-outline-success">
                                <option value="week">Tuần</option>
                                <option value="month">Tháng</option>
                            </select>
                        </div>
                        <button class="btn btn-success" onclick="applyFilter()" style="margin-left: 1rem;">Lọc</button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function applyFilter() {
            const type = document.getElementById('timeframe').value;
            const startDate = document.getElementById('start_time').value;
            const endDate = document.getElementById('end_time').value;
            fetchAndRenderChart(type, startDate, endDate);
        }

        function fetchAndRenderChart(type = 'month', startDate = '', endDate = '') {
            const query = new URLSearchParams({
                type,
                start_date: startDate,
                end_date: endDate
            }).toString();

            fetch('/revenue/chart?' + query)
                .then(res => res.json())
                .then(data => {
                    const ctx = document.getElementById('revenueChart').getContext('2d');
                    const labels = data.map(item => item.label);
                    const revenues = data.map(item => parseFloat(item.total));

                    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient.addColorStop(0, '#4bc0c0');
                    gradient.addColorStop(1, '#36a2eb');

                    if (window.chartInstance) window.chartInstance.destroy();

                    window.chartInstance = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels,
                            datasets: [{
                                label: 'Doanh thu',
                                data: revenues,
                                backgroundColor: gradient,
                                borderRadius: 10,
                                borderSkipped: false,
                                barThickness: 40,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    callbacks: {
                                        label: ctx => `${ctx.raw.toLocaleString('vi-VN')} đ`
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Biểu đồ doanh thu',
                                    font: { size: 18 }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 100,
                                    ticks: {
                                        callback: val => val.toLocaleString('vi-VN') + ' đ',
                                        padding: 10
                                    },
                                    grid: { color: '#f0f0f0' }
                                },
                                x: { grid: { display: false } }
                            }
                        }
                    });
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const now = new Date();
            const todayStr = now.toISOString().split('T')[0];

            const firstDayOfLastMonth = new Date(now.getFullYear(), now.getMonth() - 1, 1);
            const firstDayStr = firstDayOfLastMonth.toISOString().split('T')[0];

            // Gán giá trị mặc định cho input
            document.getElementById('start_time').value = firstDayStr;
            document.getElementById('end_time').value = todayStr;
            document.getElementById('timeframe').value = 'week';

            // Gọi lần đầu
            fetchAndRenderChart('week', firstDayStr, todayStr);
        });
    </script>
@endpush
