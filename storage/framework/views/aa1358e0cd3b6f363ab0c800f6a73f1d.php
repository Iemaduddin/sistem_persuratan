<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <style>
                @media screen and (max-width: 992px) {
                    .brandLogo {
                        display: none;
                    }

                    * {
                        overflow-y: none;
                    }
                }
            </style>
            <div class="row g-0">
                <!-- end col -->
                <div class="col-xxl-12 col-lg-12 col-md-12">
                    <div class="auth-bg pt-md-5 p-4 d-flex align-items-center justify-content-center">
                        <div class="bg-overlay"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                        <div class="card d-flex justify-content-center align-items-center" style="height:31rem;width:60rem">
                            <div class="row h-100 w-100">
                                <div class="col-xxl-6 col-md-12 col-sm-12 card-body p-5 pt-4">
                                    <center>
                                        <h1>HMTI</h1>
                                        <p>Login to Acces the Website.</p>
                                    </center>
                                    <form class="mt-4 pt-2" action="<?php echo e(route('login.perform')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="input-username"
                                                placeholder="Enter Email/Username" name="login"
                                                <?php if(Cookie::has('userUsername')): ?> value="<?php echo e(Cookie::get('userUsername')); ?>" <?php endif; ?>>
                                            <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <label for="input-username">Email/Username</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="password" id="password-input" placeholder="Enter Password"
                                                <?php if(Cookie::has('userPassword')): ?> value="<?php echo e(Cookie::get('userPassword')); ?>" <?php endif; ?>>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-check font-size-15">
                                                    <input class="form-check-input " type="checkbox" id="remember-check"
                                                        name="rememberMe" <?php if(Cookie::has('userUsername')): ?> checked <?php endif; ?>
                                                        id="rememberMe">
                                                    <label class="form-check-label font-size-13" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log
                                                In</button>
                                        </div>

                                        <p class="text-center">&mdash; Or Login With &mdash;</p>

                                        <div class="mb-3 text-center">
                                            <a href="<?php echo e(route('redirectProvider', ['provider' => 'google'])); ?>"
                                                class="btn btn-danger waves-effect waves-light rounded-5" type="submit"><i
                                                    class="mdi mdi-18px mdi-google"></i></a>
                                            <a href="<?php echo e(route('redirectProvider', ['provider' => 'github'])); ?>"
                                                class="btn btn-dark waves-effect waves-light rounded-5" type="submit"><i
                                                    class="mdi mdi-18px mdi-github"></i></a>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-xxl-6 card-body brandLogo bg-dark h-100 align-items-center text-center pt-4">
                                    <img src="<?php echo e(asset('assets/images/LOGO HMTI.png')); ?>" alt="Logo HMTI" class="h-75">
                                    <h5 class="text-light">Sistem Persuratan</h5>
                                    <h4 class="text-light">Himpunan Mahasiswa Teknologi Informasi</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
    </div>
    <!-- end container fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/js/pages/pass-addon.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/feather-icon.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/auth/login.blade.php ENDPATH**/ ?>