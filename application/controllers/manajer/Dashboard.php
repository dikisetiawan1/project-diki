<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Anda belum Login!</strong> </div>');
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard Manajer";
        $data['title2'] = "Data barang";
        $data['scrumb'] = "Dashboard";
        $data['function'] = "Index";
        $brgMasuk = $this->db->query("SELECT * FROM tbl_barang_masuk");
        $brgKeluar = $this->db->query("SELECT * FROM tbl_barang_keluar");
        $barang = $this->db->query("SELECT * FROM tbl_data_barang WHERE stok_brg > '0'");
        $stokBrg = $this->db->query("SELECT * FROM tbl_data_barang WHERE stok_brg='0'");
        $data['brgMasuk'] = $brgMasuk->num_rows();
        $data['brgKeluar'] = $brgKeluar->num_rows();
        $data['barang2'] = $barang->num_rows();
        $data['stokBrg'] = $stokBrg->num_rows();
        $this->load->model('inventoriModel');
        $data['barang'] = $this->db->query("SELECT tbl_data_barang.id_barang,tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        
        ")->result();
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/dashboard', $data);
        $this->load->view('templates_manajer/footer');
    }
}
