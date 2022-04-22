<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Transaksi Barang";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/transaksiBarang', $data);
        $this->load->view('templates_admin/footer');
    }
}
