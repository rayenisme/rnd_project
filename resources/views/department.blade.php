@extends('layouts.master-without-page-title')

@section('title')
    Departments
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
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Departemen</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">My Journal</a></li>
                        <li class="breadcrumb-item active">Departemen</li>
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
                        <button class="btn btn-sm btn-outline-secondary px-3" id="resetFilters">Reset Filter</button>
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
                                    <form action="{{ route('department.store') }}" method="POST"
                                        enctype="multipart/form-data" id="formDepartment" novalidate>
                                        @csrf

                                        <div class="input-group auth-form-group-custom mb-3">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon1"><i
                                                    class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                            <input type="text" class="form-control" placeholder="Nama Departemen"
                                                aria-label="name" id="name" name="name"
                                                aria-describedby="basic-addon1">
                                            <div class="invalid-feedback">Nama Departemen harus diisi</div>
                                        </div>

                                        <div class="input-group auth-form-group-custom mb-2">
                                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 "
                                                id="basic-addon1"><i
                                                    class="mdi mdi-book-outline auti-custom-input-icon"></i></span>
                                            <input type="text" class="form-control" placeholder="Kode Departemen"
                                                aria-label="code" id="code" name="code"
                                                aria-describedby="basic-addon1">
                                            <div class="invalid-feedback">Kode Dapertemen harus diisi</div>
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
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="deptTable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Departemen</th>
                                    <th class="text-center">Kode Departemen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $index => $department)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->code }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('event.show', $department->id) }}"
                                                class="btn btn-info btn-sm">
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

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        $(document).ready(function() {

            var table = $('#deptTable').DataTable({
                lengthChange: false,
                ordering: true,
                responsive: true,
                scrollX: window.innerWidth < 768, // hanya aktif di HP
                columnDefs: [{
                    orderable: false,
                    targets: [0, 3]
                }]
            });

            // hapus referensi taskTable (tidak relevan)
            $('#deptTable_filter').hide();

            $('#resetFilters').on('click', function() {
                table.columns().search('').draw(); // reset semua filter

                $('#deptTable thead th').each(function() {
                    let th = $(this);
                    let title = th.data('title'); // simpan title awal sebelumnya
                    th.empty().text(title);
                });

                $('#toggleUrgent').prop('checked', false);
            });

            // 🔹 simpan title header
            $('#deptTable thead th').each(function() {
                $(this).data('title', $(this).text());
            });

            // 🔹 klik header untuk filter
            $('#deptTable thead').on('click', 'th', function(e) {

                e.stopPropagation();
                e.preventDefault();

                let th = $(this);
                let index = th.index();
                let title = th.data('title');

                // ❌ skip kolom No & Aksi
                if (index === 0 || index === 3) return;

                // kalau sudah ada input, skip
                if (th.find('input').length > 0) return;

                // kosongkan header
                th.empty();

                // input search
                let input = $(
                    `<input type="text" class="form-control form-control-sm" placeholder="Cari ${title}" />`
                );
                th.append(input);
                input.focus();

                input.on('keyup', function() {
                    table.column(index).search(this.value).draw();
                });

            });

        });
    </script>
@endsection
