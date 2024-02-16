@extends('layouts.app')

@section('content')
    <main class="main-content">
        <style>
            .form-check-input:checked[type="checkbox"] {
                background-image: linear-gradient(310deg, #ffc030 0%, #f56036 100%);
            }
        </style>
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your username and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="username" class="form-control form-control-lg"
                                                value="{{ old('username') ?? 'admin' }}" aria-label="Username">
                                            @error('username')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control form-control-lg"
                                                    aria-label="Password" value="password" id="password">
                                                @error('password')
                                                    <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                                @enderror
                                                <span class="input-group-text" id="show-password-toggle"><i
                                                        class="fa fa-eye" aria-hidden="true"></i></span>
                                            </div>

                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        Forgot you password? Reset your password
                                        <a href="{{ route('reset-password') }}"
                                            class="text-dark text-gradient font-weight-bold">here</a>
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('register') }}"
                                            class="text-dark text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div
                                class="position-relative bg-dark h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                                <span class="mask bg-gradient-dark opacity-6"></span>
                                <img src="{{ asset('/img/logos/logo_hmti.png') }}" alt="LOGO HMTI">
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Himpunan Mahasiswa
                                    Teknologi Informasi"</h4>
                                <p class="text-white position-relative">Jurusan Teknologi Informasi Politeknik Negeri
                                    Malang.</p>
                                <p class="text-white position-relative">#TI_FAST #TI_BRAVO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
