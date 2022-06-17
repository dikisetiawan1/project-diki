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



        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/laporanBrgMasuk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function filter()
    {

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');

        $data['sum_stok'] = $this->inventoriModel->stok_sum();
        $data['datafilter'] = $this->inventoriModel->filter_bytanggal($tanggalawal, $tanggalakhir);

        $data['disct'] = $this->db->query("SELECT DISTINCT tbl_data_barang.nama_brg
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang


        WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk  ASC
        
        ")->result();


        $data['title'] = "Laporan Transaksi Barang Masuk";
        $this->load->view('templates_admin/header');
        $this->load->view('admin/cetakLaporanMasuk', $data);
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
    public function filter2()
    {

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');


        $data['datafilter'] = $this->inventoriModel->filter_bytanggal2($tanggalawal, $tanggalakhir);

        $data['disct'] = $this->db->query("SELECT DISTINCT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang 

        WHERE tanggal_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_keluar DESC
        
        ")->result();


        $data['title'] = "Laporan Transaksi Barang Keluar";
        $this->load->view('templates_admin/header');
        $this->load->view('admin/cetakLaporanKeluar', $data);
    }
}
