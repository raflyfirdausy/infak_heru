<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_name ?> | <?= $app_complete_name ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= asset("infak/img/" . $_identitas->logo) ?>">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= lte("plugins/fontawesome-free/css/all.min.css") ?>">
    <link rel="stylesheet" href="<?= lte("plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= lte("dist/css/adminlte.min.css") ?>">
    <link rel="stylesheet" href="<?= lte("plugins/select2/css/select2.min.css") ?>">
    <link rel="stylesheet" href="<?= lte("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") ?>">
    <link rel="stylesheet" href="<?= lte("plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css") ?>">
</head>


<body class="hold-transition login-page" style="background-image: url(<?= asset("evans/img/bg-login.jpg") ?>); background-size: cover;height:100%;">
    <div class="container">
        <div class="login-box mt-4 mb-5" style="width:90%;margin:auto">
            <form id="form_add" action="<?= base_url('auth/proses') ?>" method="POST" enctype="multipart/form-data">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="<?= base_url() ?>" class="h1"><b>FORM PENDAFTARAN DONATUR</b></a>
                        <h5><?= $app_name ?></h5>
                    </div>
                    <div class="card-body">

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
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="<?= lte("plugins/jquery/jquery.min.js") ?>"></script>
    <script src="<?= lte("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= lte("dist/js/adminlte.min.js") ?>"></script>
    <script src="<?= lte("plugins/select2/js/select2.full.min.js") ?>"></script>
    <script src="<?= lte("plugins/sweetalert2/sweetalert2.min.js") ?>"></script>
    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

        function validate(element) {
            element.value = element.value.replace(/[^0-9.]/, '');
        };
    </script>

    <script>
        $("#form_add").submit(e => {
            e.preventDefault()
            var form = $('#form_add')[0]
            var data = new FormData(form)

            $(".add_btn").prop('disabled', true)
            $(".add_btn").text("Sedang menyimpan data...")

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url("auth/proses") ?>",
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
                            window.location.href = "<?= base_url() ?>"
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
    </script>
</body>

</html>