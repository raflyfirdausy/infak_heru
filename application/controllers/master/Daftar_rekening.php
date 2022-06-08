<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_rekening extends RFLController
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
        $this->loadViewBack("master/rekening/daftar_rekening", $data);
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
        $nama_bank      = isset($inputKolom) ? $inputKolom[1]["search"]["value"] : "";
        $atas_nama      = isset($inputKolom) ? $inputKolom[2]["search"]["value"] : "";
        $no_rekening    = isset($inputKolom) ? $inputKolom[3]["search"]["value"] : "";
        $keterangan     = isset($inputKolom) ? $inputKolom[4]["search"]["value"] : "";      
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

        return $model;
    }
}
