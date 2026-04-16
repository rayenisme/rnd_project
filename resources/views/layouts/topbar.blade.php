<!-- Start topbar -->
<header id="page-topbar">
    <div class="navbar-header">

        <!-- Logo -->

        <!-- Start Navbar-Brand -->
        <div class="navbar-logo-box">
            <a href="{{ url('index') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/myjournal-logo.svg') }}" alt="logo-sm-dark" height="24">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/myjournal.svg') }}" alt="logo-dark" height="28">
                </span>
            </a>

            <a href="{{ url('index') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/myjournal-logo.svg') }}" alt="logo-sm-light" height="24">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/myjournal.svg') }}" alt="logo-light" height="28">
                </span>
            </a>

            <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn">
                <i class="mdi mdi-menu-open align-middle fs-19"></i>
            </button>
        </div>
        <!-- End navbar brand -->

        <!-- Start menu -->
        <div class="d-flex justify-content-between menu-sm px-3 ms-auto">
            <div class="d-flex align-items-center gap-2">
                <div class="dropdown d-none d-lg-block">
                    <!--Start App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="fab fa-sistrix fs-17 align-middle"></span>
                        </div>
                    </form>
                    <!--End App Search-->
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <!--Start App Search-->
                {{-- <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="fab fa-sistrix fs-17 align-middle"></span>
                    </div>
                </form> --}}
                <!--End App Search-->

                <!-- Start Notification -->
                {{-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm top-icon" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell align-middle"></i>
                        <span class="btn-marker"><i class="marker marker-dot text-danger"></i><span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-md dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3 bg-info">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-white m-0"><i class="far fa-bell me-2"></i> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="badge bg-info-subtle text-info"> 8+</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-primary me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-file-document-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">New report has been recived</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-success me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-cart-variant"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Last order was completed</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hour ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-danger me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-account-group"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Completed meeting canceled</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 5 hour ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-warning me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-send-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">New feedback received</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 6 hour ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-secondary me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-download-box"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">New update was available</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-info me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-hexagram-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Your password was changed</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 2 day ago</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Notification -->

                <!-- Start Activities -->
                {{-- <div class="d-inline-block activities">
                    <button type="button" class="btn btn-sm top-icon" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas-rightsidabar">
                        <i class="fas fa-table align-middle"></i>
                    </button>
                </div> --}}
                <!-- End Activities -->

                <!-- Start Profile -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded avatar-2xs p-0" src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                            alt="Header Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                        <button class="dropdown-item align-items-center gap-3 px-3" data-bs-toggle="modal"
                            data-bs-target="#profileModal">
                            <i class="far fa-address-card"></i>
                            <span class="grid-nav-content text-start">Profile Setting</span>
                        </button>
                        <hr class="my-2">
                        <button class="dropdown-item align-items-center gap-3 px-3" data-bs-toggle="modal"
                            data-bs-target="#passwordModal">
                            <i class="fas fa-key"></i>
                            <span class="grid-nav-content text-start">Password Setting</span>
                        </button>
                        <hr class="my-2">
                        <button id="logoutBtn" class="dropdown-item align-items-center gap-3 px-3" type="button">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="grid-nav-content text-start">Sign out</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Profile -->
        </div>
    </div>
    <!-- End menu -->
    </div>

    {{-- Modal Profile --}}
    <div class="modal fade" data-bs-backdrop="static" aria-hidden="true" id="profileModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Update Profile</h5>
                    <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal">
                        <i class="mdi mdi-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/profile/update') }}" id="profileForm" method="POST">
                        @csrf
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1">
                                <i class="mdi mdi-account-circle-outline auti-custom-input-icon"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ session('user_profile.name') }}"
                                aria-label="name" id="name" name="name" aria-describedby="basic-addon1">
                            <div class="invalid-feedback">Full Name</div>
                        </div>
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                    class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                            <input type="text" class="form-control" value="{{ session('user_profile.username') }}"
                                aria-label="Username" id="username" name="username"
                                aria-describedby="basic-addon1">
                            <div class="invalid-feedback">Username</div>
                        </div>
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                    class="mdi mdi-email auti-custom-input-icon"></i></span>
                            <input type="email" class="form-control" value="{{ session('user_profile.email') }}"
                                aria-label="Email" id="email" name="email" aria-describedby="basic-addon1">
                            <div class="invalid-feedback">Email</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" id="updateBtn" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Password --}}
    <div class="modal fade" data-bs-backdrop="static" aria-hidden="true" id="passwordModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Password Setting</h5>
                    <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"
                        id="closePasswordModal">
                        <i class="mdi mdi-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/password/update') }}" id="passwordForm" method="POST">
                        @csrf
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                    class="mdi mdi-lock auti-custom-input-icon"></i></span>
                            <input type="password" class="form-control" placeholder="New Password"
                                aria-label="password" id="password" name="password"
                                aria-describedby="basic-addon1">
                            <button type="button" class="input-group-text bg-opacity-0 fs-16" id="togglePassword">
                                <i class="mdi mdi-eye-outline" id="iconPassword"></i>
                            </button>
                            <div class="invalid-feedback">Password</div>
                        </div>
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                    class="mdi mdi-lock auti-custom-input-icon"></i></span>
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                aria-label="confirm_password" id="confirm_password" name="password_confirmation"
                                aria-describedby="basic-addon1">
                            <button type="button" class="input-group-text bg-opacity-0 fs-16"
                                id="toggleConfirmPassword">
                                <i class="mdi mdi-eye-outline" id="iconConfirmPassword"></i>
                            </button>
                            <div class="invalid-feedback">Confirm Password</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" name="btnPassword" class="btn btn-info" id="btnPassword">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End topbar -->
