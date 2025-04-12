    <aside class="sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="index.html" class="navbar-brand">

                <!--Logo start-->
                <img class="logo-normal" src="{{ asset('images/logo.png') }}" alt="#">
                <img class="logo-normal logo-white" src="{{ asset('images/logo-white.png') }}" alt="#">
                <img class="logo-full" src="{{ asset('images/logo-full.png') }}" alt="#">
                <img class="logo-full logo-full-white" src="{{ asset('images/logo-full-white.png') }}" alt="#">
                <!--logo End--> </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="chevron-right">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 512 512" fill="white">
                        <path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                </i>
                <i class="chevron-left">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 512 512" fill="white" transform="rotate(180)">
                        <path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    @foreach($sidebarMenu as $item)
                    @if(isset($item['children']))
                    <li class="nav-item">
                        <a class="nav-link {{ $item['active'] ? 'active' :'' }}" data-bs-toggle="collapse" href="#menu-{{ Str::slug($item['title']) }}" role="button">
                            <x-icon :name="$item['icon']" class="icon" />
                            <span class="item-name">{{ $item['title'] }}</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="menu-{{ Str::slug($item['title']) }}">
                            @foreach($item['children'] as $child)
                            <li class="nav-item {{ $child['active'] }}">
                                <a class="nav-link {{ $child['active'] ? 'active' :'' }}" href="{{ $child['link'] }}">
                                    <i class="icon"><i class="fa-solid fa-film"></i></i>
                                    <span class="item-name">{{ $child['title'] }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link {{ $item['active'] ? 'active' :'' }}" href="{{ $item['link'] }}">
                            <x-icon :name="$item['icon']" class="icon" />
                            <span class="item-name">{{ $item['title'] }}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>

                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>