<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends RFLController
{
    public function __construct()
    {
        parent::__construct();
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
        $data = [];
        $this->loadViewBack("dashboard/dashboard_donatur", $data);
    }

    public function dashboardAdmin()
    {
        $data = [];
        $this->loadViewBack("dashboard/dashboard_admin", $data);
    }
}
