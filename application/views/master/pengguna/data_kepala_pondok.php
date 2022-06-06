<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"><b><?= $title ?></b> | <?= $app_name ?></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <?php if ($this->session->flashdata("gagal")) : ?>
            <div class="alert bg-danger alert-dismissible fade show" role="alert">
                <strong>Gagal !</strong> <?= $this->session->flashdata("gagal") ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION["gagal"]);
        endif; ?>

        <?php if ($this->session->flashdata("sukses")) : ?>
            <div class="alert bg-success alert-dismissible fade show" role="alert">
                <strong>Sukses !</strong> <?= $this->session->flashdata("sukses") ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION["sukses"]);
        endif; ?>


        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <a href="<?= back() ?>" type="button" class="btn btn-primary float-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_tambah"><i class="fas fa-plus"></i> Tambah Data <?= $title ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_data" class="table table-sm nowrap table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 3%">No.</th>
                                    <th style="width: 8%">Aksi</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Kode Pos</th>
                                    <th>Waktu Dibuat</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade myModal" id="modal_tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url("master/$module/add") ?>" id="form_add" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="text" autocomplete="off" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">No Telp <span class="text-danger">*</span></label>
                                <input required type="text" onkeyup="validate(this)" class="form-control" name="no_hp" id="no_hp">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select required class="form-control select2bs4" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="LAKI-LAKI">Laki-Laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Agama <span class="text-danger">*</span></label>
                                <select required class="form-control select2bs4" name="agama" id="agama">
                                    <?php foreach (agama() as $agama) : ?>
                                        <option value="<?= $agama ?>"><?= $agama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" max="<?= date("Y-m-d") ?>" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="prov" id="prov" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kab" id="kab" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kec" id="kec" required>
                            </div>
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Desa / Kelurahan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kel" id="kel" required>
                            </div>
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Kode Pos</label>
                                <input type="text" onkeyup="validate(this)" class="form-control" name="kodepos" id="kodepos">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="level" value="<?= $level ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary add_btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade myModal" id="modal_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url("master/pengguna/edit") ?>" id="form_edit" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Email <span class="text-danger">*</span></label>
                                <input readonly type="email" class="form-control" name="email" id="email_edit" autocomplete="off" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password_edit" autocomplete="off" >
                                <small class="text-info">Kosongi jika tidak ingin merubah password</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" id="nama_edit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">No Telp <span class="text-danger">*</span></label>
                                <input required type="text" onkeyup="validate(this)" class="form-control" name="no_hp" id="no_hp_edit">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select required class="form-control select2bs4" name="jenis_kelamin" id="jenis_kelamin_edit">
                                    <option value="LAKI-LAKI">Laki-Laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Agama <span class="text-danger">*</span></label>
                                <select required class="form-control select2bs4" name="agama" id="agama_edit">
                                    <?php foreach (agama() as $agama) : ?>
                                        <option value="<?= $agama ?>"><?= $agama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir_edit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" max="<?= date("Y-m-d") ?>" class="form-control" name="tanggal_lahir" id="tanggal_lahir_edit" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="prov" id="prov_edit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="control-label">Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kab" id="kab_edit" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kec" id="kec_edit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Desa / Kelurahan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kel" id="kel_edit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="recipient-name" class="control-label">Kode Pos</label>
                                <input type="text" onkeyup="validate(this)" class="form-control" name="kodepos" id="kodepos_edit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id_data" id="id_data">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary add_btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var table = $("#table_data").DataTable({
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data Tidak Ditemukan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Oops, data tidak ditemukan",
            "infoFiltered": "(di filter dari _MAX_ total data)",
            "loadingRecords": "Loading...",
            "processing": "Sedang memuat data...",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
        },
        "processing": true,
        "serverSide": true,
        "searching": true,
        "order": [],
        "columnDefs": [{
                "targets": [0],
                "orderable": false
            },
            {
                "targets": [1],
                "orderable": false
            }, {
                "targets": [2],
                "orderable": false
            },
            {
                "targets": [3],
                "orderable": false
            },
            {
                "targets": [4],
                "orderable": false
            },
            {
                "targets": [5],
                "orderable": false
            },
            {
                "targets": [6],
                "orderable": false
            },
            {
                "targets": [7],
                "orderable": false
            },
            {
                "targets": [8],
                "orderable": false
            },
            {
                "targets": [9],
                "orderable": false
            },
            {
                "targets": [10],
                "orderable": false
            },
            {
                "targets": [11],
                "orderable": false
            },
            {
                "targets": [12],
                "orderable": false
            },
            {
                "targets": [13],
                "orderable": false
            },
            {
                "targets": [14],
                "orderable": false
            },
        ],
        "ajax": {
            "url": "<?= base_url("master/pengguna/get_data/$level") ?>",
            "type": "POST"
        },
        "columns": [{
                "data": null,
                "sortable": false,
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "id",
                "sortable": false,
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    let tombol = ''
                    tombol += `<button type="button" title="Edit" onclick="modal_edit('${data}')" class="btn btn-sm btn-info waves-effect waves-light" type="button"><span class="btn-label text-white"><i class="fas fa-edit"></i></span></button>&nbsp;`
                    tombol += `<button type="button" title="Hapus" onclick="hapus('${data}')" class="btn btn-sm btn-danger waves-effect waves-light" type="button"><span class="btn-label text-white"><i class="fas fa-trash"></i></span></button>&nbsp;`
                    // if (row.is_verified != "YA") {
                    //     tombol += `<button type="button" title="Verifikasi" onclick="verif('${data}')" class="btn btn-sm btn-success waves-effect waves-light" type="button"><span class="btn-label text-white"><i class="fas fa-check"></i></span></button>&nbsp;`
                    // } else {
                    //     tombol += `<button type="button" title="Un Verif" onclick="unverif('${data}')" class="btn btn-sm btn-dark waves-effect waves-light" type="button"><span class="btn-label text-white"><i class="fas fa-times"></i></span></button>&nbsp;`
                    // }
                    return tombol;
                }
            },
            {
                "data": "email",
            },
            {
                "data": "nama",
            },
            {
                "data": "no_hp",
            },
            {
                "data": "jenis_kelamin",
            },
            {
                "data": "tempat_lahir",
            },
            {
                "data": "tanggal_lahir",
            },
            {
                "data": "agama",
            },
            {
                "data": "prov",
            },
            {
                "data": "kab",
            },
            {
                "data": "kec",
            },
            {
                "data": "kel",
            },
            {
                "data": "kodepos",
            },

            {
                "data": "created_at",
            },
        ]
    })

    $(document).ready(function() {
        $('#table_data thead tr').clone(true).appendTo('#table_data thead');
        $('#table_data thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            if (i == 0 || i == 1) {
                $(this).html('');
            } else {
                $(this).html(`<input class="form-control" style="width: 100%" type="text" placeholder="Cari ${title}" />`);
            }

            $('input', this).on('keyup change', function(e) {
                if (e.keyCode == 13) {
                    if (table.column(i).search() !== this.value) {
                        console.log("asd")
                        table.column(i).search(this.value).draw();
                    }
                }
            })
        })
    })

    $("#form_add").submit(e => {
        e.preventDefault()
        var form = $('#form_add')[0]
        var data = new FormData(form)

        $(".add_btn").prop('disabled', true)
        $(".add_btn").text("Sedang menyimpan data...")

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url("master/pengguna/add") ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(result) {
                console.log(result)
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                if (result.code == 200) {
                    Swal.fire({
                        title: 'Sukses',
                        text: result.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke!'
                    }).then((result) => {
                        $('#form_add').trigger("reset");
                        $("#modal_tambah").modal("hide")
                        table.ajax.reload(null, false)
                    })
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: result.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke!'
                    })
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                Swal.fire("Oops", xhr.responseText, "error")
            }
        })
    })

    $("#form_edit").submit(e => {
        e.preventDefault()
        var form = $('#form_edit')[0]
        var data = new FormData(form)

        $(".add_btn").prop('disabled', true)
        $(".add_btn").text("Sedang menyimpan data...")

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url("master/$module/edit") ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(result) {
                console.log(result)
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                if (result.code == 200) {
                    Swal.fire({
                        title: 'Sukses',
                        text: result.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke!'
                    }).then((result) => {
                        $('#form_edit').trigger("reset");
                        $("#modal_edit").modal("hide")
                        table.ajax.reload(null, false)
                    })
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: result.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke!'
                    })
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                Swal.fire("Oops", xhr.responseText, "error")
            }
        })
    })

    const modal_edit = (id) => {
        $("#modal_edit").modal("show")
        $.ajax({
            url: "<?= base_url("master/$module/get/") ?>" + id,
            type: "GET",
            dataType: "JSON",
            contentType: "application/json; charset=utf-8",
            success: function(result) {
                if (result.code == 200) {
                    let data = result.data
                    $("#email_edit").val(data.email)
                    $("#nama_edit").val(data.nama)
                    $("#no_hp_edit").val(data.no_hp)
                    $("#jenis_kelamin_edit").val(data.jenis_kelamin).trigger("change")
                    $("#agama_edit").val(data.agama).trigger("change")
                    $("#tempat_lahir_edit").val(data.tempat_lahir)
                    $("#tanggal_lahir_edit").val(data.tanggal_lahir)
                    $("#prov_edit").val(data.prov)
                    $("#kab_edit").val(data.kab)
                    $("#kec_edit").val(data.kec)
                    $("#kel_edit").val(data.kel)
                    $("#kodepos_edit").val(data.kodepos)
                    $("#id_data").val(data.id)
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: result.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke!'
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                Swal.fire("Oops", xhr.responseText, "error")
            }
        });
    }

    const hapus = (id) => {
        swal.fire({
            title: 'Hapus Data ?',
            text: "Data akan terhapus secara permanent",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('master/pengguna/delete') ?>",
                    data: {
                        "id_data": id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.message,
                                'success'
                            ).then((result) => {
                                table.ajax.reload(null, false)
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                })
            }
        });
    }

    const verif = (id) => {
        swal.fire({
            title: 'Verifikasi Data ?',
            text: "Data akan Diverifikasi dan user dapat melakukan login aplikasi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27a844',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Verif'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url("master/$module/verif") ?>",
                    data: {
                        "id_data": id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.message,
                                'success'
                            ).then((result) => {
                                table.ajax.reload(null, false)
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                })
            }
        });
    }

    const unverif = (id) => {
        swal.fire({
            title: 'Un Verifikasi Data ?',
            text: "Verifikasi data user akan dibatalkan dan user tidak dapat melakukan login aplikasi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3546',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Un Verif'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url("master/$module/unverif") ?>",
                    data: {
                        "id_data": id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.message,
                                'success'
                            ).then((result) => {
                                table.ajax.reload(null, false)
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                })
            }
        });
    }
</script>