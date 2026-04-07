@extends('layouts.master-without-nav')

@section('title')
    Login
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
                            <a href="index.html" class="logo-dark">
                                <img src="{{ URL::asset('build/images/r&d.svg') }}" alt="" height="15"
                                    class="auth-logo logo-dark mx-auto">
                            </a>
                            <a href="index.html" class="logo-dark">
                                <img src="{{ URL::asset('build/images/r&d.svg') }}" alt="" height="15"
                                    class="auth-logo logo-light mx-auto">
                            </a>


                            <h4 class="mt-4">Welcome Back !</h4>
                        </div>

                        <div class="p-2 mt-5">
                            <form class="" action="index">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                            class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" class="form-control" placeholder="admin@coducuks.in"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i
                                            class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" class="form-control" id="userpassword" placeholder="admin123"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="mb-sm-5">
                                    <div class="form-check float-sm-start">
                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                    </div>
                                    <div class="float-sm-end">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                                            Forgot your password?</a>
                                    </div>
                                </div>

                                <div class="pt-3 text-center">
                                    <a href="{{ url('index') }}" class="btn btn-primary w-xl waves-effect waves-light">Log
                                        In</a>
                                </div>

                                <div class="mt-3 text-center">
                                    <p class="mb-0">Don't have an account ? <a href="{{ url('/register') }}"
                                            class="fw-medium text-primary"> Register </a> </p>
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
