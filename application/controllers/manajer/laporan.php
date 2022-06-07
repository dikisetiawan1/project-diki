<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function L_barangMasuk()
    {
        $data['title'] = "Laporan barang masuk";
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/laporanBrgMasuk', $data);
        $this->load->view('templates_manajer/footer');
    }

    public function L_barangKeluar()
    {
        $data['title'] = "Laporan barang masuk";
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/laporanBrgKeluar', $data);
        $this->load->view('templates_manajer/footer');
    }
}
