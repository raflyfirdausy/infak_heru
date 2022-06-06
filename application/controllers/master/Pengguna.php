<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends RFLController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect("master/pengguna/kepala-pondok");
    }

    public function kepala_pondok()
    {
        $data = [
            "title" => "Kepala Pondok",
            "level" => "KEPALA_PONDOK"
        ];

        $this->loadViewBack("master/pengguna/data_kepala_pondok", $data);
    }

    public function petugas()
    {
        $data = [
            "title" => "Petugas",
            "level" => "PETUGAS"
        ];

        $this->loadViewBack("master/pengguna/data_petugas", $data);
    }

    public function donatur()
    {
        $data = [
            "title"     => "Donatur",
            "level"     => "DONATUR",
        ];

        $this->loadViewBack("master/pengguna/data_donatur", $data);
    }

    public function get_data($level = null)
    {
        $limit              = $this->input->post("length")  ?: 10;
        $offset             = $this->input->post("start")   ?: 0;

        $data               = $this->filterDataTable($this->user)->where("level", "=", $level)->order_by("id", "DESC")->as_array()->limit($limit, $offset)->get_all() ?: [];
        $dataFilter         = $this->filterDataTable($this->user)->where("level", "=", $level)->order_by("id", "DESC")->count_rows() ?: 0;
        $dataCountAll       = $this->user->where("level", "=", $level)->count_rows() ?: 0;

        for ($i = 0; $i < sizeof($data); $i++) {
            unset($data[$i]["password"]);
        }

        echo json_encode([
            "draw"              => $this->input->post("draw", TRUE),
            "data"              => $data,
            "recordsFiltered"   => $dataFilter,
            "recordsTotal"      => $dataCountAll,
        ]);
    }

    public function filterDataTable($model)
    {
        $inputKolom         = $this->input->post("columns");

        $email       = isset($inputKolom) ? $inputKolom[2]["search"]["value"] : "";
        $nama       = isset($inputKolom) ? $inputKolom[3]["search"]["value"] : "";
        $no_hp       = isset($inputKolom) ? $inputKolom[4]["search"]["value"] : "";
        $jenis_kelamin       = isset($inputKolom) ? $inputKolom[5]["search"]["value"] : "";
        $tempat_lahir       = isset($inputKolom) ? $inputKolom[6]["search"]["value"] : "";
        $tanggal_lahir       = isset($inputKolom) ? $inputKolom[7]["search"]["value"] : "";
        $agama       = isset($inputKolom) ? $inputKolom[8]["search"]["value"] : "";
        $prov       = isset($inputKolom) ? $inputKolom[9]["search"]["value"] : "";
        $kab       = isset($inputKolom) ? $inputKolom[10]["search"]["value"] : "";
        $kec       = isset($inputKolom) ? $inputKolom[11]["search"]["value"] : "";
        $kel       = isset($inputKolom) ? $inputKolom[12]["search"]["value"] : "";
        $kodepos       = isset($inputKolom) ? $inputKolom[13]["search"]["value"] : "";
        $created_at       = isset($inputKolom) ? $inputKolom[14]["search"]["value"] : "";

        if (!empty($email)) {
            $model = $model->where("LOWER(email)", "LIKE", strtolower($email));
        }

        if (!empty($nama)) {
            $model = $model->where("LOWER(nama)", "LIKE", strtolower($nama));
        }
        if (!empty($no_hp)) {
            $model = $model->where("LOWER(no_hp)", "LIKE", strtolower($no_hp));
        }
        if (!empty($jenis_kelamin)) {
            $model = $model->where("LOWER(jenis_kelamin)", "LIKE", strtolower($jenis_kelamin));
        }
        if (!empty($tempat_lahir)) {
            $model = $model->where("LOWER(tempat_lahir)", "LIKE", strtolower($tempat_lahir));
        }
        if (!empty($tanggal_lahir)) {
            $model = $model->where("LOWER(tanggal_lahir)", "LIKE", strtolower($tanggal_lahir));
        }

        if (!empty($tanggal_lahir)) {
            $model = $model->where("LOWER(tanggal_lahir)", "LIKE", strtolower($tanggal_lahir));
        }
        if (!empty($agama)) {
            $model = $model->where("LOWER(agama)", "LIKE", strtolower($agama));
        }
        if (!empty($prov)) {
            $model = $model->where("LOWER(prov)", "LIKE", strtolower($prov));
        }
        if (!empty($kab)) {
            $model = $model->where("LOWER(kab)", "LIKE", strtolower($kab));
        }
        if (!empty($kec)) {
            $model = $model->where("LOWER(kec)", "LIKE", strtolower($kec));
        }
        if (!empty($kel)) {
            $model = $model->where("LOWER(kel)", "LIKE", strtolower($kel));
        }
        if (!empty($kodepos)) {
            $model = $model->where("LOWER(kodepos)", "LIKE", strtolower($kodepos));
        }

        if (!empty($created_at)) {
            $model = $model->where("LOWER(created_at)", "LIKE", strtolower($created_at));
        }


        return $model;
    }

    public function get($id = NULL)
    {
        $data = $this->user->where(["id" => $id])->get();
        if (!$data) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data pengguna tidak ditemukan, silahkan cobalah beberapa saat lagi"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Data pengguna ditemukan",
            "data"      => $data
        ]);
    }

    public function add()
    {
        $_POST["password"] = md5($this->input->post("password"));
        $_POST["is_verified"] = "YA";
        $_POST["verified_by"] = $this->userData->id;
        $_POST["verified_at"] = date("Y-m-d H:i:s");

        $cekUser   = $this->user->where(["email" => $this->input->post("email")])->get();
        if ($cekUser) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Email sudah terdaftar. Silahkan gunakan email yang lain!"
            ]);
            die;
        }

        $insert = $this->user->insert($_POST);
        if (!$insert) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menambahkan admin. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "Pengguna berhasil di tambahkan atas nama " . $this->input->post("nama")
        ]);
    }

    public function edit()
    {        
        $id_data        = $this->input->post("id_data");
        $password       = $this->input->post("password");

        unset($_POST["id_data"]);

        $cekData    = $this->user->where(["id" => $id_data])->as_array()->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data user tidak ditemukan"
            ]);
            die;
        }

        if (!empty($password)) {
            $_POST["password"] = md5($password);
        }

        $update = $this->user->where(["id" => $cekData["id"]])->update($_POST);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat mengedit user. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "user berhasil di ubah !"
        ]);
    }

    public function delete()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->user->where(["id" => $id_data])->as_array()->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data user tidak ditemukan"
            ]);
            die;
        }

        $delete = $this->user->where(["id" => $cekData["id"]])->delete();
        if (!$delete) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat menghapus User. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "User berhasil di hapus !"
        ]);
    }

    public function verif()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->user->where(["id" => $id_data])->as_array()->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data user tidak ditemukan"
            ]);
            die;
        }

        $update = $this->user->where(["id" => $cekData["id"]])->update(["is_verified" => "YA"]);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat verifikasi User. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "User berhasil di verifikasi !"
        ]);
    }

    public function unverif()
    {
        $id_data    = $this->input->post("id_data");
        $cekData    = $this->user->where(["id" => $id_data])->as_array()->get();
        if (!$cekData) {
            echo json_encode([
                "code"      => 404,
                "message"   => "Data user tidak ditemukan"
            ]);
            die;
        }

        $update = $this->user->where(["id" => $cekData["id"]])->update(["is_verified" => "BELUM"]);
        if (!$update) {
            echo json_encode([
                "code"      => 503,
                "message"   => "Terjadi kesalahan saat verifikasi User. Silahkan hubungi programmer"
            ]);
            die;
        }

        echo json_encode([
            "code"      => 200,
            "message"   => "User berhasil di un verifikasi !"
        ]);
    }
}
