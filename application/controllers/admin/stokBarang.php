<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbarang extends CI_Controller
{




    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/stokbarang');
        $this->load->view('templates_admin/footer');
    }
}
