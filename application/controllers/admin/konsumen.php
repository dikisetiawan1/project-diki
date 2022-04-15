<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Data cabang";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/konsumen', $data);
        $this->load->view('templates/footer');
    }
}
