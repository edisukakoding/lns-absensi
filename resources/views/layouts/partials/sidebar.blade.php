<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex" href="{{ route('dashboard', []) }}">
        <div class="sidebar-brand-icon">
            {{-- <img src="{{ asset('ruang-admin/') }}/img/logo/logo2.png"> --}}

        </div>
        <div class="sidebar-brand-text">LNS Absensi</div>
        {{-- <div class="sidebar-brand-text mx-3">LNS Absensi</div> --}}
    </a>
    @if (Auth::user()->isAdmin())
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard', []) }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
    @endif
    {{-- <div class="sidebar-heading">
        Administrasi
    </div> --}}
    @if (Auth::user()->isAdmin())
        <li class="nav-item {{ in_array(Request::segment(2), ['position', 'employee']) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-kepegawaiian"
                aria-expanded="true" aria-controls="collapse-kepegawaiian">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Kepegawaian</span>
            </a>
            <div id="collapse-kepegawaiian"
                class="collapse {{ in_array(Request::segment(2), ['position', 'employee']) ? 'show' : '' }}"
                aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kepegawaian</h6>
                    <a class="collapse-item {{ Request::segment(2) == 'position' ? 'active' : '' }}"
                        href="{{ route('position.index', []) }}">Jabatan</a>
                    <a class="collapse-item {{ Request::segment(2) == 'employee' ? 'active' : '' }}"
                        href="{{ route('employee.index', []) }}">Pegawai</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ in_array(Request::segment(2), ['population']) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-kelurahan"
                aria-expanded="true" aria-controls="collapse-kelurahan">
                <i class="fas fa-fw fa-building"></i>
                <span>Kelurahan</span>
            </a>
            <div id="collapse-kelurahan"
                class="collapse {{ in_array(Request::segment(2), ['population', 'organizationalstructure']) ? 'show' : '' }}"
                aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelurahan</h6>
                    <a class="collapse-item {{ Request::segment(2) == 'population' ? 'active' : '' }}"
                        href="{{ route('population.index', []) }}">Jumlah Penduduk</a>
                    <a class="collapse-item {{ Request::segment(2) == 'organizationalstructure' ? 'active' : '' }}"
                    href="{{ route('organizationalstructure.index', []) }}">Struktur Organisasi</a>
                </div>
            </div>
        </li>
    @endif
    <li class="nav-item {{ Request::segment(1) == 'attendance' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('attendance.index', []) }}">
            <i class="fas fa-fw fa-fingerprint"></i>
            <span>Absensi</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="lns-absensi"></div>
</ul>
<!-- Sidebar -->
