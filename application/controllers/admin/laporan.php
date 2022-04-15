<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function L_barang()
    {
        $data['title'] = "Laporan barang";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporanbarang', $data);
        $this->load->view('templates/footer');
    }

    public function L_penjualan()
    {
        $data['title'] = "Laporan penjualan";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporanpenjualan', $data);
        $this->load->view('templates/footer');
    }
}
