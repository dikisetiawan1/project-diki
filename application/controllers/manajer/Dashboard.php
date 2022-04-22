<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/dashboard');
        $this->load->view('templates_manajer/footer');
    }
}
