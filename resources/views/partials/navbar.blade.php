<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form action="/employee" class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

        <!-- Search -->
        @if (request('company'))
            <input type="hidden" name="company" value="{{ request('company') }}">
        @endif

        <div class="search-element">
            <input class="form-control" value="{{ request('search') }}" type="search" placeholder="Search" aria-label="Search" data-width="250"
                name="search">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            {{-- <div class="search-backdrop"></div> --}}
        </div>
    </form>

    <!-- Navbar Kanan -->
    <ul class="navbar-nav navbar-right">
        <!-- Profile -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                <form action="/logout" method="post">
                    @method('post')
                    @csrf
                    <button href="/logout" class="dropdown-item btn btn-has-icon text-danger pl-4 pr-4"><i class="fas fa-sign-out-alt"></i>
                        <span class="ml-2">Logout</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
