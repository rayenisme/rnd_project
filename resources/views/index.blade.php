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
                <div class="card-body pb-1">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fs-16 fw-medium pt-1">Events</h3>
                            <a href="{{ url('/event') }}" class="btn btn-outline-info">See details</a>
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
                                            <p class="text-info mb-1">IN PORGRESS</p>
                                            <h4 class="mb-0">{{ $inProgressCount }} Event</h4>
                                        </div>
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
                                            <p class="text-success mb-1">CLEAR</p>
                                            <h4 class="mb-0">{{ $clearCount }} Event</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card bg-danger-subtle"
                                style="background: url('build/images/dashboard/dashboard-shape-1.png'); background-repeat: no-repeat; background-position: bottom center; ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-danger">
                                            <i class="mdi mdi-buffer mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-danger mb-1">URGENT</p>
                                            <h4 class="mb-0">{{ $urgentCount }} Event</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
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
                    </div> --}}
                </div>
            </div>
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

    <div class="card">
        <div class="col-12">
            <div id="event_figures" data-colors='["--bs-info", "--bs-success"]' class="apex-charts" dir="ltr">
            </div>
        </div>
    </div>
    <!-- end row -->

    {{-- <div class="col-xxl-3">
        <div class="row">
            <div class="col-xxl-12 col-xl-6 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select form-select-sm">
                                <option value="">Departments</option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h4 class="card-title mb-4">Projects Analytics</h4>
                        <div id="pattern_chart"
                            data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-info"]'
                            class="apex-charts" dir="ltr"></div>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-primary font-size-10 me-1"></i> Product A</p>
                                    <h5>42 %</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-success font-size-10 me-1"></i> Product B</p>
                                    <h5>26 %</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-warning font-size-10 me-1"></i> Product C</p>
                                    <h5>42 %</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-xxl-3">
        <div class="row">
            <div class="col-xxl-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select form-select-sm" id="departmentSelect">
                                <option value="">All Departments</option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h4 class="card-title mb-4 mt-0">Projects Analytics</h4>

                        <div id="pattern_chart" class="apex-charts" dir="ltr"></div>

                        <div class="row" id="statusPercentages">
                            <!-- Persentase akan diupdate via JS -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-6">
                <div class="card">
                    <h3 class="mb-2 fs-16 ms-3 mt-3">Departments</h3>
                    <div class="card-body">
                        <div class="timeline">
                            @foreach ($departments as $department)
                                @php
                                    $tasks = \App\Models\Tasks::where('department_id', $department->id)->get();
                                    $totalEvents = $tasks->count();
                                    $inProgress = $tasks->where('status', 'In Progress')->count();
                                    $clear = $tasks->where('status', 'Clear')->count();
                                    $urgent = $tasks->where('is_urgent', 1)->count();
                                @endphp

                                <div class="timeline-item border shadow-sm mb-1">
                                    <div class="timeline-pin">
                                        <i class="marker marker-dot text-primary"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="mb-2 fs-12">{{ $department->name }}</h5>

                                        <div class="accordion" id="accordionDepartment{{ $department->id }}">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fs-12" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseDept{{ $department->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseDept{{ $department->id }}">
                                                        Event Details
                                                    </button>
                                                </h2>

                                                <div id="collapseDept{{ $department->id }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionDepartment{{ $department->id }}">
                                                    <div class="accordion-body">
                                                        <p class="mb-1 me-1">Events : <span
                                                                class="alert-label-info px-2 rounded">In
                                                                Progress :
                                                                {{ $inProgress }}</span> - <span
                                                                class="alert-label-primary px-2 rounded">Clear :
                                                                {{ $clear }}</span> - <span
                                                                class="alert-label-danger px-2 rounded">Urgent :
                                                                {{ $urgent }}</span></p>
                                                        <p class="mb-1">Total Events: {{ $totalEvents }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    {{-- Departments --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const baseColors = ["#556ee6", "#34c38f", "#f46a6a", "#50a5f1", "#f1b44c", "#ff6b6b", "#6f42c1",
                "#fd7e14", "#0dcaf0", "#198754"
            ];

            const options = {
                chart: {
                    type: 'donut',
                    height: 250
                },
                series: [],
                labels: [],
                colors: [],
                tooltip: {
                    enabled: true,
                    theme: 'light', // tooltip putih
                    fillSeriesColor: false, // jangan ikuti warna chart
                    style: {
                        fontSize: '14px',
                        fontFamily: undefined,
                        color: '#000' // teks hitam
                    },
                    y: {
                        formatter: function(val, opts) {
                            const total = opts.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            const percent = total ? ((val / total) * 100).toFixed(1) : 0;
                            return `${val} task (${percent}%)`;
                        }
                    },
                    marker: {
                        show: true
                    }
                },
                legend: {
                    labels: {
                        colors: '#000'
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#pattern_chart"), options);
            chart.render();

            function loadChartData(departmentId) {
                const url = departmentId ?
                    `/dashboard/chart-data/${departmentId}` :
                    `/dashboard/chart-data`;

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        let colors = [];
                        if (!departmentId) {
                            for (let i = 0; i < data.labels.length; i++) {
                                colors.push(baseColors[i % baseColors.length]);
                            }
                        } else {
                            colors = ["#556ee6", "#34c38f", "#f46a6a"];
                        }

                        const total = data.series.reduce((a, b) => a + b, 0);
                        const percentages = total ? data.series.map(s => ((s / total) * 100).toFixed(1)) : data
                            .series.map(() => 0);

                        chart.updateOptions({
                            series: data.series,
                            labels: data.labels,
                            colors: colors
                        });

                        const container = document.getElementById('statusPercentages');
                        container.innerHTML = '';
                        data.labels.forEach((label, i) => {
                            container.innerHTML += `
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <p class="mb-2 text-truncate">
                                    <i class="mdi mdi-circle" style="color:${colors[i]}; font-size:10px; margin-right:4px;"></i> ${label}
                                </p>
                                <h5>${data.series[i]} (${percentages[i]}%)</h5>
                            </div>
                        </div>`;
                        });
                    });
            }

            // Load default chart (All Departments)
            loadChartData("");

            // Realtime update saat select berubah
            document.getElementById('departmentSelect').addEventListener('change', function() {
                loadChartData(this.value);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let months = @json($months);
            let series = @json($series);

            let options = {
                chart: {
                    type: 'bar',
                    height: 400,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%',
                        borderRadius: 8,
                    }
                },
                colors: ['#556ee6', '#f46a6a'], // Urgent merah, Standard biru
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.3,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        inverseColors: false
                    }
                },
                series: series,
                xaxis: {
                    categories: months,
                    labels: {
                        rotate: -45,
                        style: {
                            fontSize: '12px',
                            fontWeight: 500
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Task'
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        colors: ['#fff']
                    },
                    formatter: function(val) {
                        return val;
                    }
                },
                tooltip: {
                    theme: 'light', // background putih
                    fillSeriesColor: false, // penting agar tooltip tidak ikut warna bar
                    shared: false, // hanya tampilkan series yang dihover
                    y: {
                        formatter: val => val + ' task'
                    }
                },
                legend: {
                    show: false
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['transparent']
                },
                grid: {
                    borderColor: '#f1f1f1',
                    strokeDashArray: 4
                }
            };

            let chart = new ApexCharts(document.querySelector("#event_figures"), options);
            chart.render();
        });
    </script>
@endsection
