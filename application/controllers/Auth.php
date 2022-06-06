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

        $config = Array(
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
            $this->session->set_userdata(SESSION, $data);
            redirect(base_url("dashboard"));
        } else {
            $this->session->set_flashdata("gagal", "Email atau password yang kamu masukan salah !. Silahkan coba lagi");
            redirect(base_url("auth/login"));
        }
    }
}
