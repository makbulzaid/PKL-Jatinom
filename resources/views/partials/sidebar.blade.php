<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Jatinom</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">J</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown {{ Request::is('/') ? 'active' : '' }}">
                <a href="/" class="nav-link"><i class="fas fa-television"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('employee*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="far fa-address-card"></i><span>Karyawan</span></a>
                <ul class="dropdown-menu">
                    <li class="@if ($header == 'Jatinom Indah Grup') active @endif"><a class="nav-link" href="/employee">Jatinom Indah Grup</a></li>
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    @foreach ($companies as $company)
                    <li class="@if ($link == $company->slug_company) active @endif"><a class="nav-link" href="{{ $company->link }}">{{ $company->nama_company }}</a></li>
                    @endforeach
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    <li class="@if ($link == 'keluar') active @endif"><a class="nav-link" href="/employee?company=keluar">Arsip Karyawan</a></li>
                    {{-- <li class="{{ Request::is('Karyawan/JIF') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/JIF">Jatinom Indah Farm</a></li>
                    <li class="{{ Request::is('Karyawan/JIA') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/JIA">Jatinom Indah Agri</a></li>
                    <li class="{{ Request::is('Karyawan/SAM') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/SAM">Sawut Arum Madani</a></li>
                    <li class="{{ Request::is('Karyawan/LSL') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/LSL">Lima Satu Lima</a></li>
                    <li class="{{ Request::is('Karyawan/JPR') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/JPR">Joglo Prima Rasa</a></li>
                    <li class="{{ Request::is('Karyawan/SPM') ? 'active' : '' }}"><a class="nav-link" href="/Karyawan/SPM">Siswojo Putra Motor</a></li>
                    <li class="{{ Request::is('Karyawan/SGI') ? 'active' : '' }}""><a class="nav-link" href="/Karyawan/SGI">Sukmo Giri Indah</a></li> --}}
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Aset
                        Tanah</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Aset
                        Kendaraan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                </ul>
            </li>
    </aside>
</div>
