@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <img src="{{ asset('img/logos/logo_polinema.png') }}" alt="Logo POLINEMA" class="img-fluid"
                            width="85px">
                        <img src="{{ asset('img/logos/logo_jti.png') }}" alt="Logo JTI" class="img-fluid" width="85px">
                        <img src="{{ asset('img/logos/logo_hmti.png') }}" alt="Logo HMTI" class="img-fluid" width="100px">
                        <h1 class="text-white">Selamat Datang!</h1>
                        <p class="text-lead text-white">Silahkan untuk <i>Organizing Committee register account</i> terlebih
                            dahulu.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-md-n11 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center">
                            <h5><i>Register Account</i></h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="nim" class="form-control" placeholder="NIM"
                                        aria-label="NIM" value="{{ old('nim') }}">
                                    @error('nim')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Full Name"
                                        aria-label="Nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        aria-label="Name" value="{{ old('username') }}">
                                    @error('username')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        aria-label="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                            aria-label="Password" id="password">
                                        <span class="input-group-text" id="show-password-toggle"><i class="fa fa-eye"
                                                aria-hidden="true"></i></span>
                                        @error('password')
                                            <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                            Conditions</a>
                                    </label>
                                    @error('terms')
                                        <p class='text-danger text-xs'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
