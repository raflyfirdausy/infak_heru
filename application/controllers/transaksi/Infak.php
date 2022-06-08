<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infak extends RFLController
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
        redirect("transaksi/infak/belum");
    }

    public function belum()
    {
        $data = [
            "title"             => "Donasi Pending",
            "status_verified"   => "PENDING"
        ];

        $this->loadViewBack("transaksi/infak/data_infak", $data);
    }

    public function sudah()
    {
        $data = [
            "title"             => "Donasi Sudah di ACC",
            "status_verified"   => "ACC"
        ];

        $this->loadViewBack("transaksi/infak/data_infak", $data);
    }

    public function ditolak()
    {
        $data = [
            "title"             => "Donasi Ditolak",
            "status_verified"   => "TOLAK"
        ];

        $this->loadViewBack("transaksi/infak/data_infak", $data);
    }

    public function get_data($status_verified = NULL)
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->trInfak)->where("status_verified", "=", $status_verified)->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->trInfak)->where("status_verified", "=", $status_verified)->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->trInfak->where("status_verified", "=", $status_verified)->count_rows() ?: 0;

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
        $nama_bank      = isset($inputKolom) ? $inputKolom[2]["search"]["value"] : "";
        $atas_nama      = isset($inputKolom) ? $inputKolom[3]["search"]["value"] : "";
        $no_rekening    = isset($inputKolom) ? $inputKolom[4]["search"]["value"] : "";
        $keterangan     = isset($inputKolom) ? $inputKolom[5]["search"]["value"] : "";
        $status         = isset($inputKolom) ? $inputKolom[6]["search"]["value"] : "";
        $created_at     = isset($inputKolom) && isset($inputKolom[7]) ? $inputKolom[7]["search"]["value"] : "";

        if (!empty($nama_bank)) {
            $model = $model->where("LOWER(nama_bank)", "LIKE", strtolower($nama_bank));
        }

        if (!empty($atas_nama)) {
            $model = $model->where("LOWER(atas_nama)", "LIKE", strtolower($atas_nama));
        }

        if (!empty($no_rekening)) {
            $model = $model->where("LOWER(no_rekening)", "LIKE", strtolower($no_rekening));
        }

        if (!empty($keterangan)) {
            $model = $model->where("LOWER(keterangan)", "LIKE", strtolower($keterangan));
        }

        if (!empty($status)) {
            $model = $model->where("LOWER(status)", "LIKE", strtolower($status));
        }

        if (!empty($created_at)) {
            $model = $model->where("LOWER(created_at)", "LIKE", strtolower($created_at));
        }


        return $model;
    }

    public function get($id = NULL)
    {
        $data = $this->vTrInfak->where(["id" => $id])->get();
        if (!$data) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data infak tidak ditemukan, silahkan cobalah beberapa saat lagi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data infak ditemukan",
            "data"      => $data
        ]);
    }

    public function edit()
    {
        $id_data            = $this->input->post("id_data");
        $status_verified    = $this->input->post("status_verified");
        $catatan_petugas    = $this->input->post("catatan_petugas");

        $cekData    = $this->trInfak->where(["id" => $id_data])->as_array()->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data Donasi tidak ditemukan"
            ]);
            die;
        }

        $data = [
            "id_petugas"         => $this->userData->id,
            "status_verified"    => $status_verified,
            "catatan_petugas"    => $catatan_petugas
        ];

        $update = $this->trInfak->where(["id" => $cekData["id"]])->update($data);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat memproses data donasi. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data donasi berhasil di proses !"
        ]);
    }
}
