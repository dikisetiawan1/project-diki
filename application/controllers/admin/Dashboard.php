<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboar admin";
        $data['scrumb'] = "Dashboard";
        $data['function'] = "Index";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
