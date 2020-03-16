<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset ('img/admin-avatar.png')}}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">ADMIN</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li id="menu-dashboard">
                <a href="{{ url('admin')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
          
            <li id="menu-pemesanan">
                <a href="{{ url('pemesanan') }}"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Pemesanan Barang</span>
                </a>
            </li>
    
            <li id="menu-harian">
                <a href="{{ url('harian') }}"><i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Operasional Harian</span>
                </a>
            </li>
            <li id="menu-bulan">
                <a href="{{ url('bulanan') }}"><i class="sidebar-item-icon fa fa-book"></i>
                    <span class="nav-label">Operasional Bulan</span></a>
            </li>
            <li id="menu-gaji">
                <a href="{{ url('gaji') }}"><i class="sidebar-item-icon fa fa-money"></i>
                    <span class="nav-label">Gaji</span></a>
            </li>
            <li id="menu-event">
                <a href="{{ url('event') }}"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Biaya Event</span></a>
            </li>
            <li id="menu-anggaran">
                <a href="{{ url('anggaran') }}"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Pengajuan Biaya</span></a>
            </li>
            <li id="menu-galeri">
                <a href="{{ url('kelola') }}"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Kelola Users</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="sidebar-item-icon fa fa-power-off"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a><i class="sidebar-item-icon fa fa-power-off"></i> -->

                                
                </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->