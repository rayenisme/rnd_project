@extends('layouts.master-without-page-title')

@section('title')
    Dashboard
@endsection

@section('css')
    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
    <!--    end row -->

    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-cart-plus fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Overall Sales</h4>
                    <div class="dropdown card-addon">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-sidebar"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Total sales</p>
                                    <h5 class="mb-0">$12,253</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>2.2%
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Latest sales</p>
                                    <h5 class="mb-0">$34,254</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>2.1%
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Last sales</p>
                                    <h5 class="mb-0">$32,695</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>1.8%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="sales_figures" data-colors='["--bs-info", "--bs-success"]' class="apex-charts" dir="ltr">
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xl-4">
                    <div class="card bg-danger-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-1.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-danger">
                                    <i class="mdi mdi-buffer mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-danger mb-1">Total balance</p>
                                    <h4 class="mb-0">$1,452.55</h4>
                                </div>
                            </div>
                            <div class="hstack gap-2 mt-3">
                                <button class="btn btn-light">Transfer</button>
                                <button class="btn btn-info">Request</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card bg-success-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-2.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-success">
                                    <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-success mb-1">Upcoming payments</p>
                                    <h4 class="mb-0">$120</h4>
                                </div>
                            </div>
                            <div class="mt-3 mb-2">
                                <p class="mb-0">4 not confirmed</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card bg-info-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-3.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-info">
                                    <i class="mdi mdi-webhook mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-info mb-1">Finished appt.</p>
                                    <h4 class="mb-0">72</h4>
                                </div>
                            </div>
                            <div class="mt-3 mb-2">
                                <p class="mb-0"><span class="text-primary me-2 fs-14"><i
                                            class="fas fa-caret-up me-1"></i>3.4%</span>vs last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end row -->
            {{-- <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-hockey-puck fs-14 text-muted"></i>
                            </div>
                            <h4 class="card-title mb-0">Sales by product category</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-brightness-5 text-primary me-2"></i>Clothes <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-briefcase-variant-outline text-danger me-2"></i>Kids
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-cart-arrow-right text-info me-2"></i>Cosmetics <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-checkbox-multiple-blank text-warning me-2"></i>Men
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-chess-queen text-success me-2"></i>Kitchen <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-church text-info me-2"></i>Decor <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-city text-warning me-2"></i>Outdoor <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-currency-usd-circle text-primary me-2"></i>Lighting
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-gamepad-circle text-danger me-2"></i>Dining <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-hexagon-multiple text-info me-2"></i>Women <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <div id="gradient_chart"
                                            data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-info", "--bs-dark", "--bs-purple", "--bs-orange"]'
                                            class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="overflow-y: auto; height: 304px;" data-simplebar="">
                        <div class="card-header card-header-bordered">
                            <div class="card-icon text-muted"><i class="fa fa-clipboard-list fs-14"></i></div>
                            <h3 class="card-title">Recent activities</h3>
                            <div class="card-addon">
                                <button class="btn btn-sm btn-label-primary">See all</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-timed">
                                <div class="timeline-item">
                                    <span class="timeline-time">10:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-primary"></i></div>
                                    <div class="timeline-content">
                                        <div>
                                            <span>Meeting with</span>
                                            <div class="avatar-group ms-2">
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-3.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">14:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-danger"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Received a new feedback on <a href="#">GoFinance</a> App
                                            product.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">15:20</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-success"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt
                                            ut labore et dolore magna.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">17:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-info"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Make Deposit <a href="#">USD 700</a> o ESL.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- end row -->

    {{-- <div class="row">
        <div class="col-xxl-8 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-layer-group fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Top Selling</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <div id="products" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="d-grid gap-2">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">48%</span>
                                        <span class="text-muted">Sunday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                            style="width: 48%;"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">100%</span>
                                        <span class="text-muted">Monday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                            style="width: 100%;"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">40%</span>
                                        <span class="text-muted">Tuesday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                            style="width: 40%;"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">68%</span>
                                        <span class="text-muted">Wednesday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                            style="width: 68%;"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">56%</span>
                                        <span class="text-muted">Thursday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                            style="width: 56%;"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">80%</span>
                                        <span class="text-muted">Friday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                            style="width: 80%;"></div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">80%</span>
                                        <span class="text-muted">Saturday</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                            style="width: 92%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xxl-4 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-user-friends fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">User by traffic</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="user_traffic" data-colors='["--bs-info", "--bs-primary"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div> --}}
    <!-- end row -->

    @if (session('login_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: '{{ session('login_success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>
@endsection
