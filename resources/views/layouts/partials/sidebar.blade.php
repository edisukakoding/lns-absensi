<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard', []) }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('ruang-admin/') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard', []) }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Administrasi
    </div>
    <li class="nav-item {{ in_array(Request::segment(2), ['position', 'employee']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Kepegawaian</span>
        </a>
        <div id="collapseBootstrap" class="collapse {{ in_array(Request::segment(2), ['position', 'employee']) ? 'show' : '' }}" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kepegawaian</h6>
                <a class="collapse-item {{ Request::segment(2) == 'position' ? 'active' : '' }}" href="{{ route('position.index', []) }}">Jabatan</a>
                <a class="collapse-item {{ Request::segment(2) == 'employee' ? 'active' : '' }}" href="{{ route('employee.index', []) }}">Pegawai</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-palette"></i>
            <span>UI Colors</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="lns-absensi"></div>
</ul>
<!-- Sidebar -->
