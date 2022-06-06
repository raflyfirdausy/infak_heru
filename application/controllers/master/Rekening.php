<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends RFLController
{
    public function __construct()
    {
        parent::__construct();
        $this->module = "rekening";
        $this->load->model("Rekening_model", "rekening");
    }

    public function index()
    {
        $data = [];
        $this->loadViewBack("master/rekening/data_rekening", $data);
    }

    public function add()
    {
        $_POST["created_by"] = $this->userData->id;
        $insert = $this->rekening->insert($_POST);
        if (!$insert) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menambahkan rekening. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Rekening berhasil di tambahkan !"
        ]);
    }

    public function get_data()
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->rekening)->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->rekening)->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->rekening->count_rows() ?: 0;

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

    public function delete()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->rekening->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data rekening tidak ditemukan"
            ]);
            die;
        }

        $delete = $this->rekening->where(["id" => $cekData["id"]])->delete();
        if (!$delete) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menghapus rekening. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Rekening berhasil di hapus !"
        ]);
    }

    public function get($id = NULL)
    {
        $data = $this->rekening->where(["id" => $id])->get();
        if (!$data) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data rekening tidak ditemukan, silahkan cobalah beberapa saat lagi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data rekening ditemukan",
            "data"      => $data
        ]);
    }

    public function edit()
    {
        $id_data        = $this->input->post("id_data");
        $_POST["created_by"] = $this->userData->id;
        unset($_POST["id_data"]);

        $cekData    = $this->rekening->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data admin tidak ditemukan"
            ]);
            die;
        }

        $update = $this->rekening->where(["id" => $cekData["id"]])->update($_POST);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat mengedit rekening. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Rekening berhasil di ubah !"
        ]);
    }
}
