<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                @if (Auth::user()->role_id == 1)
                    <li>
                        <a href="{{ route('dashboard_admin') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role_id == 2)
                    <li>
                        <a href="{{ route('dashboard_sekum') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @elseif(Auth::user()->role_id == 3)
                    <li>
                        <a href="{{ route('dashboard_oc') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endif

                <li class="menu-title">Dokumen</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="far fa-file-pdf"></i>
                        <span>Persuratan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('doc.suratMasuk') }}" key="t-products">Surat Masuk</a></li>
                        <li><a href="{{ route('doc.suratKeluar') }}" data-key="t-product-detail">Surat Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <i class="far fa-file-archive"></i>
                        <span data-key="t-multi-level">Proposal & LPJ</span>
                    </a>
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="#" class="has-arrow" data-key="t-level-1-2">HMTI</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{ route('doc.proposalHmti') }}" data-key="t-level-2-1">Proposal</a>
                                    </li>
                                    <li><a href="{{ route('doc.lpjHmti') }}" data-key="t-level-2-2">LPJ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow" data-key="t-level-1-2">Naungan</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{ route('doc.proposalNaungan') }}" data-key="t-level-2-1">Proposal</a>
                                    </li>
                                    <li><a href="{{ route('doc.lpjNaungan') }}" data-key="t-level-2-2">LPJ</a></li>
                                </ul>
                            </li>
                        </ul>
                    @elseif(Auth::user()->role_id == 3)
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('doc.proposalHmti') }}" data-key="t-level-2-1">Proposal</a></li>
                            <li><a href="{{ route('doc.lpjHmti') }}" data-key="t-level-2-2">LPJ</a></li>
                        </ul>
                    @endif
                </li>
                <li>
                    <a href="{{ route('export.report') }}">
                        <i class="mdi mdi-file-download-outline"></i>
                        <span data-key="t-horizontal">Report Persuratan</span>
                    </a>
                </li>
                @if (Auth::user()->role_id == 1)
                    <li class="menu-title" data-key="t-pages">Menu Lainnya</li>
                    <li>
                        <a href="{{ route('user_management') }}">
                            <i data-feather="users"></i>
                            <span data-key="t-horizontal">User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('departments.index') }}">
                            <i class="far fa-building"></i>
                            <span data-key="t-horizontal">Departemen</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="far fa-share-square"></i>
                            <span>Pengirim Dokumen</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('sender.naungan') }}">Naungan</a></li>
                            <li><a href="{{ route('sender.oki') }}" key="t-products">OKI</a></li>
                            <li><a href="{{ route('sender.others') }}">Lainnya</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
