<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-1">
                    <h1 class="m-0 text-dark">Dashboard Admin</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <select name="tahun" id="tahun" class="form-control select2bs4">
                        <?php foreach ($listTahun as $lt) : ?>
                            <option <?= ($tahun == $lt["tahun"]) ? "selected" : "" ?> value="<?= $lt["tahun"] ?>"><?= $lt["tahun"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#tahun").change(e => {
            let tahun = $("#tahun").val()
            window.location = `<?= base_url("dashboard/admin/") ?>${tahun}`;
        })
    </script>

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
                                <a href="<?= base_url("transaksi/infak/sudah") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiPending) ?></h3>
                                    <p>Total Donasi yang masih pending</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url("transaksi/infak/belum") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiDitolak) ?></h3>
                                    <p>Total Donasi yang ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url("transaksi/infak/ditolak") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiSaldo) ?></h3>
                                    <p>Saldo donasi Pondok Saat ini</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cash"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= Rupiah($donasiTerpakai) ?></h3>
                                    <p>Total Pengeluaran pondok</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cash"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">

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