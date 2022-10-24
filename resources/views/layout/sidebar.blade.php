<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">PT. JATINOM INDAH AGRI</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">PT. </a>
      </div>
      <ul class="sidebar-menu">
        <li @yield('home')><a class="nav-link" href="/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li @yield('pegawai') class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i> <span>Daftar Pegawai</span></a>
          <ul class="dropdown-menu">
            <li @yield('satu')><a class="nav-link" href="/office">Office</a></li>
            <li @yield('dua')><a class="nav-link" href="/fmjimbe">Feedmiill Jimbe</a></li>
            <li @yield('tiga')><a class="nav-link" href="/fmjatinom">Feedmiill Jatinom</a></li>
            <li @yield('empat')><a class="nav-link" href="/gpsjimbe">Gudang PS Jimbe</a></li>
            <li @yield('lima')><a class="nav-link" href="/gpspikatan">Gudang PS Pikatan</a></li>
            <li @yield('enam')><a class="nav-link" href="/gpsponggok">Gudang PS Ponggok</a></li>
            <li @yield('tujuh')><a class="nav-link" href="/psinduk">PS Induk</a></li>
            <li @yield('delapan')><a class="nav-link" href="/psbali">Bali PS</a></li>
            <li @yield('sembilan')><a class="nav-link" href="/psponorogo">Ponorogo PS</a></li>
            <li @yield('sepuluh')><a class="nav-link" href="/pspikatan">Pikatan PS</a></li>
            <li @yield('sebelas')><a class="nav-link" href="/pstrisula">Trisula PS</a></li>
            <li @yield('duabelas')><a class="nav-link" href="/psgading">Gading PS</a></li>
            <li @yield('tigabelas')><a class="nav-link" href="/pssidorejo">Sidorejo PS</a></li>
            <li @yield('empatbelas')><a class="nav-link" href="/psamphibi">Amphibi PS</a></li>
            <li @yield('limabelas')><a class="nav-link" href="/psrejotangan">Rejotangan PS</a></li>
            <li @yield('enambelas')><a class="nav-link" href="/psponggok">Ponggok PS</a></li>
            <li @yield('tujuhbelas')><a class="nav-link" href="/psbinter">Bintang Terang PS</a></li>
            <li @yield('delapanbelas')><a class="nav-link" href="/pspare">Pare PS</a></li>
            <li @yield('sembilanbelas')><a class="nav-link" href="/psaulia">Aulia PS</a></li>
            <li @yield('duapuluh')><a class="nav-link" href="/jfblitar">Ji Food Blitar</a></li>
            <li @yield('duasatu')><a class="nav-link" href="/jfmadiun">Ji Food Madiun</a></li>
            <li @yield('duadua')><a class="nav-link" href="/divkend">Div. Kendaraan</a></li>
            <li @yield('duatiga')><a class="nav-link" href="/rpa">RPA</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
      </ul>
</aside>
  </div>