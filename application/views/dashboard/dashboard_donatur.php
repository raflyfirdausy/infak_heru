<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Donatur</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Statistik Infak</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiTerkumpul) ?></h3>
                                    <p>Total Donasi Terkumpul</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cash"></i>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiSaldo) ?></h3>
                                    <p>Saldo donasi Pondok Saat ini</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cash"></i>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiTerpakai) ?></h3>
                                    <p>Total Pengeluaran pondok</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cash"></i>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiDiterima) ?></h3>
                                    <p>Donasimu yang diterima</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiPending) ?></h3>
                                    <p>Donasimu yang masih pending</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiDitolak) ?></h3>
                                    <p>Donasimu yang ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>10 Donasimu yang Terakhir</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm nowrap table-bordered table-striped datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%">No.</th>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>No Rekening</th>
                                            <th>Bank</th>
                                            <th>Atas Nama</th>
                                            <th>Status Verif</th>
                                            <th>Keterangan</th>
                                            <th>Jenis Donasi</th>
                                            <th>Waktu Dibuat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($donasikuTerakhir as $dt) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $dt["tgl_mutasi"] ?></td>
                                                <td><?= Rupiah($dt["nominal"]) ?></td>
                                                <td><?= $dt["rek_no"] ?></td>
                                                <td><?= $dt["rek_bank"] ?></td>
                                                <td><?= $dt["rek_nama"] ?></td>
                                                <td><?= $dt["status_verified"] ?></td>
                                                <td><?= $dt["keterangan"] ?></td>
                                                <td><?= $dt["nama_jenis"] ?></td>
                                                <td><?= $dt["created_at"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><b>10 Donasi Terakhir</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm nowrap table-bordered table-striped datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%">No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                            <th>Bank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($donasiSemuaTerakhir as $dst) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $dst["tgl_mutasi"] ?></td>
                                                <td><?= $dst["nama_donatur"] ?></td>
                                                <td><?= Rupiah($dst["nominal"]) ?></td>
                                                <td><?= $dst["rek_bank"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><b>10 Pengeluaran Terakhir</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm nowrap table-bordered table-striped datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%">No.</th>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($donasiKeluar as $dk) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $dk["tgl_mutasi"] ?></td>
                                                <td><?= Rupiah($dk["nominal"]) ?></td>
                                                <td><?= $dk["keterangan"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>

<script>
    $(".datatable").DataTable({})
</script>