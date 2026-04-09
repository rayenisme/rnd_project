@extends('layouts.master-without-nav')

@section('title')
    Coming Soon
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid coming-bg overflow-hidden">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-5 col-xxl-3 text-center">
                <h2 class="text-white text-center display-1 fw-semibold mb-5 coming-title">Coming soon</h2>
                <a href="{{ url('/index') }}"
                    class="text-white display-1 fw-semibold fs-16 mb-5 coming-title text-decoration-underline">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Plugins js-->
    <script src="{{ URL::asset('build/libs/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>

    <!-- Countdown js -->
    <script src="{{ URL::asset('build/js/pages/coming-soon.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
