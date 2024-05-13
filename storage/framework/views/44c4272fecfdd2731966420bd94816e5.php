<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <?php if(Auth::user()->role_id == 1): ?>
                    <a href="<?php echo e(route('dashboard_admin')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>

                    <a href="<?php echo e(route('dashboard_admin')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>
                <?php elseif(Auth::user()->role_id == 2): ?>
                    <a href="<?php echo e(route('dashboard_sekum')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>

                    <a href="<?php echo e(route('dashboard_sekum')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>
                <?php elseif(Auth::user()->role_id == 3): ?>
                    <a href="<?php echo e(route('dashboard_oc')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>

                    <a href="<?php echo e(route('dashboard_oc')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="" height="50">
                            <span class="logo-txt">HMTI</span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="<?php echo e(URL::asset('assets/images/LOGO HMTI.png')); ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo e(Auth::user()->nama); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item " href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                            key="t-logout">Logout</span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>