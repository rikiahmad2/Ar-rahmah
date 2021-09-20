<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.jpg') }}" class="img-fluid" width="170">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">TK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('anggota') || Request::is('anggota/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/anggota') }}"><i class="fas fa-users"></i><span>Daftar Peserta</span></a>
            </li>
            {{-- <li class="{{ Request::is('pengajuan') || Request::is('pengajuan/*') || Request::is('akad/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pengajuan') }}"><i class="fas fa-arrow-down"></i><span>Pengajuan</span></a>
            </li> --}}
            {{-- <li class="{{ Request::is('pencairan') || Request::is('pencairan/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pencairan') }}"><i class="fas fa-coins"></i><span>Pencairan</span></a>
            </li> --}}
            <li class="{{ Request::is('setor') || Request::is('setor/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/setor') }}"><i class="fas fa-receipt"></i><span>Setoran Premi</span></a>
            </li>
            <li class="{{ Request::is('transaksi') || Request::is('transaksi/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/transaksi') }}"><i class="fas fa-arrow-up"></i><span>Transaksi</span></a>
            </li>
        </ul>
    </aside>
</div>
