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
          
            <li id="menu-profil">
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
            <li id="menu-berita">
                <a href="{{ url('admin/berita') }}"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Kelola Berita</span></a>
            </li>
            <li id="menu-galeri">
                <a href="{{ url('admin/galeri') }}"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Kelola Galeri</span></a>
            </li>
            <li id="menu-galeri">
                <a href="{{ url('admin/log') }}"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Log Aktivitas</span></a>
            </li>

          
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->