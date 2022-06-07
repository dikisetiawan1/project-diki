<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('inventoriModel');
    }



    public function L_barangMasuk()
    {



        $data['title'] = "Laporan barang masuk";


        if (isset($_GET['dari']) && isset($_GET['ke'])) {
            $data['query'] = $this->db->query("SELECT * FROM tbl_barang_masuk BETWEEN '" . $_GET['dari'] . "' AND '" . $_GET['ke'] . "'");
        } else {
            $data['query'] = $this->db->query("SELECT * FROM tbl_barang_masuk");
        };

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/laporanBrgMasuk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function L_barangKeluar()
    {
        $data['title'] = "Laporan barang keluar";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/laporanBrgKeluar', $data);
        $this->load->view('templates_admin/footer');
    }
}
