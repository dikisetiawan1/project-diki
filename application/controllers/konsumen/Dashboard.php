<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates_konsumen/header');
        $this->load->view('templates_konsumen/sidebar');
        $this->load->view('templates_konsumen/topbar');
        $this->load->view('konsumen/dashboard');
        $this->load->view('templates_konsumen/footer');
    }
}
