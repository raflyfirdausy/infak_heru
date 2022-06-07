<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_infak extends RFLController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("JenisInfak_model", "jenis");
    }

    public function index()
    {
        $data = [];
        $this->loadViewBack("master/jenis_infak/data_jenis", $data);
    }

    public function add()
    {
        $_POST["created_by"] = $this->userData->id;
        $insert = $this->jenis->insert($_POST);
        if (!$insert) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menambahkan jenis infak. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Jenis Infak berhasil di tambahkan !"
        ]);
    }

    public function get_data()
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->jenis)->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->jenis)->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->jenis->count_rows() ?: 0;

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
        $nama           = isset($inputKolom) ? $inputKolom[2]["search"]["value"] : "";
        $keterangan     = isset($inputKolom) ? $inputKolom[3]["search"]["value"] : "";
        $created_at     = isset($inputKolom) ? $inputKolom[4]["search"]["value"] : "";

        if (!empty($nama)) {
            $model = $model->where("LOWER(nama)", "LIKE", strtolower($nama));
        }

        if (!empty($keterangan)) {
            $model = $model->where("LOWER(keterangan)", "LIKE", strtolower($keterangan));
        }

        if (!empty($created_at)) {
            $model = $model->where("LOWER(created_at)", "LIKE", strtolower($created_at));
        }


        return $model;
    }

    public function delete()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->jenis->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data jenis tidak ditemukan"
            ]);
            die;
        }

        $delete = $this->jenis->where(["id" => $cekData["id"]])->delete();
        if (!$delete) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menghapus jenis. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Jenis Infak berhasil di hapus !"
        ]);
    }

    public function get($id = NULL)
    {
        $data = $this->jenis->where(["id" => $id])->get();
        if (!$data) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data jenis infak tidak ditemukan, silahkan cobalah beberapa saat lagi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data jenis infak ditemukan",
            "data"      => $data
        ]);
    }

    public function edit()
    {
        $id_data        = $this->input->post("id_data");
        $_POST["created_by"] = $this->userData->id;
        unset($_POST["id_data"]);

        $cekData    = $this->jenis->where(["id" => $id_data])->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data jenis infak tidak ditemukan"
            ]);
            die;
        }

        $update = $this->jenis->where(["id" => $cekData["id"]])->update($_POST);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat mengedit jenis infak. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Jenis Infak berhasil di ubah !"
        ]);
    }
}
