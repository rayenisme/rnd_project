<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">

    <div data-simplebar class="h-100">

        <!--- Sidebar-menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="left-menu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ url('index') }}" class="">
                        <i class="fas fa-desktop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Jurnal</li>

                <li>
                    <a href="{{ url('/event') }}" class="">
                        <i class="fas fa-clipboard-list"></i>
                        <span>jurnal Harian</span>
                    </a>
                </li>

                <li class="menu-title">Master</li>

                <li>
                    <a href="{{ url('/department') }}" class="">
                        <i class="fas fa-city"></i>
                        <span>Departemen</span>
                    </a>
                </li>

                <li class="menu-title">Laporan</li>

                <li>
                    <a href="{{ url('/report/event') }}" class="">
                        <i class="fas fa-file"></i>
                        <span>Laporan Jurnal</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
