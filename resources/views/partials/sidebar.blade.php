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
                    <li class="@if ($header == $company->nama_company) active @endif"><a class="nav-link" href="/employee?company={{ $company->slug_company }}">{{ $company->nama_company }}</a></li>
                    @endforeach
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    <li class="@if ($header == 'Arsip Karyawan') active @endif"><a class="nav-link" href="/employee?company=arsip">Arsip Karyawan</a></li>
                </ul>
            </li> 
            <li class="nav-item dropdown {{ Request::is('land*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-address-card"></i><span>Aset Tanah</span></a>
                <ul class="dropdown-menu">
                    <li class="@if ($header == 'Aset Tanah') active @endif"><a class="nav-link" href="/land">Semua</a></li>
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    @foreach ($landside as $land)
                    @if($land->slug_pemilik !== $landtmp)
                    @if($land->status !== 6)
                        <li class="@if ($header == $land->pemilik) active @endif"><a class="nav-link" href="/land?owner={{ $land->slug_pemilik }}">{{ $land->pemilik }}</a></li>
                        @php($landtmp = $land->slug_pemilik)
                        @endif
                    @endif
                    @endforeach
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    <li class="@if ($header == 'Arsip Tanah') active @endif"><a class="nav-link" href="/land?owner=arsip">Arsip Tanah</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('vehicle*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Aset Kendaraan</span></a>
                <ul class="dropdown-menu">
                    <li class="@if ($header == 'Semua Kendaraan') active @endif"><a class="nav-link" href="/vehicle">Semua</a></li>
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    <li class="@if ($header == 'Aset Kendaraan') active @endif"><a class="nav-link" href="/vehicle?status=aset">Aset</a></li>
                    <li class="@if ($header == 'Peminjaman Kendaraan') active @endif"><a class="nav-link" href="/vehicle?status=peminjaman">Peminjaman</a></li>
                    <li class="@if ($header == 'Penitipan Kendaraan') active @endif"><a class="nav-link" href="/vehicle?status=penitipan">Penitipan</a></li>
                    <hr style="width:62%; margin-left:23%; margin-top:1.5px; margin-bottom:1.5px">
                    <li class="@if ($header == 'Arsip Kendaraan') active @endif"><a class="nav-link" href="/vehicle?status=arsip">Arsip Kendaraan</a></li>
                </ul>
            </li>
    </aside>
</div>
