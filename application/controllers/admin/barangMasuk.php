<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Data barang masuk";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/barangmasuk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah data barangs";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/formTambahDataBarang', $data);
        $this->load->view('templates_admin/footer');
    }
}
