<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ubahPassword extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Ubah Password";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/ubahPassword', $data);
        $this->load->view('templates_admin/footer');
    }
}
