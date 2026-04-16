@extends('layouts.master-without-page-title')

@section('title')
    Jurnal Harian
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- buttons datatable -->
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">

    <link href="{{ URL::asset('build/libs/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Jurnal Harian</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">My Journal</a></li>
                        <li class="breadcrumb-item active">Jurnal Harian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Button Modals --}}
                    <div class="d-flex justify-content-between mb-2">
                        {{-- <div class="col-sm-8 col-lg-10">
                            <div class="mb-2"> --}}
                        <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal6">+ Add
                            Data</button>
                        {{-- </div>
                        </div>
                        <div class="col-sm-4 col-lg-2 self-item-end">
                            <div class="mb-2"> --}}
                        <button class="btn btn-sm btn-outline-secondary px-3" id="resetFilters">Reset Filter</button>
                        {{-- </div>
                        </div> --}}
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
                                        <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1">
                                            <i class="mdi mdi-calendar-outline auti-custom-input-icon">
                                            </i>
                                        </span>
                                        <input type="text" class="form-control"
                                            placeholder="{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}"
                                            aria-label="Username" name="pic_name" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data"
                                        id="formTask" novalidate>
                                        @csrf
                                        <div class="input-group auth-form-group-custom mb-3">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon3"><i
                                                    class="mdi mdi-bank-outline auti-custom-input-icon"></i></span>
                                            <select type="text" class="form-control" id="department_id"
                                                name="department_id">
                                                <option value="">Pilih Departemen</option>
                                                @foreach ($departments as $dept)
                                                    <option value="{{ $dept->id }}">
                                                        {{ $dept->name }}
                                                    </option>
                                                @endforeach
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

                                        <div class="input-group auth-form-group-custom mb-2">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon1"><i
                                                    class="mdi mdi-book-outline auti-custom-input-icon"></i></span>
                                            <input type="text" class="form-control" placeholder="Subject"
                                                aria-label="Username" id="subject" name="name"
                                                aria-describedby="basic-addon1">
                                            <div class="invalid-feedback">Subject minimal 10 karakter</div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mb-1">Foto</label>

                                            <input class="form-control" type="file" name="image[]" id="formFile"
                                                multiple>
                                            <div class="invalid-feedback" id="imageError">
                                                Foto wajib diupload minimal 1
                                            </div>

                                            <!-- Preview WhatsApp Style -->
                                            <div class="mt-3">
                                                <!-- gambar utama -->
                                                <div id="mainPreview" class="text-center mb-2">
                                                    <img id="mainImage" class="rounded"
                                                        style="max-height:200px; object-fit:contain; display:none;">
                                                </div>

                                                <!-- thumbnail -->
                                                <div id="thumbPreview" class="d-flex gap-2 flex-wrap"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="is_urgent" name="is_urgent">
                                            <label class="form-check-label fw-bold text-danger" for="is_urgent">
                                                Tandai sebagai Urgent
                                            </label>
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

                    {{-- Table Urgent Filter --}}
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-switch bg-danger px-2 py-1 rounded">
                            <input class="form-check-input ms-0" type="checkbox" id="toggleUrgent" role="button">
                            <label class="form-check-label text-white fw-medium fs-12 ms-2"
                                for="toggleUrgent">Urgent</label>
                        </div>
                    </div>

                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="taskTable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nomor Project</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Departemen</th>
                                    <th class="d-none">Priority</th>
                                    <th class="text-center">Status</th>
                                    <th class="d-none">Timeline</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('l, d F Y') }}
                                        </td>
                                        <td>{{ $task->code }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->department_name }}</td>
                                        <td class="d-none">{{ $task->is_urgent ? 'Urgent' : 'Normal' }}</td>
                                        <td>
                                            <span class="d-none">{{ $task->is_urgent ? 'Urgent' : 'Normal' }}</span>
                                            @if (strtolower($task->status) == 'in progress')
                                                <span class="badge alert-label-info">
                                                    {{ $task->status }}
                                                    @if ($task->is_urgent && $task->status != 'Clear')
                                                        <span class="urgent-dot ms-1"></span>
                                                    @endif
                                                </span>
                                            @else
                                                <span class="badge alert-label-primary">
                                                    @if ($task->is_urgent && $task->status != 'Clear')
                                                        <span class="urgent-dot"></span>
                                                    @endif
                                                    {{ $task->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-none">{!! nl2br(e($task->timeline)) !!}</td>
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

    <!-- buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>

    <!-- Bootstrap datepicker -->
    <script src="{{ URL::asset('build/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-datetimepicker.init.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const modal = document.getElementById("modal6");
            const form = document.getElementById("formTask");
            const department = document.getElementById("department_id");
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

            const checkbox = document.getElementById('is_urgent');
            if (checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        Swal.fire({
                            title: 'Priority',
                            text: "This event is Urgent Priority.",
                            icon: 'warning',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            }

            const form = document.getElementById("formTask");
            const department = document.getElementById("department_id");
            const pic = document.getElementById("pic");
            const subject = document.getElementById("subject");
            const imageInput = document.getElementById("formFile");

            let isSubmitted = false;

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

            function validateImage(showAlert = false) {
                const files = imageInput.files;

                if (!files || files.length === 0) {
                    imageInput.classList.add("is-invalid");
                    imageInput.classList.remove("is-valid");

                    if (showAlert) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Foto belum dipilih',
                            text: 'Minimal upload 1 foto'
                        });
                    }
                    return false;
                }

                // validasi setiap file
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // tipe file
                    if (!file.type.startsWith('image/')) {
                        if (showAlert) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Format tidak valid',
                                text: 'File harus berupa gambar'
                            });
                        }
                        return false;
                    }

                    // size max 5MB
                    if (file.size > 5 * 1024 * 1024) {
                        if (showAlert) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ukuran terlalu besar',
                                text: 'Maksimal ukuran gambar 5MB'
                            });
                        }
                        return false;
                    }
                }

                imageInput.classList.remove("is-invalid");
                imageInput.classList.add("is-valid");
                return true;
            }

            department.addEventListener("change", () => validateDepartment(false));
            pic.addEventListener("input", () => validatePic(false));
            subject.addEventListener("input", () => validateSubject(false));

            // ===== SUBMIT =====
            form.addEventListener("submit", function(e) {

                isSubmitted = true;

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

                if (!validateImage(true)) {
                    e.preventDefault();
                    imageInput.focus();
                    return;
                }

            });

        });
    </script>

    <script>
        let departments = @json($departments);
    </script>



    <script>
        $(document).ready(function() {

            var table = $('#taskTable').DataTable({
                lengthChange: false,
                ordering: true,
                responsive: false,
                scrollx: true,
                dom: 'frtip',

                // buttons: [{
                //     extend: 'excelHtml5',
                //     text: '<i class="bi bi-file-earmark-excel"></i> Export Excel',
                //     className: 'btn btn-success btn-sm',
                //     title: 'Data Task',
                //     exportOptions: {
                //         columns: function(idx) {
                //             return idx !== 0 && idx !== 8;
                //         },
                //         format: {
                //             body: function(data, row, column, node) {

                //                 if (column === 5) {
                //                     let status = $(node).find('.badge').text().trim();
                //                     return `${status}`;
                //                 }

                //                 if (column === 7) {
                //                     let text = data || '';

                //                     text = text
                //                         .replace(/<br\s*\/?>/gi, '\n')
                //                         .replace(/<\/?br>/gi, '\n');

                //                     text = $('<div>').html(text).text();

                //                     return text
                //                         .split(/(?=\d{2}-\d{2}-\d{4})/g)
                //                         .map(e => e.trim())
                //                         .join('\n')
                //                         .trim();
                //                 }

                //                 return $('<div>').html(data || '').text().trim();
                //             }
                //         }
                //     }
                // }],

                columnDefs: [{
                    orderable: false,
                    targets: [1, 2, 3, 4, 5, 6, 7, 8]
                }]
            });

            $('#taskTable_filter').hide();

            $('#resetFilters').on('click', function() {
                table.columns().search('').draw();

                $('#taskTable thead th').each(function() {
                    let th = $(this);
                    let title = th.data('title');
                    th.empty().text(title);
                });

                $('#toggleUrgent').prop('checked', false);
            });

            $('#toggleUrgent').on('change', function() {
                if ($(this).is(':checked')) {
                    table.column(5).search('Urgent').draw();
                } else {
                    table.column(5).search('').draw();
                }
            });

            $('#taskTable thead th').each(function() {
                $(this).data('title', $(this).text());
            });

            $('#taskTable thead').on('click', 'th', function(e) {

                e.stopPropagation();
                e.preventDefault();

                let th = $(this);
                let index = th.index();
                let title = th.data('title');

                if (index === 0 || index === 8) return;

                if (th.find('input, select').length > 0) return;

                let colDef = table.settings()[0].aoColumns[index];
                if (colDef.bSortable) return;

                th.empty();

                if (index === 4) {

                    let select = $(
                        '<select class="form-control form-control-sm"><option value="">Semua</option></select>'
                    );

                    departments.forEach(function(dept) {
                        select.append(`<option value="${dept.name}">${dept.name}</option>`);
                    });

                    th.append(select);
                    select.focus();

                    select.on('change', function() {
                        table.column(index).search($(this).val()).draw();
                    });

                } else if (index === 6) {

                    let select = $(`
                <select class="form-control form-control-sm">
                    <option value="">Semua</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Clear">Clear</option>
                </select>
            `);

                    th.append(select);
                    select.focus();

                    select.on('change', function() {
                        table.column(index).search($(this).val()).draw();
                    });

                } else {

                    let input = $(`
                <input type="text" class="form-control form-control-sm" placeholder="Cari ${title}" />
            `);

                    th.append(input);
                    input.focus();

                    input.on('keyup', function() {
                        table.column(index).search(this.value).draw();
                    });
                }
            });

        });
    </script>

    {{-- Preview Image Form --}}
    <script>
        let selectedFiles = [];

        document.getElementById('formFile').addEventListener('change', function(e) {
            selectedFiles = Array.from(e.target.files);
            renderPreview();
        });

        function renderPreview() {
            const container = document.getElementById('thumbPreview');
            container.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();

                reader.onload = function(e) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'position-relative';

                    wrapper.innerHTML = `
                <img src="${e.target.result}" 
                    class="rounded border"
                    style="width:70px; height:70px; object-fit:contain; background:#f8f9fa;">

                <button type="button"
                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                    style="padding:2px 5px; font-size:10px;">×</button>
            `;

                    // tombol hapus
                    wrapper.querySelector('button').addEventListener('click', () => {
                        selectedFiles.splice(index, 1);
                        updateInputFiles();
                        renderPreview();
                    });

                    container.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();

            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });

            document.getElementById('formFile').files = dataTransfer.files;
        }
    </script>
@endsection
