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
            "status_verified"   => "BELUM",
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

    public  function riwayat()
    {

        $data = [];

        $this->loadViewBack("transaksi/donasi/data_riwayat", $data);
    }
}
