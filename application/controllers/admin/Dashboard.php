<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboar admin";
        $data['scrumb'] = "Dashboard";
        $data['function'] = "Index";

        $brgMasuk = $this->db->query("SELECT * FROM tbl_barang_masuk");
        $brgKeluar = $this->db->query("SELECT * FROM tbl_barang_keluar");
        $barang = $this->db->query("SELECT * FROM tbl_data_barang");
        $stokBrg = $this->db->query("SELECT * FROM tbl_data_barang WHERE stok_brg='0'");
        $data['brgMasuk'] = $brgMasuk->num_rows();
        $data['brgKeluar'] = $brgKeluar->num_rows();
        $data['barang'] = $barang->num_rows();
        $data['stokBrg'] = $stokBrg->num_rows();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
