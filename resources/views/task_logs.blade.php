@extends('layouts.master-without-page-title')

@section('title')
    Detail Project
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- searchpanes datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-searchpanes-bs5/css/searchPanes.bootstrap5.min.css') }}"
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
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Detail Project</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/index') }}">R&D</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/event') }}">Event</a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card border">
                <div class="card-header card-header-bordered justify-content-between">
                    <h3 class="card-title">Timeline</h3>
                    <button class="btn btn-sm btn-outline-info {{ $task->status == 'Clear' ? 'd-none' : '' }}"
                        data-bs-toggle="modal" data-bs-target="#timeline">Update
                    </button>
                </div>
                {{-- Modals --}}
                <div class="modal fade" id="timeline">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title">Update Timeline</h5>
                                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                            class="mdi mdi-calendar-outline auti-custom-input-icon"></i></span>
                                    <input type="text" class="form-control"
                                        placeholder="{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}"
                                        aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                                <form action="{{ route('event.store', $task->id) }}" method="POST"
                                    enctype="multipart/form-data" id="formTaskLog" novalidate>
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <div class="mb-3">
                                        <label for="description" class="form-label mb-1">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Deskripsi wajib diisi terlebih dahulu
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-1">Note
                                            (Opsional)</label>
                                        <input type="text" name="note" class="form-control"
                                            id="exampleFormControlInput1" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label mb-1">Foto</label> <input
                                            class="form-control" type="file" name="image" id="formFile" />
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_clear" name="is_clear"
                                            value="1" />
                                        <label class="form-check-label fw-bold" for="is_clear" id="swal-7">Event telah
                                            selesai
                                            (Clear)</label>
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


                <div class="card-body">
                    <div class="timeline">
                        @foreach ($task->logs as $log)
                            <div class="timeline-item">
                                <div class="timeline-pin">
                                    <i class="marker marker-dot text-primary"></i>
                                </div>
                                <div class="timeline-content">
                                    <p class="mb-0 fw-bold">{{ $log->created_at->translatedFormat('l, d F Y') }}</p>
                                    <p class="mb-0">{{ \Illuminate\Support\Str::limit($log->description, 60) }}</p>

                                    @if ($log->note || $log->image)
                                        <div class="accordion" id="accordion{{ $log->id }}">
                                            <div class="accordion-item">

                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $log->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $log->id }}">
                                                        Selengkapnya
                                                    </button>
                                                </h2>

                                                <div id="collapse{{ $log->id }}" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordion{{ $log->id }}">

                                                    <div class="accordion-body">

                                                        <p class="mb-0 fw-bold">{{ $log->description }}</p>

                                                        @if ($log->note)
                                                            <p class="text-muted mb-1">
                                                                <span class="text-sm">Note:</span> {{ $log->note }}
                                                            </p>
                                                        @endif

                                                        @if ($log->image)
                                                            <img src="{{ Storage::disk('s3')->url($log->image) }}"
                                                                class="rounded mt-2"
                                                                style="width:85px; height:85px; object-fit:cover; cursor:pointer;"
                                                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                                                onclick="showImage(this.src)">
                                                            <div class="modal fade" id="imageModal" tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    style="width: fit-content">
                                                                    <div class="modal-content bg-transparent border-0">
                                                                        <div class="modal-body text-center p-0">
                                                                            <img id="previewImage" src=""
                                                                                style="max-height:90vh; width:auto; max-width:100%; object-fit:contain;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card border">
                <div class="card-header card-header-bordered justify-content-between mb-0">
                    <h3 class="card-title mb-1">Detail Project</h3>
                </div>
                <div class="card-body">
                    {{-- Subject --}}
                    <div class="d-flex">
                        <p class="col-2 mb-0 fw-bold">Subject</p>
                        <p class="me-2 mb-0">:</p>
                        <p class="text-justify mb-1">
                            {{ $task->name }}
                        <p>
                    </div>
                    <hr class="mt-1 mb-2">
                    {{-- Status --}}
                    <div class="d-flex">
                        <p class="col-2 mb-0 fw-bold">Status</p>
                        <p class="me-2 mb-0">:</p>
                        <p class="alert-label-info px-2 rounded mb-1">
                            {{ $task->status }}
                        <p>
                    </div>
                    <hr class="mt-1 mb-2">
                    {{-- Departemen --}}
                    <div class="d-flex">
                        <p class="col-2 mb-0 fw-bold">Dept.</p>
                        <p class="me-2 mb-1">:</p>
                        <p class="mb-0">
                            {{ $task->department }}
                        </p>
                    </div>
                    <hr class="mt-1 mb-2">
                    {{-- PIC --}}
                    <div class="d-flex">
                        <p class="col-2 mb-0 fw-bold">PIC</p>
                        <p class="me-2 mb-1">:</p>
                        <p class="me-2 mb-0">
                            {{ $task->pic_name }}
                        </p>
                    </div>
                    <hr class="mt-1 mb-2">
                    {{-- Deskripsi --}}
                    <div class="d-flex">
                        <p class="col-2 mb-0 fw-bold">Deskripsi</p>
                        <p class="me-2 mb-0">:</p>
                        <p></p>
                    </div>
                    <form id="formDescription" action="{{ route('event.updateDescription', $task->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <textarea name="description" id="descriptionTextarea" class="form-control" rows="15"
                            {{ $task->status == 'Clear' ? 'readonly' : '' }}>{{ $task->description }}</textarea>

                        <div class="d-flex justify-content-between mt-2">
                            <div class="left">
                                <button type="submit"
                                    class="btn btn-primary {{ $task->status == 'Clear' ? 'd-none' : '' }}"
                                    id="saveDescriptionBtn">
                                    Simpan Deskripsi
                                </button>
                                <button type="button"
                                    class="btn btn-danger {{ $task->status == 'Clear' ? 'd-none' : '' }}"
                                    id="resetDescription">Reset</button>
                            </div>
                            <a href="{{ url('/event') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
    </div>
    <!-- end row -->

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- searchpanes examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-searchpanes/js/dataTables.searchPanes.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-searchpanes-bs5/js/searchPanes.bootstrap5.min.js') }}"></script>

    <!-- select example -->
    <script src="{{ URL::asset('build/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- datatables-extension init js -->
    <script src="{{ URL::asset('build/js/pages/datatables-extension.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>


    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // ===== Checkbox "event clear" =====
            const checkbox = document.getElementById('is_clear');
            if (checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: "Apakah yakin event sudah selesai?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, selesai',
                            cancelButtonText: 'Batal',
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#dc3545'
                        }).then((result) => {
                            if (!result.isConfirmed) {
                                checkbox.checked = false;
                            }
                        });
                    }
                });
            }

            // ===== Reset & Simpan Deskripsi =====
            const form = document.getElementById('formDescription');
            const textarea = document.getElementById('descriptionTextarea');
            const resetBtn = document.getElementById('resetDescription');

            if (textarea && resetBtn) {
                const initialValue = textarea.value; // simpan isi awal

                // Tombol reset
                resetBtn.addEventListener('click', function() {
                    textarea.value = initialValue;
                });

                // Konfirmasi sebelum submit deskripsi
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault(); // hentikan submit default

                        // cek apakah deskripsi berubah
                        if (textarea.value.trim() === initialValue.trim()) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Tidak ada perubahan',
                                text: 'Deskripsi belum berubah!',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                // reset ke value awal jika user ingin batal
                                textarea.value = initialValue;
                            });
                            return; // hentikan proses submit
                        }

                        // jika berubah, konfirmasi simpan
                        Swal.fire({
                            title: 'Yakin ingin mengubah deskripsi?',
                            text: "Deskripsi yang diubah akan tersimpan.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, simpan',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            } else {
                                // jika batal simpan, kembalikan ke value awal
                                textarea.value = initialValue;
                            }
                        });
                    });
                }
            }

        });
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formDescription');
            const saveBtn = document.getElementById('saveDescriptionBtn');
            const textarea = document.getElementById('descriptionTextarea');
            const resetBtn = document.getElementById('resetDescription');

            const initialValue = textarea.value;

            resetBtn.addEventListener('click', function() {
                textarea.value = initialValue;
            });

            // konfirmasi sebelum submit
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // hentikan submit default

                Swal.fire({
                    title: 'Yakin ingin mengubah deskripsi?',
                    text: "Deskripsi yang diubah akan tersimpan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script> --}}

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("formTaskLog");
            const description = document.getElementById("description");
            const note = document.getElementById("exampleFormControlInput1");
            const formFile = document.getElementById("formFile");

            let lastAlert = "";

            // Fungsi validasi deskripsi
            function validateDescription(showAlert = false) {
                const value = description.value.trim();

                if (value === "") {
                    description.classList.add("is-invalid");
                    description.classList.remove("is-valid");

                    if (showAlert && lastAlert !== "empty") {
                        lastAlert = "empty";
                        Swal.fire({
                            icon: 'warning',
                            title: 'Deskripsi kosong',
                            text: 'Deskripsi wajib diisi minimal 10 karakter'
                        });
                    }
                    return false;
                }

                if (value.length < 10) {
                    description.classList.add("is-invalid");
                    description.classList.remove("is-valid");

                    if (showAlert && lastAlert !== "short") {
                        lastAlert = "short";
                        Swal.fire({
                            icon: 'warning',
                            title: 'Deskripsi terlalu singkat',
                            text: 'Minimal 10 karakter'
                        });
                    }
                    return false;
                }

                description.classList.remove("is-invalid");
                description.classList.add("is-valid");
                lastAlert = "";
                return true;
            }

            // Validasi saat mengetik (tanpa alert)
            description.addEventListener("input", function() {
                validateDescription(false);
            });

            // Validasi saat kehilangan fokus (alert jika invalid)
            description.addEventListener("blur", function() {
                validateDescription(true);
            });

            // Submit form
            form.addEventListener("submit", function(e) {
                if (!validateDescription(true)) {
                    e.preventDefault(); // Hentikan submit jika deskripsi invalid
                }
                // Jika valid → submit berjalan normal
            });

        });
    </script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("formTaskLog");
            const description = document.getElementById("description");

            form.addEventListener("submit", function(e) {

                let isValid = true;

                if (description.value.trim() === "") {
                    isValid = false;
                    description.classList.add("is-invalid");
                } else {
                    description.classList.remove("is-invalid");
                    description.classList.add("is-valid");
                }

                if (!isValid) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Form belum lengkap',
                        text: 'Mohon isi deskripsi terlebih dahulu'
                    });
                }
            });

            description.addEventListener("input", function() {
                if (this.value.trim() !== "") {
                    this.classList.remove("is-invalid");
                    this.classList.add("is-valid");
                } else {
                    this.classList.remove("is-valid");
                }
            });

        });
    </script> --}}

    <script>
        function showImage(src) {
            document.getElementById('previewImage').src = src;
        }
    </script>

    <style>
        .image-preview {
            transition: 0.3s;
        }

        .image-preview:hover {
            transform: scale(1.05);
        }
    </style>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('descriptionTextarea');
            const resetBtn = document.getElementById('resetDescription');
            const initialValue = textarea.value;

            resetBtn.addEventListener('click', function() {
                textarea.value = initialValue;
            });
        });
    </script> --}}
@endsection
