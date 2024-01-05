<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#.php" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light">Perpustakaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->staff->photo }}" class="img-circle elevation-2" alt="User Image"
                    width="128" heigh="128">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ auth()->user()->staff->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                {{--  --}}
                <li class="nav-item">
                    <a href="{{ route('staff-index') }}"
                        class="nav-link {{ request()->routeIs('staff-index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{--  --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Anggota
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="V_Tambah_Anggota.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Form Anggota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_anggota.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Anggota</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--  --}}
                <li class="nav-item has-treeview {{ request()->is('staff/book*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('staff/book*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('author.index') }}"
                                class="nav-link {{ request()->is('staff/book/author*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Author</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('book.index') }}"
                                class="nav-link {{ request()->is('staff/book') || request()->is('staff/book/create') || request()->is('staff/book/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Buku_Hilang.php"
                                class="nav-link {{ request()->is('staff/book/lost') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Buku Hilang/Rusak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->is('staff/book/category*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('publisher.index') }}"
                                class="nav-link {{ request()->is('staff/book/publisher*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Publisher</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="V_Tambah_Peminjaman.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Form Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Tambah_Pengembalian.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Form Pengembalian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Peminjaman.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Pengembalian.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pengembalian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Pengembalian_Denda.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pengembalian Bayar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Pengembalian_GantiBuku.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengembalian Ganti Buku</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="V_Ubah_Profile.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ubah Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Tambah_User.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="V_Data_Pegawai.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="nav-link btn btn-link btn-block text-left"
                                    onclick="return confirm('Anda Akan Logout')" style="color: #c3c5cb">

                                    <i class="nav-icon fas fa-lock"></i>
                                    <p>
                                        Logout
                                    </p>

                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
