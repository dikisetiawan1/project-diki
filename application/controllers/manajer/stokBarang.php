<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbarang extends CI_Controller
{




    public function index()
    {
        $data['title'] = "Stok barang kosong";
        $this->load->model('inventoriModel');
        $data['stok'] = $this->db->query("SELECT  tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori
        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        WHERE stok_brg <= 0")->result();
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/stok_kosong', $data);
        $this->load->view('templates_manajer/footer');
    }
    public function cetakData()
    {

        $this->load->model('inventoriModel');
        $data['cetakstok'] = $this->db->query("SELECT  tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori
        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        WHERE stok_brg <= 0")->result();
        $this->load->view('templates_manajer/header');

        $this->load->view('manajer/cetakStokBarang', $data);
    }

    public function tersedia()
    {
        $data['title'] = "Data stok barang tersedia";
        $this->load->model('inventoriModel');
        $data['stok_sedia'] = $this->db->query("SELECT  tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori
        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        WHERE stok_brg > 0")->result();
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/stok_tersedia', $data);
        $this->load->view('templates_manajer/footer');
    }
    public function cetakData2()
    {

        $this->load->model('inventoriModel');
        $data['cetakstok'] = $this->db->query("SELECT  tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori
        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        WHERE stok_brg > 0")->result();
        $this->load->view('templates_manajer/header');

        $this->load->view('manajer/cetakStokBarang2', $data);
    }
}
