<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance(); //MENGGANTI $this
        $CI->load->model("Identitas_model", "identitas");
        $identitas = $CI->identitas->order_by("id", "DESC")->as_object()->get();

        $this->global_data = [
            "app_name"          => $identitas->nama_aplikasi,
            "app_complete_name" => "Sistem Informasi Infak",
            "author"            => $identitas->copyright,
            "CI"                => $CI,
            "_session"          => $CI->session->userdata(SESSION),
            "title"             => ucwords(str_replace("_", " ", $this->router->fetch_class())),
            "module"            => $this->router->fetch_class(),
            "_identitas"        => $identitas,
        ];
    }

    public function loadView($view = NULL, $local_data = array(), $asData = FALSE)
    {
        $data = array_merge($this->global_data, $local_data);
        return $this->load->view($view, $data, $asData);
    }
}
