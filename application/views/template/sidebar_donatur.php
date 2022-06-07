<?php if (validasiRole("DONATUR")) : ?>
    <li class="nav-item">
        <a href="<?= base_url("daftar-rekening") ?>" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Daftar rekening pondok</p>
        </a>
    </li>
    <li class="nav-header">Transaksi</li>
    <li class="nav-item">
        <a href="<?= base_url("transaksi/donasi/tambah") ?>" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Tambah Donasi Infak</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url("transaksi/donasi/riwayat") ?>" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Riwayat Donasi Infak</p>
        </a>
    </li>

<?php endif ?>