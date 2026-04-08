@extends('layouts.master-without-page-title')

@section('title')
    Document
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Project Event R&D</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">R&D</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Events</h4>
                </div>
                <div class="card-body">
                    {{-- Button Modals --}}
                    <div class="row">
                        <div class="col-sm-8 col-lg-10">
                            <div class="mb-2">
                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal6">+ Add
                                    Data</button>
                            </div>
                        </div>
                    </div>
                    {{-- Button Modals End --}}

                    {{-- Modals --}}
                    <div class="modal fade" id="modal6">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-between">
                                    <h5 class="modal-title">Tambah Data</h5>
                                    <button type="button" class="btn btn-sm btn-label-danger btn-icon"
                                        data-bs-dismiss="modal">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group auth-form-group-custom mb-3">
                                        <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                                class="mdi mdi-calendar-outline auti-custom-input-icon"></i></span>
                                        <input type="text" class="form-control"
                                            placeholder="{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}"
                                            aria-label="Username" name="pic_name" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <form action="{{ route('tasks.store') }}" method="POST" id="formTask" novalidate>
                                        @csrf
                                        <div class="input-group auth-form-group-custom mb-3">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon3"><i
                                                    class="mdi mdi-bank-outline auti-custom-input-icon"></i></span>
                                            <select type="text" class="form-control" id="departemen" name="department">
                                                <option value="">Pilih Departemen</option>
                                                <option value="Spinning">Spinning</option>
                                                <option value="Ring Rope">Ring Rope</option>
                                                <option value="Netting">Netting</option>
                                                <option value="Finishing">Finishing</option>
                                            </select>
                                            <div class="invalid-feedback">Departemen wajib dipilih</div>
                                        </div>

                                        <div class="input-group auth-form-group-custom mb-3">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon1"><i
                                                    class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                            <input type="text" class="form-control" placeholder="PIC"
                                                aria-label="Username" id="pic" name="pic_name"
                                                aria-describedby="basic-addon1">
                                            <div class="invalid-feedback">PIC harus diisi</div>
                                        </div>

                                        <div class="input-group auth-form-group-custom mb-3">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon1"><i
                                                    class="mdi mdi-book-outline auti-custom-input-icon"></i></span>
                                            <input type="text" class="form-control" placeholder="Subject"
                                                aria-label="Username" id="subject" name="name"
                                                aria-describedby="basic-addon1">
                                            <div class="invalid-feedback">Subject minimal 10 karakter</div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    {{-- Modal End --}}

                    <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Departemen</th>
                                <th class="text-center">Nomor Project</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index => $task)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $task->created_at->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ $task->department }}</td>
                                    <td>{{ $task->code }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        @if (strtolower($task->status) == 'in progress')
                                            <span class="badge alert-label-info">{{ $task->status }}</span>
                                        @else
                                            <span class="badge alert-label-primary">{{ $task->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('event.show', $task->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye me-1"></i>
                                            detail
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables-base.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const modal = document.getElementById("modal6");
            const form = document.getElementById("formTask");
            const department = document.getElementById("departemen");
            const pic = document.getElementById("pic");
            const subject = document.getElementById("subject");

            // ===== RESET FUNCTION =====
            function resetForm() {
                form.reset(); // kosongkan semua input
                department.classList.remove("is-invalid", "is-valid");
                pic.classList.remove("is-invalid", "is-valid");
                subject.classList.remove("is-invalid", "is-valid");
            }

            // ===== EVENT MODAL CLOSE =====
            modal.addEventListener('hidden.bs.modal', function() {
                resetForm();
            });

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("formTask");
            const department = document.getElementById("departemen");
            const pic = document.getElementById("pic");
            const subject = document.getElementById("subject");

            let isSubmitted = false; // 🔥 kunci utama

            // ===== VALIDATION FUNCTIONS =====
            function validateDepartment(showAlert = false) {
                if (department.value === "") {
                    department.classList.add("is-invalid");
                    department.classList.remove("is-valid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Departemen belum dipilih',
                            text: 'Silakan pilih departemen'
                        });
                    }
                    return false;
                }

                department.classList.remove("is-invalid");
                department.classList.add("is-valid");
                return true;
            }

            function validatePic(showAlert = false) {
                const value = pic.value.trim();

                if (value === "") {
                    pic.classList.add("is-invalid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'PIC kosong',
                            text: 'PIC wajib diisi'
                        });
                    }
                    return false;
                }

                if (value.length < 3) {
                    pic.classList.add("is-invalid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'PIC terlalu singkat',
                            text: 'Minimal 3 karakter'
                        });
                    }
                    return false;
                }

                pic.classList.remove("is-invalid");
                pic.classList.add("is-valid");
                return true;
            }

            function validateSubject(showAlert = false) {
                const value = subject.value.trim();

                if (value === "") {
                    subject.classList.add("is-invalid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Subject kosong',
                            text: 'Subject wajib diisi'
                        });
                    }
                    return false;
                }

                if (value.length < 5) {
                    subject.classList.add("is-invalid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Subject terlalu singkat',
                            text: 'Minimal 5 karakter'
                        });
                    }
                    return false;
                }

                subject.classList.remove("is-invalid");
                subject.classList.add("is-valid");
                return true;
            }

            // ===== REALTIME (TANPA ALERT) =====
            department.addEventListener("change", () => validateDepartment(false));
            pic.addEventListener("input", () => validatePic(false));
            subject.addEventListener("input", () => validateSubject(false));

            // ===== SUBMIT =====
            form.addEventListener("submit", function(e) {

                isSubmitted = true; // 🔥 tandai sudah submit

                // cek satu per satu (alert hanya muncul di sini)
                if (!validateDepartment(true)) {
                    e.preventDefault();
                    department.focus();
                    return;
                }

                if (!validatePic(true)) {
                    e.preventDefault();
                    pic.focus();
                    return;
                }

                if (!validateSubject(true)) {
                    e.preventDefault();
                    subject.focus();
                    return;
                }

            });

        });
    </script>
@endsection
