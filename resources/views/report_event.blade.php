@extends('layouts.master-without-page-title')

@section('title')
    Laporan Jurnal
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

    <link href="{{ URL::asset('build/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Laporan Jurnal</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">My Journal</a></li>
                        <li class="breadcrumb-item active">Laporan Jurnal</li>
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
                        <div class="col-sm-4 col-lg-4">
                            <input class="form-control" type="text" name="daterange" id="drp_jurnal" value=""
                                placeholder="Pilih tanggal" />
                        </div>
                        <button class="btn btn-sm btn-outline-secondary px-3" id="resetFilters">Reset Filter</button>
                    </div>
                    {{-- Button Modals End --}}
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="jurnalTable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nomor Project</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Departemen</th>
                                    <th class="text-center">PIC</th>
                                    <th class="text-center">Prioritas</th>
                                    <th class="text-center">Status</th>
                                    <th class="d-none">Timeline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="task-date"
                                            data-date="{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }}">
                                            {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('l, d F Y') }}
                                        </td>
                                        <td>{{ $task->code }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->department_name }}</td>
                                        <td>{{ $task->pic_name }}</td>
                                        <td class="text-center">
                                            @if ($task->is_urgent == '0')
                                                <span class="badge alert-label-secondary">
                                                    {{ $task->is_urgent ? 'Urgent' : 'Normal' }}
                                                </span>
                                            @else
                                                <span class="badge alert-label-danger">
                                                    {{ $task->is_urgent ? 'Urgent' : 'Normal' }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (strtolower($task->status) == 'in progress')
                                                <span class="badge alert-label-info">
                                                    {{ $task->status }}
                                                </span>
                                            @else
                                                <span class="badge alert-label-primary">
                                                    {{ $task->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-none">{!! nl2br(e($task->timeline)) !!}</td>
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
    <script src="{{ URL::asset('build/libs/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/form-rangepicker.init.js') }}"></script>

    <script>
        $(function() {

            const table = $('#jurnalTable').DataTable({
                lengthChange: false,
                dom: '<"d-flex justify-content-end align-items-center mb-2"B>rtip',
                buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="bi bi-file-earmark-excel"></i> Export Excel',
                    className: 'btn btn-success btn-sm',
                    title: 'LAPORAN JURNAL',

                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        format: {
                            body: function(data, row, column, node) {

                                // ===== STATUS =====
                                if ($(node).find('.badge').length) {
                                    return $(node).find('.badge').text().trim();
                                }

                                // ===== TIMELINE DETECTION (ANTI COLUMN SHIFT) =====
                                if (typeof data === 'string' && data.includes('-') && data
                                    .includes('202')) {
                                    let text = data || '';

                                    // 🔥 HAPUS <br> DULU
                                    text = $('<div>').html(text).text();
                                    text = text.replace(/<br\s*\/?>/gi, '\n');

                                    // 🔥 JIKA ADA PEMISAH ###, UBAH JADI BULLET LIST
                                    if (text.includes('###')) {
                                        let items = text.split('###').map(item => item.trim())
                                            .filter(Boolean);

                                        text = items.map(item => '• ' + item).join('\r\n');
                                    } else {
                                        // fallback kalau hanya newline
                                        let items = text.split('\n').map(item => item.trim())
                                            .filter(Boolean);
                                        if (items.length > 1) {
                                            text = items.map(item => '• ' + item).join('\r\n');
                                        }
                                    }

                                    // 🔥 NORMALISASI UNTUK EXCEL
                                    return text.replace(/\n/g, '\r\n');
                                }

                                // ===== DEFAULT =====
                                return $('<div>').html(data || '').text().trim();
                            }
                        }
                    },
                    customize: function(xlsx) {
                        let sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c', sheet).attr('s', '55');
                    }
                }]
            });

            const $input = $('#drp_jurnal');

            $input.daterangepicker({
                autoUpdateInput: false
            });

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

                const range = $input.val();
                if (!range) return true;

                const [startStr, endStr] = range.split(' - ');

                const start = moment(startStr, 'MM/DD/YYYY').startOf('day');
                const end = moment(endStr, 'MM/DD/YYYY').endOf('day');

                const row = table.row(dataIndex).node();

                const rowDateStr = $(row).find('.task-date').data('date');

                const rowDate = moment(rowDateStr, 'YYYY-MM-DD');

                return rowDate.isBetween(start, end, null, '[]');
            });

            $input.on('apply.daterangepicker', function(ev, picker) {

                $(this).val(
                    picker.startDate.format('MM/DD/YYYY') +
                    ' - ' +
                    picker.endDate.format('MM/DD/YYYY')
                );

                table.draw();
            });

            $input.on('cancel.daterangepicker', function() {
                $(this).val('');
                table.draw();
            });

            $('#resetFilters').on('click', function() {

                $('#drp_jurnal').val('');
                dateRange = null;

                table.draw();
            });
        });
    </script>
@endsection
