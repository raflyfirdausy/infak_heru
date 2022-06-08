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
            "title" => "Donasi Pending"
        ];

        $this->loadViewBack("transaksi/infak/data_belum", $data);
    }
}
