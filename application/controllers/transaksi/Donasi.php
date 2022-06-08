<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends RFLController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Rekening_model", "rekening");
        $this->load->model("JenisInfak_model", "jenis");
        $this->load->model("Trinfak_model", "trInfak");
    }

    public function index()
    {
        redirect("transaksi/donasi/tambah");
    }

    public function tambah()
    {
        $rekening   = $this->rekening->where(["status" => "AKTIF"])->get_all();
        $jenis      = $this->jenis->get_all();

        $data = [
            "rekening"  => $rekening,
            "jenis"     => $jenis,
        ];

        $this->loadViewBack("transaksi/donasi/donasi_tambah", $data);
    }

    public function tambah_proses()
    {
        // d($_FILES);
        // d($_POST);
        $tgl_mutasi     = $this->input->post("tgl_mutasi");
        $id_jenis       = $this->input->post("id_jenis");
        $id_rekening    = $this->input->post("id_rekening");
        $nominal        = $this->input->post("nominal");
        $keterangan     = $this->input->post("keterangan");
        $jenis_mutasi   = "MASUK";

        //TODO : CEK REKENING
        $_rekening = $this->rekening->where(["id" => $id_rekening])->get();
        if (!$_rekening) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan . Keterangan : Data rekening tidak ditemukan"
            ]);
            die;
        }

        $data = [
            "id_donatur"        => $this->userData->id,
            "id_jenis"          => $id_jenis,
            "tgl_mutasi"        => $tgl_mutasi,
            "status_verified"   => "PENDING",
            "nominal"           => $nominal,
            "jenis_mutasi"      => $jenis_mutasi,
            "keterangan"        => $keterangan,
            "rek_no"            => $_rekening["no_rekening"],
            "rek_nama"          => $_rekening["atas_nama"],
            "rek_bank"          => $_rekening["nama_bank"]
        ];

        if (!empty($_FILES["bukti"]["name"])) {
            $config['upload_path']          = './assets/infak/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1024 * 5;
            $config['file_name']            = 'bukti_' . date('YmdHis');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti')) {
                // $this->session->set_flashdata('error', $this->upload->display_errors());
                echo json_encode([
                    "code"      => 400,
                    "message"   => "Terjadi kesalahan saat upload bukti transfer. Keterangan : " . $this->upload->display_errors()
                ]);
                die;
            } else {
                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
                $data["bukti"]   = $bukti;
            }
        } else {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan. Keterangan : Bukti transfer tidak boleh kosong"
            ]);
            die;
        }


        $insert = $this->trInfak->insert($data);
        if (!$insert) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan saat menyimpan penambahan data donasi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Berhasil menyimpan penambahan data donasi"
        ]);
    }

    public function edit_proses()
    {
        // d($_FILES);
        // d($_POST);
        $id_data        = $this->input->post('id_data');
        $tgl_mutasi     = $this->input->post("tgl_mutasi");
        $id_jenis       = $this->input->post("id_jenis");
        $id_rekening    = $this->input->post("id_rekening");
        $nominal        = $this->input->post("nominal");
        $keterangan     = $this->input->post("keterangan");
        $jenis_mutasi   = "MASUK";

        //TODO : CEK REKENING
        $_rekening = $this->rekening->where(["id" => $id_rekening])->get();
        if (!$_rekening) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan . Keterangan : Data rekening tidak ditemukan"
            ]);
            die;
        }

        $data = [
            "id_donatur"        => $this->userData->id,
            "id_jenis"          => $id_jenis,
            "tgl_mutasi"        => $tgl_mutasi,
            "status_verified"   => "PENDING",
            "nominal"           => $nominal,
            "jenis_mutasi"      => $jenis_mutasi,
            "keterangan"        => $keterangan,
            "rek_no"            => $_rekening["no_rekening"],
            "rek_nama"          => $_rekening["atas_nama"],
            "rek_bank"          => $_rekening["nama_bank"]
        ];

        if (!empty($_FILES["bukti"]["name"])) {
            $config['upload_path']          = './assets/infak/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1024 * 5;
            $config['file_name']            = 'bukti_' . date('YmdHis');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti')) {
                // $this->session->set_flashdata('error', $this->upload->display_errors());
                echo json_encode([
                    "code"      => 400,
                    "message"   => "Terjadi kesalahan saat upload bukti transfer. Keterangan : " . $this->upload->display_errors()
                ]);
                die;
            } else {
                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
                $data["bukti"]   = $bukti;
            }
        }


        $insert = $this->trInfak->where(["id" => $id_data])->update($data);
        if (!$insert) {
            echo json_encode([
                "code"      => 400,
                "message"   => "Terjadi kesalahan saat menyimpan penambahan data donasi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Berhasil menyimpan perubahan data donasi"
        ]);
    }

    public function riwayat()
    {

        $data = [
            "title" => "Riwayat donasi infak"
        ];

        $this->loadViewBack("transaksi/donasi/data_riwayat", $data);
    }

    public function edit($id = NULL)
    {
        $_transaksi = $this->trInfak->where([
            "id"            => $id,
            "id_donatur"    => $this->userData->id
        ])->get();

        if (!$_transaksi) {
            $this->session->set_flashdata("gagal", "Data tidak ditemukan");
            redirect("transaksi/donasi/riwayat");
        }

        $rekening   = $this->rekening->where(["status" => "AKTIF"])->get_all();
        $jenis      = $this->jenis->get_all();

        $data = [
            "title"     => "Edit data donasi infak",
            "rekening"  => $rekening,
            "jenis"     => $jenis,
            "transaksi" => $_transaksi
        ];

        $this->loadViewBack("transaksi/donasi/donasi_edit", $data);
    }

    public function get_data()
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->trInfak)->where("id_donatur", "=", $this->userData->id)->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->trInfak)->where("id_donatur", "=", $this->userData->id)->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->trInfak->where("id_donatur", "=", $this->userData->id)->count_rows() ?: 0;

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
}
