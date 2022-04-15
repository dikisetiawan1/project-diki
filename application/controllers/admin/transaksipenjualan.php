<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksipenjualan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Transaksi Penjualan";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/transaksiPenjualan', $data);
        $this->load->view('templates/footer');
    }
}
