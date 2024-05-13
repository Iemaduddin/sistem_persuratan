@extends('layouts.master-without-nav')
@section('title')
    Home
@endsection
@section('content')
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
                        <div class="card h-50 w-50 d-flex justify-content-center align-items-center">
                            <div class="row h-100 w-100">
                                <div class="col-xxl-6 col-md-12 col-sm-12 card-body p-5 pt-4">
                                    <center>
                                        <h1>HMTI</h1>
                                        <p>Login to Acces the Website.</p>
                                    </center>
                                    <form class="mt-4 pt-2" action="{{ route('login.perform') }}" method="POST">
                                        @csrf
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text"
                                                class="form-control @error('login') is-invalid @enderror"id="input-username"
                                                placeholder="Enter Email/Username" name="login"
                                                @if (Cookie::has('userUsername')) value="{{ Cookie::get('userUsername') }}" @endif>
                                            @error('login')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-username">Email/Username</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                name="password" id="password-input" placeholder="Enter Password"
                                                @if (Cookie::has('userPassword')) value="{{ Cookie::get('userPassword') }}" @endif>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                                        name="rememberMe" @if (Cookie::has('userUsername')) checked @endif
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
                                    </form>
                                </div>
                                <div
                                    class="col-xxl-6 card-body brandLogo bg-dark h-100 align-items-center text-center pt-4">
                                    <img src="{{ asset('assets/images/LOGO HMTI.png') }}" alt="Logo HMTI" class="h-75">
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
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/pages/pass-addon.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/feather-icon.init.js') }}"></script>
@endsection
