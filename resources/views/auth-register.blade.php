@extends('layouts.master-without-nav')

@section('title')
    Register
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <div>
                                <a href="index.html" class="logo-dark">
                                    <img src="{{ URL::asset('build/images/r&d.svg') }}" alt="" height="15"
                                        class="auth-logo logo-dark mx-auto">
                                </a>
                                <a href="index.html" class="logo-light">
                                    <img src="{{ URL::asset('build/images/r&d.svg') }}" alt="" height="15"
                                        class="auth-logo logo-light mx-auto">
                                </a>
                            </div>

                            <h4 class="font-size-18 mt-4">Register account</h4>
                            <p class="text-muted">Get your account now.</p>
                        </div>
                        <div class="p-2 mt-5">
                            <form class="" action="index.html">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon3"><i
                                            class="mdi mdi-email-outline auti-custom-input-icon"></i></span>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email"
                                        aria-label="email" aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                            class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter username"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i
                                            class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" class="form-control" id="userpassword"
                                        placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon2">
                                </div>

                                <div class="mb-5">
                                    <div class="form-check float-start">
                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">I agree to all Terms and
                                            Condition</label>
                                    </div>
                                </div>

                                <div class="text-center pt-3">
                                    <button class="btn btn-primary w-xl waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>

                                <div class="mt-3 text-center">
                                    <p class="mb-0">Already have an account ? <a href="{{ url('auth-login') }}"
                                            class="fw-medium text-primary"> Login </a> </p>
                                </div>
                            </form>
                        </div>
                        <div class="mt-5 text-center">
                            <p>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                ©
                                Research & Development.
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
@endsection
