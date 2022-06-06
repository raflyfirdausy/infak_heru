<style>
    .centerr {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        width: 50%;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url("dashboard") ?>" class="brand-link">
        <img src="<?= asset("infak/img/" . $_identitas->logo) ?>" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text font-weight-light"><?= ce($app_name) ?></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="<?= base_url("dashboard") ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard Utama</p>
                    </a>
                </li>

                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="<?= base_url("master/identitas") ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Identitas Aplikasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("master/rekening") ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Data Rekening Pondok</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("master/pengguna/") ?>" class="nav-link">
                                <p>Kepala Pondok</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("master/pengguna/petugas") ?>" class="nav-link">
                                <p>Petugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("master/pengguna/donatur") ?>" class="nav-link">
                                <p>Donatur</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Wilayah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("master/wilayah/provinsi") ?>" class="nav-link">
                                <p>Provinsi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("master/wilayah/kabupaten") ?>" class="nav-link">
                                <p>Kabupaten</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("master/wilayah/kecamatan") ?>" class="nav-link">
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("master/wilayah/kelurahan") ?>" class="nav-link">
                                <p>Desa / Kelurahan</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-header">Transaksi Infak</li>

                <li class="nav-item">
                    <a href="<?= base_url("transaksi/infak/belum") ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Belum Di ACC</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("transaksi/infak/sudah") ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Sudah di ACC</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("transaksi/infak/ditolak") ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Ditolak</p>
                    </a>
                </li>

                <li class="nav-header">Laporan Infak</li>

                <li class="nav-item">
                    <a href="<?= base_url("laporan/infak/pengguna") ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Berdasarkan Pengguna</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("laporan/infak/rekening") ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Berdasarkan Rekening</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("laporan/infak/detail") ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Detail Laporan</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>