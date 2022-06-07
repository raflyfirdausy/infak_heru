<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Auth_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user");
    }

    public function email()
    {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'infak.heru@gmail.com',
            'smtp_pass' => 'Djarum76',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);

        $this->email->from('infak.heru@gmail.com', 'INFAK HERU');
        $this->email->to('rafly.firdausy@gmail.com.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $result = $this->email->send();
        print_r($result);
    }

    public function index()
    {
        redirect(base_url("auth/login"));
    }

    public function login()
    {
        if ($this->session->has_userdata(SESSION)) {
            redirect(base_url("dashboard"));
        }
        $this->loadView('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }

    public function login_proses()
    {
        $username   = $this->input->post('username');
        $password   = md5($this->input->post('password'));

        $data       = $this->user->where(["email" => $username, "password" => $password])->get();
        if ($data) {
            if ($data["is_verified"] == "YA") {
                $this->session->set_userdata(SESSION, $data);
                redirect(base_url("dashboard"));
            } else {
                $this->session->set_flashdata("gagal", "Akun anda belum di verifikasi. Silahkan hubungi petugas untuk melakukan verifikasi");
                redirect(base_url("auth/login"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Email atau password yang kamu masukan salah !. Silahkan coba lagi");
            redirect(base_url("auth/login"));
        }
    }

    public function register()
    {
        $this->loadView('auth/register');
    }

    public function proses()
    {
        $_POST["password"]      = md5($this->input->post("password"));
        $_POST["is_verified"]   = "BELUM";
        $_POST["level"]         = "DONATUR";
        $_POST["verified_by"]   = NULL;
        $_POST["verified_at"]   = NULL;

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
            "message"   => "Pendaftaran donatur berhasil dilakukan atas nama " . $this->input->post("nama") . " Silahkan tunggu sampai petugas mengkonfirmasi akun anda!"
        ]);
    }
}
