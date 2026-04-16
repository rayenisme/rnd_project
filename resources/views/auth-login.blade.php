@extends('layouts.master-without-nav')

@section('title')
    Login
@endsection

@section('css')
    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="logo-dark">
                                <img src="{{ asset('assets/images/myjournal.svg') }}" alt="" height="34"
                                    class="auth-logo logo-dark mx-auto">
                            </a>
                            <a href="{{ url('/') }}" class="logo-dark">
                                <img src="{{ asset('assets/images/myjournal.svg') }}" alt="" height="34"
                                    class="auth-logo logo-light mx-auto">
                            </a>


                            <h4 class="mt-4">Welcome Back !</h4>
                        </div>

                        <div class="p-2 mt-5">
                            <form class="" action="{{ URL('/login') }}" method="POST">
                                @csrf
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                            class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text"
                                        class="form-control @if ($errors->has('username')) is-invalid @elseif(old('username')) is-valid @endif"
                                        placeholder="username" aria-label="Username" aria-describedby="basic-addon1"
                                        name="username" value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('username') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i
                                            class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password"
                                        class="form-control @if ($errors->has('password')) is-invalid @endif"
                                        id="userpassword" placeholder="password" aria-label="password"
                                        aria-describedby="basic-addon2" name="password">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="pt-3 text-center">
                                    <button type="submit" class="btn btn-primary w-xl waves-effect waves-light">Log
                                        In</button>
                                </div>

                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                ©
                                My Journal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginError = document.body.dataset.loginError;

            // SweetAlert jika login gagal dari server
            if (loginError) {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: loginError,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Coba Lagi'
                });

                // reset password field
                const passwordInput = document.getElementById('passwordInput');
                if (passwordInput) passwordInput.value = '';
            }

            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                const usernameInput = document.querySelector('input[name="username"]');
                const passwordInput = document.getElementById('passwordInput');

                // Hapus border merah/hijau saat mengetik
                [usernameInput, passwordInput].forEach(input => {
                    input.addEventListener('input', function() {
                        input.classList.remove('is-invalid', 'is-valid');
                    });
                });

                // Cek input kosong sebelum submit
                loginForm.addEventListener('submit', function(e) {
                    let emptyFields = [];
                    if (!usernameInput.value.trim()) emptyFields.push('Username');
                    if (!passwordInput.value.trim()) emptyFields.push('Password');

                    if (emptyFields.length > 0) {
                        e.preventDefault(); // cegah submit
                        Swal.fire({
                            icon: 'warning',
                            title: 'Form Belum Lengkap',
                            text: emptyFields.join(' dan ') + ' harus diisi!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    </script>
@endsection
