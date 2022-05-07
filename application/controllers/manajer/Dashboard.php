<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboar user";
        $data['scrumb'] = "Dashboard";
        $data['function'] = "Index";
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/dashboard', $data);
        $this->load->view('templates_manajer/footer');
    }
}
