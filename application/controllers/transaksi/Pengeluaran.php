<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends RFLController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Rekening_model", "rekening");
        $this->load->model("JenisInfak_model", "jenis");
        $this->load->model("Trinfak_model", "trInfak");
        $this->load->model("VtrInfak_model", "vTrInfak");
    }

    public function index()
    {
        $data = [
            "title" => "Pengeluaran Infak"
        ];

        $this->loadViewBack("transaksi/pengeluaran/data_pengeluaran", $data);
    }

    public function get_data()
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->vTrInfak)->where("jenis_mutasi", "=", "KELUAR")->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->vTrInfak)->where("jenis_mutasi", "=", "KELUAR")->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->vTrInfak->where("jenis_mutasi", "=", "KELUAR")->count_rows() ?: 0;

        echo json_encode([
            "draw"              => $this->input->post("draw", TRUE),
            "data"              => $data,
            "recordsFiltered"   => $dataFilter,
            "recordsTotal"      => $dataCountAll,
        ]);
    }

    public function filterDataTable($model)
    {
        $inputKolom     = $this->input->post("columns");
        $tgl_mutasi     = isset($inputKolom) ? $inputKolom[2]["search"]["value"] : "";
        $nominal        = isset($inputKolom) ? $inputKolom[3]["search"]["value"] : "";
        $keterangan     = isset($inputKolom) ? $inputKolom[4]["search"]["value"] : "";
        $nama_petugas   = isset($inputKolom) ? $inputKolom[5]["search"]["value"] : "";
        $created_at     = isset($inputKolom) ? $inputKolom[6]["search"]["value"] : "";

        if (!empty($tgl_mutasi)) {
            $model = $model->where("LOWER(tgl_mutasi)", "LIKE", strtolower($tgl_mutasi));
        }

        if (!empty($nominal)) {
            $model = $model->where("LOWER(nominal)", "LIKE", strtolower($nominal));
        }

        if (!empty($no_rekening)) {
            $model = $model->where("LOWER(no_rekening)", "LIKE", strtolower($no_rekening));
        }

        if (!empty($keterangan)) {
            $model = $model->where("LOWER(keterangan)", "LIKE", strtolower($keterangan));
        }

        if (!empty($nama_petugas)) {
            $model = $model->where("LOWER(nama_petugas)", "LIKE", strtolower($nama_petugas));
        }

        if (!empty($created_at)) {
            $model = $model->where("LOWER(created_at)", "LIKE", strtolower($created_at));
        }


        return $model;
    }

    public function add()
    {
        $tgl_mutasi = $this->input->post("tgl_mutasi");
        $nominal    = $this->input->post("nominal");
        $keterangan = $this->input->post("keterangan");
        $id_petugas = $this->userData->id;

        $data = [
            "id_petugas"        => $id_petugas,
            "tgl_mutasi"        => $tgl_mutasi,
            "nominal"           => $nominal,
            "keterangan"        => $keterangan,
            "jenis_mutasi"      => "KELUAR",
            "status_verified"   => "ACC",
        ];

        $donasiTerkumpul    = $this->db->query("SELECT SUM(nominal) AS total FROM tr_infak WHERE status_verified = 'ACC' AND jenis_mutasi = 'MASUK'")->row_array()["total"] ?: 0;
        $donasiTerpakai     = $this->db->query("SELECT SUM(nominal) AS total FROM tr_infak WHERE jenis_mutasi = 'KELUAR'")->row_array()["total"] ?: 0;
        $donasiTersedia     = $donasiTerkumpul - $donasiTerpakai;

        if ($nominal > $donasiTersedia) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan . Keterangan : Nominal yang diinputkan melebihi saldo yang tersedia. (Saldo tersedia : " . Rupiah($donasiTersedia) . ")"
            ]);
            die;
        }

        $insert = $this->trInfak->insert($data);
        if (!$insert) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan saat menyimpan penambahan data pengeluaran"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Berhasil menyimpan penambahan data pengeluaran"
        ]);
    }

    public function get($id = NULL)
    {
        $data = $this->vTrInfak->where(["id" => $id])->get();
        if (!$data) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data pengeluaran tidak ditemukan, silahkan cobalah beberapa saat lagi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data pengeluaran ditemukan",
            "data"      => $data
        ]);
    }

    public function edit()
    {
        $id_data    = $this->input->post("id_data");
        $tgl_mutasi = $this->input->post("tgl_mutasi");
        $nominal    = $this->input->post("nominal");
        $keterangan = $this->input->post("keterangan");
        $id_petugas = $this->userData->id;

        $data = [
            "id_petugas"        => $id_petugas,
            "tgl_mutasi"        => $tgl_mutasi,
            "nominal"           => $nominal,
            "keterangan"        => $keterangan,
            "jenis_mutasi"      => "KELUAR",
            "status_verified"   => "ACC",
        ];

        $cekData    = $this->trInfak->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data donasi tidak ditemukan"
            ]);
            die;
        }

        $donasiTerkumpul    = $this->db->query("SELECT SUM(nominal) AS total FROM tr_infak WHERE status_verified = 'ACC' AND jenis_mutasi = 'MASUK'")->row_array()["total"] ?: 0;
        $donasiTerpakai     = $this->db->query("SELECT SUM(nominal) AS total FROM tr_infak WHERE jenis_mutasi = 'KELUAR'")->row_array()["total"] ?: 0;
        $donasiTersedia     = $donasiTerkumpul - $donasiTerpakai + $cekData["nominal"];

        if ($nominal > $donasiTersedia) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan . Keterangan : Nominal yang diinputkan melebihi saldo yang tersedia. (Saldo tersedia : " . Rupiah($donasiTersedia) . ")"
            ]);
            die;
        }

        $update = $this->trInfak->where(["id" => $cekData["id"]])->update($data);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat mengedit data pengeluaran. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Pengeluaran berhasil di ubah !"
        ]);
    }

    public function delete()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->trInfak->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data Pengeluaran tidak ditemukan"
            ]);
            die;
        }

        $delete = $this->trInfak->where(["id" => $cekData["id"]])->delete();
        if (!$delete) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menghapus data pengeluaran. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data pengeluaran berhasil di hapus !"
        ]);
    }
}
