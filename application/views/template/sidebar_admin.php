<?php if (validasiRole("KEPALA_PONDOK") || validasiRole("PETUGAS")) : ?>
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
        <a href="<?= base_url("master/jenis-infak") ?>" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Jenis Infak</p>
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
            <?php if (validasiRole("KEPALA_PONDOK")) : ?>
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
            <?php endif ?>

            <li class="nav-item">
                <a href="<?= base_url("master/pengguna/donatur") ?>" class="nav-link">
                    <p>Donatur</p>
                </a>
            </li>
        </ul>
    </li>

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
    <li class="nav-item">
        <a href="<?= base_url("transaksi/pengeluaran") ?>" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Pengeluaran Infak</p>
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

<?php endif ?>