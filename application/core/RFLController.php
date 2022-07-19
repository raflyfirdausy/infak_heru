<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RFLController extends MY_Controller
{
    public $userData;
    public $belumVerif;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata(SESSION)) {
            redirect(base_url("auth/login"));
        }
        $this->load->model("User_model", "user");
        $this->userData = $this->user->where(["id" => $this->session->userdata(SESSION)["id"]])->as_object()->get();

        $this->load->model("VtrInfak_model", "vInfak");
        $belumVerif["total"]    = $this->vInfak->where(["status_verified" => "PENDING"])->as_array()->count_rows() ?: 0;
        $belumVerif["sample"]   = $this->vInfak->where(["status_verified" => "PENDING"])->order_by("created_at", "ASC")->limit(10)->get_all();
        $this->belumVerif = $belumVerif;
    }

    protected function loadViewBack($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }

        $this->loadView("template/header", $local_data, $asData);
        $this->loadView("template/sidebar", $local_data, $asData);
        $this->loadView($view, $local_data, $asData);
        $this->loadView("template/footer", $local_data, $asData);
    }
}
