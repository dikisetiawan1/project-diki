<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{



    public function index()
    {
        $data['title'] = "Data supplier";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/supplier', $data);
        $this->load->view('templates_admin/footer');
    }
}
