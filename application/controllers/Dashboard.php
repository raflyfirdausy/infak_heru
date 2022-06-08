<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends RFLController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Trinfak_model", "trInfak");
        $this->load->model("VtrInfak_model", "vTrInfak");
    }

    public function index()
    {
        if (validasiRole("DONATUR")) {
            $this->dashboardDonatur();
        } else {
            $this->dashboardAdmin();
        }
    }

    public function dashboardDonatur()
    {
        $idUser             = $this->userData->id;

        $donasiTerkumpul    = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'ACC' AND jenis_mutasi = 'MASUK'")->row_array()["total"];
        $donasiTerpakai     = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE jenis_mutasi = 'KELUAR'")->row_array()["total"];

        $donasiDiterima     = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'ACC'        AND jenis_mutasi = 'MASUK' AND id_donatur = '$idUser'")->row_array()["total"];
        $donasiPending      = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'PENDING'    AND jenis_mutasi = 'MASUK' AND id_donatur = '$idUser'")->row_array()["total"];
        $donasiDitolak      = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'TOLAK'      AND jenis_mutasi = 'MASUK' AND id_donatur = '$idUser'")->row_array()["total"];

        $donasikuTerakhir     = $this->vTrInfak
            ->where([
                "id_donatur"        => $idUser,
                "jenis_mutasi"      => "MASUK",
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];

        $donasiSemuaTerakhir     = $this->vTrInfak
            ->where([
                "jenis_mutasi"      => "MASUK",
                "status_verified"   => "ACC"
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];

        $donasiKeluar     = $this->vTrInfak
            ->where([
                "jenis_mutasi"      => "KELUAR",
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];


        for ($i = 0; $i < sizeof($donasiSemuaTerakhir); $i++) {
            if ($donasiSemuaTerakhir[$i]["id_donatur"] != $this->userData->id) {
                $target = $donasiSemuaTerakhir[$i]["nama_donatur"];
                $count = strlen($target) - 6;
                $output = substr_replace($target, str_repeat('*', $count), 3, $count);
                $donasiSemuaTerakhir[$i]["nama_donatur"] = $output;
            }
        }

        $data = [
            "donasiTerkumpul"       => $donasiTerkumpul     ?: 0,
            "donasiTerpakai"        => $donasiTerpakai      ?: 0,
            "donasiSaldo"           => $donasiTerkumpul - $donasiTerpakai,

            "donasiDiterima"        => $donasiDiterima      ?: 0,
            "donasiPending"         => $donasiPending       ?: 0,
            "donasiDitolak"         => $donasiDitolak       ?: 0,

            "donasikuTerakhir"      => $donasikuTerakhir,
            "donasiSemuaTerakhir"   => $donasiSemuaTerakhir,
            "donasiKeluar"          => $donasiKeluar
        ];

        $this->loadViewBack("dashboard/dashboard_donatur", $data);
    }

    public function dashboardAdmin()
    {
        $idUser             = $this->userData->id;

        $donasiTerkumpul    = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'ACC' AND jenis_mutasi = 'MASUK'")->row_array()["total"];
        $donasiTerpakai     = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE jenis_mutasi = 'KELUAR'")->row_array()["total"];

        $donasiDiterima     = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'ACC'        AND jenis_mutasi = 'MASUK'")->row_array()["total"];
        $donasiPending      = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'PENDING'    AND jenis_mutasi = 'MASUK'")->row_array()["total"];
        $donasiDitolak      = $this->db->query("SELECT SUM(nominal) AS total FROM vtr_infak WHERE status_verified = 'TOLAK'      AND jenis_mutasi = 'MASUK'")->row_array()["total"];

        $donasikuTerakhir     = $this->vTrInfak
            ->where([
                "id_donatur"        => $idUser,
                "jenis_mutasi"      => "MASUK",
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];

        $donasiSemuaTerakhir     = $this->vTrInfak
            ->where([
                "jenis_mutasi"      => "MASUK",
                "status_verified"   => "ACC"
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];

        $donasiKeluar     = $this->vTrInfak
            ->where([
                "jenis_mutasi"      => "KELUAR",
            ])
            ->limit(10)
            ->order_by("id", "DESC")
            ->get_all() ?: [];

        $data = [
            "donasiTerkumpul"       => $donasiTerkumpul     ?: 0,
            "donasiTerpakai"        => $donasiTerpakai      ?: 0,
            "donasiSaldo"           => $donasiTerkumpul - $donasiTerpakai,

            "donasiDiterima"        => $donasiDiterima      ?: 0,
            "donasiPending"         => $donasiPending       ?: 0,
            "donasiDitolak"         => $donasiDitolak       ?: 0,

            "donasikuTerakhir"      => $donasikuTerakhir,
            "donasiSemuaTerakhir"   => $donasiSemuaTerakhir,
            "donasiKeluar"          => $donasiKeluar
        ];
        $this->loadViewBack("dashboard/dashboard_admin", $data);
    }
}
