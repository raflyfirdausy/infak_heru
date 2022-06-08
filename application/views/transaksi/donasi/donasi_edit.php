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
                <form id="form_add" action="<?= base_url("transaksi/donasi/edit_proses") ?>" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <a href="<?= back() ?>" type="button" class="btn btn-primary float-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Tanggal</label>
                                <input value="<?= $transaksi["tgl_mutasi"] ?>" type="date" class="form-control" name="tgl_mutasi" id="tgl_mutasi">
                            </div>
                            <div class="col-md-8">
                                <label for="">Jenis Infak</label>
                                <select class="form-control select2bs4" name="id_jenis" id="id_jenis">
                                    <?php foreach ($jenis as $j) : ?>
                                        <option <?= $transaksi["id_jenis"] == $j["id"] ? "selected" : "" ?> value="<?= $j["id"] ?>"><?= $j["nama"] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="row col-md-12 p-0">
                                <div class="col-md-6">
                                    <div class="col-md-12 mt-2">
                                        <label for="">Rekening Tujuan</label>
                                        <select class="form-control select2bs4" name="id_rekening" id="id_rekening">
                                            <?php foreach ($rekening as $r) : ?>
                                                <option <?= $transaksi["rek_no"] == $r["no_rekening"] ? "selected" : "" ?> value="<?= $r["id"] ?>"><?= $r["no_rekening"] . " (" . $r["nama_bank"] . " a.n " . $r["atas_nama"] . ")" ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="">Nominal</label>
                                        <input value="<?= $transaksi["nominal"] ?>" type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukan nominal donasi. Contoh : 1000000">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" class="form-control" rows="5" placeholder="Masukan Catatan (opsional)"><?= $transaksi["keterangan"] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Bukti Transfer</label>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <img id="imgPreview" src="<?= asset("infak/bukti/" . $transaksi["bukti"]) ?>" class="col-md-12" alt="">
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Pilih Bukti Transfer <span class="text-danger">*</span></label>
                                                <input accept="image/*" type="file" class="form-control-file imgUp" name="bukti" id="imageUpload" data-id="">
                                                <small id="name1" class="text-info">Maximum Size : 5 Mb | Filetype : JPG, JPEG, PNG</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id_data" value="<?= $transaksi["id"] ?>">
                        <button type="submit" class="btn btn-primary add_btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>

<script>
    $("#form_add").submit(e => {
        e.preventDefault()
        var formData = new FormData($("#form_add")[0])

        $(".add_btn").prop('disabled', true)
        $(".add_btn").text("Sedang menyimpan data...")

        $.ajax({
            type: "POST",
            url: "<?= base_url("transaksi/donasi/edit_proses") ?>",
            data: formData,
            dataType: 'JSON',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                if (result.code == 200) {
                    Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: `${result["message"]}`,
                            confirmButtonText: 'Oke!',
                        })
                        .then((result) => {
                            window.location.href = "<?= base_url('transaksi/donasi/riwayat') ?>";
                        })
                } else {
                    Swal.fire(
                        'Gagal',
                        `${result.message}`,
                        'error'
                    )
                }
            },
            error: function() {
                $(".add_btn").prop('disabled', false)
                $(".add_btn").text("Simpan")
                alert(xhr.responseText)
            }
        })
    })


    const readURL = input => {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function() {
        readURL(this);
    })
</script>