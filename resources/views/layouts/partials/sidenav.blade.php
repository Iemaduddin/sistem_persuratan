<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src=" {{ asset('./img/logos/logo_hmti.png') }}" class="navbar-brand-img h-50" alt="main_logo">
            <span class="ms-1 font-weight-bold">Sistem Persuratan HMTI</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}"
                        href="{{ route('dashboard_admin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    <style>
                        .nav-link.active {
                            color: aliceblue
                        }
                    </style>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/user-management') ? 'active' : '' }}"
                        href="{{ route('user_management') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/stakeholder') ? 'active' : '' }}"
                        href="{{ route('stakeholder.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nama Penandatangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/letter') ? 'active' : '' }}"
                        href="{{ route('letter.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-envelope-o text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Surat</span>
                    </a>
                </li>
            @elseif(auth()->user()->role_id == 2)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/sekum') ? 'active' : '' }}"
                        href="{{ route('dashboard_sekum') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    <style>
                        .nav-link.active {
                            color: aliceblue
                        }
                    </style>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/sekum/profile') ? 'active' : '' }}"
                        href="{{ route('profile.sekum') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            @elseif(auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/sc_kestari') ? 'active' : '' }}"
                        href="{{ route('dashboard_sc_kestari') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    <style>
                        .nav-link.active {
                            color: aliceblue
                        }
                    </style>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('dashboard/sc_kestari/profile') ? 'active' : '' }}"
                        href="{{ route('profile.sc_kestari') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('dashboard/oc') ? 'active' : '' }}"
                        href="{{ route('dashboard_oc') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    <style>
                        .nav-link.active {
                            color: aliceblue
                        }
                    </style>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/oc/profile') ? 'active' : '' }}"
                        href="{{ route('profile.oc') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
{{-- <li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}"
        href="{{ route('page', ['page' => 'tables']) }}">
        <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Tables</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'billing') == true ? 'active' : '' }}"
        href="{{ route('page', ['page' => 'billing']) }}">
        <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Billing</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}"
        href="{{ route('virtual-reality') }}">
        <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-app text-info text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Virtual Reality</span>
    </a>
</li> --}}
