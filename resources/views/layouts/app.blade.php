<!doctype html>
<html lang="en" data-bs-theme="dark" data-bs-theme-color="default" dir="ltr">


<!-- Mirrored from templates.iqonic.design/streamit-dist/dashboard/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Apr 2025 08:34:30 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
       CineChill - Admin Dashboard
    </title>
    <meta name="description"
        content="Streamit is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules.">
    <meta name="keywords"
        content="premium, admin, dashboard, template, bootstrap 5, clean ui, streamit, admin dashboard,responsive dashboard, optimized dashboard,">
    <meta name="author" content="Iqonic Design">
    <meta name="DC.title" content="Streamit Responsive Bootstrap 5 Admin Dashboard Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Filepond plugin CDN -->
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link href="https://unpkg.com/@pqina/pintura/pintura.css" rel="stylesheet">
    <link href="https://unpkg.com/@pqina/filepond-plugin-image-editor/dist/filepond-plugin-image-editor.css" rel="stylesheet">

    <!-- Video.js plugin CDN-->
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset("css/core/libs.min.css") }}">

    <link rel="stylesheet" href="{{ asset("vendor/sheperd/dist/css/sheperd.css") }}">

    <!-- Sweetlaert2 css -->
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">


    <!-- Flatpickr css -->
    <link rel="stylesheet" href="{{ asset("vendor/flatpickr/dist/flatpickr.min.css") }}">

    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset("vendor/filepond/dist/filepond.css") }}">
    <link rel="stylesheet" href="{{ asset("css/filepond-custom.css") }}">




    <!-- streamit Design System Css -->
    <link rel="stylesheet" href="{{ asset("css/streamit.min848f.css?v=5.2.1") }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset("css/custom.min848f.css?v=5.2.1") }}">
    <link rel="stylesheet" href="{{ asset("css/dashboard-custom.min848f.css?v=5.2.1") }}">

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset("css/rtl.min848f.css?v=5.2.1") }}">

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset("css/customizer.min848f.css?v=5.2.1") }}">

    <link rel="stylesheet" href="{{ asset("vendor/swiperSlider/swiper-bundle.min.css") }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset("vendor/select2/dist/css/select2.min.css") }}">

    <!-- Custom CSS -->
    @stack('styles')
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body ">
                <img src="{{ asset('images/loader-unscreen.gif') }}" class="image-loader img-fluid" />
            </div>
        </div>
    </div>
    <!-- loader END -->

    @include('layouts.sidebar')

    <main class="main-content">
        <div class="position-relative ">
            <!--Nav Start-->
            @include('layouts.header')
            <!--Nav End-->
        </div>
        @yield('content')
        <!-- Footer Section Start -->
        @include('layouts.footer')
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->
    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    <x-drawer>
    </x-drawer>
    <div class="offcanvas offcanvas-end live-customizer" tabindex="-1" id="live-customizer" data-bs-backdrop="false"
        data-bs-scroll="true" aria-labelledby="live-customizer-label" aria-modal="true" role="dialog">
        <div class="offcanvas-header pb-0">
            <div class="d-flex align-items-center">
                <h4 class="offcanvas-title" id="live-customizer-label">Setting Panel</h4>
            </div>
            <div class="close-icon" data-bs-dismiss="offcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" class="h-5 w-5" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="text-center mb-4">
                            <h5 class="d-inline-block">Style Setting</h5>
                        </div>
                        <div>
                            <!-- Theme start here -->
                            <div class="mb-4">
                                <h5 class="mb-3">Theme</h5>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="light"
                                            name="theme_scheme" id="color-mode-light" checked="">
                                        <label class="form-check-label d-flex align-items-center justify-content-between"
                                            for="color-mode-light">
                                            <span>Light Theme</span>
                                            <span class="text-primary ">
                                                <svg width="60" height="27" viewBox="0 0 60 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        fill="white"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        stroke="#DADCE0" stroke-width="0.75"></rect>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100 ">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="dark"
                                            name="theme_scheme" id="color-mode-dark">
                                        <label class="form-check-label d-flex align-items-center justify-content-between"
                                            for="color-mode-dark">
                                            <span>Dark Theme</span>
                                            <span class="text-primary ">
                                                <svg width="60" height="27" viewBox="0 0 60 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        fill="#1E2745"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        stroke="currentColor" stroke-width="0.75"></rect>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="auto"
                                            name="theme_scheme" id="color-mode-auto">
                                        <label class="form-check-label d-flex align-items-center justify-content-between"
                                            for="color-mode-auto">
                                            <span>Device Default</span>
                                            <span class="text-primary ">
                                                <svg class="rounded" width="60" height="27" viewBox="0 0 60 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        fill="#1E2745"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <g clip-path="url(#clip0_507_92)">
                                                        <rect width="30" height="27" fill="white"></rect>
                                                        <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                        <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5"
                                                            fill="#DADCE0"></rect>
                                                        <rect x="6" y="18" width="48" height="3" rx="1.5"
                                                            fill="currentColor"></rect>
                                                    </g>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                        stroke="#DADCE0" stroke-width="0.75"></rect>
                                                    <defs>
                                                        <clipPath id="clip0_507_92">
                                                            <rect width="30" height="27" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- Color customizer end here -->
                            <hr class="hr-horizontal">
                            <!-- Menu start here -->
                            <div>
                                <h6 class="mt-4 mb-3">Menu Color</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-white" class="btn-check" name="sidebar_color"
                                            id="sidebar-white" checked="">
                                        <label class="btn btn-border d-block" for="sidebar-white" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-original-title="White Menu">
                                            Light
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-dark" class="btn-check" name="sidebar_color"
                                            id="sidebar-dark">
                                        <label class="btn btn-border d-block" for="sidebar-dark" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-original-title="Dark Menu">
                                            Dark
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-color" class="btn-check" name="sidebar_color"
                                            id="sidebar-color">
                                        <label class="btn btn-border d-block" for="sidebar-color" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-original-title="Colored Menu">
                                            Color
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Menu Style start here -->
                            <div>
                                <h5 class="mt-4 mb-3">Menu Style</h5>
                                <div class="d-grid gap-3 grid-cols-3 mb-4">
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-mini" class="btn-check" name="sidebar_type"
                                            id="sidebar-mini">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="sidebar-mini">
                                            Mini
                                        </label>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-hover"
                                            data-extra="{target: '.sidebar', ClassListAdd: 'sidebar-mini'}"
                                            class="btn-check" name="sidebar_type" id="sidebar-hover">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="sidebar-hover">
                                            Hover
                                        </label>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-soft" class="btn-check" name="sidebar_type"
                                            id="sidebar-soft">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="sidebar-soft">
                                            Soft
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Style end here -->

                            <hr class="hr-horizontal">

                            <!-- Active Menu Style start here -->

                            <div class="mb-4">
                                <h5 class="mt-4 mb-3">Active Menu Style</h5>
                                <div class="d-grid gap-3 grid-cols-2">
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded" class="btn-check"
                                            name="sidebar_menu_style" id="navs-rounded">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="navs-rounded">
                                            Rounded One
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded-all" class="btn-check"
                                            name="sidebar_menu_style" id="navs-rounded-all">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="navs-rounded-all">
                                            Rounded All
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill" class="btn-check"
                                            name="sidebar_menu_style" id="navs-pill">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="navs-pill">
                                            Pill One Side
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill-all" class="btn-check"
                                            name="sidebar_menu_style" id="navs-pill-all">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden"
                                            for="navs-pill-all">
                                            Pill All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Color customizer start here -->
                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mt-4 mb-3">Color Customizer</h6>
                                    <div class="d-flex align-items-center">
                                        <a href="#custom-color" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="custom-color">Custom</a>
                                        <div data-setting="radio">
                                            <input type="radio" value="default" class="btn-check"
                                                name="theme_color" id="default"
                                                data-colors="{&quot;primary&quot;: &quot;#b00c1f&quot;, &quot;secondary&quot;: &quot;#aca4bc&quot;}">
                                            <label class="btn bg-transparent px-2 border-0" for="default"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Reset Color" aria-label="Reset Color">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z"
                                                        fill="#fff"></path>
                                                    <path
                                                        d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="custom-color">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-primary-color">Primary</label>
                                        <input name="theme_color" data-extra="primary" type="color"
                                            id="custom-primary-color" value="#3a57e8" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-secondary-color">Secondary</label>
                                        <input name="theme_color" data-extra="secondary" type="color"
                                            id="custom-secondary-color" value="#8a92a6" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-success-color">Success</label>
                                        <input name="theme_color" data-extra="success" type="color"
                                            id="custom-success-color" value="#1aa053" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-danger-color">Danger</label>
                                        <input name="theme_color" data-extra="danger" type="color"
                                            id="custom-danger-color" value="#c03221" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-warning-color">Warning</label>
                                        <input name="theme_color" data-extra="warning" type="color"
                                            id="custom-warning-color" value="#f16a1b" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="custom-info-color">Info</label>
                                        <input name="theme_color" data-extra="info" type="color"
                                            id="custom-info-color" value="#08B1BA" data-setting="color">
                                    </div>
                                </div>
                                <div class="grid-cols-2 mb-4 d-grid gap-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="default" class="btn-check" name="theme_color"
                                            id="theme-color-1"
                                            data-colors="{&quot;primary&quot;: &quot;#e50914&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#adafb8&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Theme-1" aria-label="Theme-1">
                                            Netflix
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="color-1" class="btn-check" name="theme_color"
                                            id="theme-color-2"
                                            data-colors="{&quot;primary&quot;: &quot;#0959E4&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#EA4335&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Theme-2" aria-label="Theme-2">
                                            Hotstar
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="color-2" class="btn-check" name="theme_color"
                                            id="theme-color-3"
                                            data-colors="{&quot;primary&quot;: &quot;#1A98FF&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#89F425&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-3"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Theme-3" aria-label="Theme-3">
                                            Prime
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="color-3" class="btn-check" name="theme_color"
                                            id="theme-color-4"
                                            data-colors="{&quot;primary&quot;: &quot;#3ee783&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#0E0E0E&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-4"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Theme-4" aria-label="Theme-4">
                                            Hulu
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Color customizer end here -->
                            <hr class="hr-horizontal">
                            <div>
                                <h6 class="d-inline-block mb-3 me-2">Page Style </h6>
                                <div class="d-grid gap-3 grid-cols-2 mb-4">
                                    <div data-setting="radio">
                                        <input type="radio" value="container" class="btn-check" name="page_layout"
                                            id="page-layout-boxed">
                                        <label class="btn btn-border d-block" for="page-layout-boxed">Boxed</label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="container-fluid" class="btn-check" name="page_layout"
                                            id="page-layout-full-width" checked="">
                                        <label class="btn btn-border d-block" for="page-layout-full-width">Full
                                            Width</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Direction customizer start here -->
                            <div>
                                <h5 class="mb-3 mt-4">Direction</h5>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="ltr"
                                            name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr"
                                            checked="">
                                        <label class="form-check-label d-flex align-items-center justify-content-between"
                                            for="theme-scheme-direction-ltr">
                                            <span>LTR</span>
                                            <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.5" cy="13.5002" r="6.5" fill="currentColor"></circle>
                                                <rect x="21" y="7.70026" width="34" height="5" rx="2" fill="#80868B"></rect>
                                                <rect opacity="0.5" x="21" y="16.1003" width="25.6281" height="3.2" rx="1.6"
                                                    fill="#80868B"></rect>
                                                <rect x="0.375" y="0.375244" width="59.25" height="26.25" rx="4.125"
                                                    stroke="currentColor" stroke-width="0.75"></rect>
                                            </svg>
                                        </label>
                                    </div>

                                </div>
                                <div class="mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="rtl"
                                            name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
                                        <label class="form-check-label d-flex align-items-center justify-content-between "
                                            for="theme-scheme-direction-rtl">
                                            <span>RTL</span>
                                            <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle r="6.5" transform="matrix(-1 0 0 1 48.5 13.5002)"
                                                    fill="currentColor"></circle>
                                                <rect width="34" height="5" rx="2" transform="matrix(-1 0 0 1 39 7.70026)"
                                                    fill="#80868B"></rect>
                                                <rect opacity="0.5" width="25.6281" height="3.2" rx="1.6"
                                                    transform="matrix(-1 0 0 1 39 16.1003)" fill="#80868B"></rect>
                                                <rect x="-0.375" y="0.375" width="59.25" height="26.25" rx="4.125"
                                                    transform="matrix(-1 0 0 1 59.25 0.000244141)" stroke="currentColor"
                                                    stroke-width="0.75"></rect>
                                            </svg>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- Direction customizer end here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings sidebar end here -->

    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas"
        data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <svg class="icon-24 animated-rotate" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></circle>
        </svg>
    </a> <!-- Live Customizer end -->

    <!-- Filepond plugin CDN -->
    <script src="https://unpkg.com/pintura/pintura.js"></script>
    <script src="https://unpkg.com/@pqina/pintura/pintura-filepond.js"></script>
    <script src="https://unpkg.com/@pqina/filepond-plugin-image-editor/dist/filepond-plugin-image-editor.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://cdn.tiny.cloud/1/iun7itnnrsng7lyoqoh7h9fudy8lhh4nxn96yve10porv1ff/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Video.js plugin CDN -->
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

    <!-- Library Bundle Script -->
    <script src="{{ asset('js/core/libs.min.js') }}"></script>
    <!-- Plugin Scripts -->
    <!-- Tour plugin Start -->
    <script src="{{ asset('vendor/sheperd/dist/js/sheperd.min.js') }}"></script>
    <script src="{{ asset('js/plugins/tour.js') }}" defer></script>


    <!-- Flatpickr Script -->
    <script src="{{ asset('vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr.js') }}" defer></script>



    <!-- Select2 Script -->
    <script src="{{ asset('js/plugins/select2.js') }}" defer></script>




    <!-- Slider-tab Script -->
    <script src="{{ asset('js/plugins/slider-tabs.js') }}"></script>

    <!-- Sweet-alert Script -->
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}" async></script>
    <script src="{{ asset('js/plugins/sweet-alert.js') }}" defer></script>

    <!--Filepond Script -->
    <script src="{{ asset('vendor/filepond/dist/filepond.js') }}" async></script>
    <script src="{{ asset('vendor/filepond/dist/filepond.esm.js') }}" async></script>
    <script src="{{ asset('js/plugins/filepond.js') }}" defer></script>


    <script src="{{ asset('vendor/swiperSlider/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/swiper-slider.js') }}" defer></script>
    <!-- Lodash Utility -->
    <script src="{{ asset('vendor/lodash/lodash.min.js') }}"></script>
    <!-- Utilities Functions -->
    <script src="{{ asset('js/iqonic-script/utility.min.js') }}"></script>
    <!-- Settings Script -->
    <script src="{{ asset('js/iqonic-script/setting.min.js') }}"></script>
    <!-- Settings Init Script -->
    <script src="{{ asset('js/setting-init.js') }}"></script>
    <!-- External Library Bundle Script -->
    <script src="{{ asset('js/core/external.min.js') }}"></script>
    <!-- Widgetchart Script -->
    <script src="{{ asset('js/charts/widgetcharts848f.js?v=5.2.1') }}" defer></script>
    <!-- Dashboard Script -->
    <script src="{{ asset('js/charts/dashboard848f.js?v=5.2.1') }}" defer></script>
    <!-- qompacui Script -->
    <script src="{{ asset('js/streamit848f.js?v=5.2.1') }}" defer></script>
    <script src="{{ asset('js/sidebar848f.js?v=5.2.1') }}" defer></script>
    <script src="{{ asset('js/chart-custom848f.js?v=5.2.1') }}" defer></script>

    <script src="{{ asset('js/plugins/select2848f.js?v=5.2.1') }}" defer></script>

    <script src="{{ asset('js/plugins/flatpickr848f.js?v=5.2.1') }}" defer></script>

    <script src="{{ asset('js/plugins/countdown848f.js?v=5.2.1') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
            toastr.success("{{ session('success') }}", "Thành công");
            @endif

            @if (session()->has('errors'))
            toastr.error("{{ $errors->first() }}", "Lỗi");
            @endif

            @if (session('error'))
            toastr.error("{{ session('error') }}", "Lỗi");
            @endif

            @if (session('warning'))
            toastr.warning("{{ session('warning') }}", "Cảnh báo");
            @endif

            @if (session('info'))
            toastr.info("{{ session('info') }}", "Thông báo");
            @endif
        });

        $(document).ready(function () {
            const socket = io("http://localhost:4000"); // 🔁 Thay đổi port nếu khác

            socket.on("connect", () => {
                console.log(`✅ Connected: ${socket.id}`);
            });

            socket.on("disconnect", () => {
                console.log(`❌ Disconnected`);
            });

            window.socket = socket;
        })
    </script>

    <!-- Custom Script -->
    @stack('scripts')
</body>
</html>
