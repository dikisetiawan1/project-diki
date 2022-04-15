<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Transaksi Barang";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/transaksiBarang', $data);
        $this->load->view('templates/footer');
    }
}
