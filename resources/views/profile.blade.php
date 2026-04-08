@extends('layouts.master-without-page-title')

@section('title')
    Profile Settings
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row align-items-center">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="align-self-end">
                                <img src="{{ URL::asset('build/images/contact.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 mb-0">
                    <div class="row align-items-center justify-content-center">
                        <div class="avatar-lg mt-4">
                            <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                class="img-fluid avatar-circle bg-light p-2 border-2 border-primary">
                        </div>
                        <h5 class="fs-16 text-truncate text-center">Charlie Stone</h5>
                    </div>
                </div>

                <div class="card-body border-top mt-0">
                    <h4 class="card-title mb-4">Profile Information</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-account align-middle text-primary me-2"></i> Full
                                        Name :</th>
                                    <td>Charlie Stone</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-cellphone align-middle text-primary me-2"></i>
                                        Username :</th>
                                    <td>(123) 123 1234</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-email text-primary me-2"></i> E-mail :</th>
                                    <td>cynthiaskote@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <!-- contact init js -->
    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables-base.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
