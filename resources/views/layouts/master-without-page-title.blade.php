<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | My Journal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- include head css -->
    @include('layouts.head-css')

    <style>
        .urgent-dot {
            width: 8px;
            height: 8px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        #taskTable thead th {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- topbar -->
        @include('layouts.topbar')
        <!-- sidebar components -->
        @include('layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- footer -->
            @include('layouts.footer')

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- vendor-scripts -->
    @include('layouts.vendor-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logoutBtn');

            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Yakin ingin logout?',
                        text: "Pastikan semua pekerjaan sudah disimpan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // redirect ke route logout
                            window.location.href = "{{ url('/logout') }}";
                        }
                    });
                });
            }
        });
    </script>

    {{-- user profile modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileForm = document.getElementById('profileForm');
            const updateBtn = document.getElementById('updateBtn'); // tombol baru
            const nameInput = document.getElementById('name');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');

            if (!profileForm || !updateBtn || !nameInput || !usernameInput || !emailInput) return;

            // simpan data awal
            const originalData = {
                name: nameInput.value,
                username: usernameInput.value,
                email: emailInput.value
            };

            // hilangkan validasi saat diketik
            [nameInput, usernameInput, emailInput].forEach(input => {
                input.addEventListener('input', function() {
                    input.classList.remove('is-invalid', 'is-valid');
                });
            });

            // tombol update
            updateBtn.addEventListener('click', function() {
                // cek input kosong
                if (!nameInput.value.trim() || !usernameInput.value.trim() || !emailInput.value.trim()) {
                    Swal.fire('Error', 'Data tidak boleh kosong', 'error');
                    return;
                }

                // cek perubahan
                if (
                    nameInput.value === originalData.name &&
                    usernameInput.value === originalData.username &&
                    emailInput.value === originalData.email
                ) {
                    Swal.fire('Info', 'Data belum ada yang diubah', 'info');
                    return;
                }

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Yakin ingin mengubah profile?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        profileForm.submit();
                    }
                });
            });
        });
    </script>

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

    {{-- Update Password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordForm');
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('confirm_password');
            const btn = document.getElementById('btnPassword');

            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // cek input kosong
                if (!passwordInput.value.trim() || !confirmInput.value.trim()) {
                    Swal.fire('Error', 'Data tidak boleh kosong', 'error');
                    return;
                }

                // cek konfirmasi password
                if (passwordInput.value !== confirmInput.value) {
                    Swal.fire('Error', 'Password dan konfirmasi tidak cocok', 'error');
                    return;
                }

                // konfirmasi sebelum submit
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Yakin ingin mengubah password?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // submit form biasa
                    }
                });
            });
        });
    </script>

    {{-- Show hide password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('confirm_password');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const iconPassword = document.getElementById('iconPassword');
            const iconConfirmPassword = document.getElementById('iconConfirmPassword');

            // Toggle password baru
            togglePassword.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    iconPassword.classList.remove('mdi-eye-outline');
                    iconPassword.classList.add('mdi-eye-off-outline');
                } else {
                    passwordInput.type = 'password';
                    iconPassword.classList.remove('mdi-eye-off-outline');
                    iconPassword.classList.add('mdi-eye-outline');
                }
            });

            // Toggle konfirmasi password
            toggleConfirmPassword.addEventListener('click', function() {
                if (confirmInput.type === 'password') {
                    confirmInput.type = 'text';
                    iconConfirmPassword.classList.remove('mdi-eye-outline');
                    iconConfirmPassword.classList.add('mdi-eye-off-outline');
                } else {
                    confirmInput.type = 'password';
                    iconConfirmPassword.classList.remove('mdi-eye-off-outline');
                    iconConfirmPassword.classList.add('mdi-eye-outline');
                }
            });
        });
    </script>

    <script>
        const btn = document.getElementById('closePasswordModal');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');

        btn.addEventListener('click', function() {
            passwordInput.value = "";
            confirmPasswordInput.value = "";
        });
    </script>
</body>

</html>
