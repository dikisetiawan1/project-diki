<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('inventoriModel');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Anda belum Login!</strong> </div>');
            redirect('auth');
        }
    }



    public function barangMasuk()
    {



        $data['title'] = "Laporan barang masuk";



        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/laporanBrgMasuk', $data);
        $this->load->view('templates_manajer/footer');
    }

    public function filter()
    {

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');

        // $data['sum_stok'] = $this->inventoriModel->stok_sum();
        $data['datafilter'] = $this->inventoriModel->filter_bytanggal($tanggalawal, $tanggalakhir);

        $data['disct'] = $this->db->query("SELECT DISTINCT tbl_data_barang.nama_brg
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang


        WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk  ASC
        
        ")->result();


        $data['title'] = "Laporan Transaksi Barang Masuk";
        $this->load->view('templates_manajer/header');
        $this->load->view('manajer/cetakLaporanMasuk', $data);
    }

    public function barangKeluar()
    {
        $data['title'] = "Laporan barang keluar";
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/laporanBrgKeluar', $data);
        $this->load->view('templates_manajer/footer');
    }
    public function filter2()
    {

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');

        $data['datafilter'] = $this->inventoriModel->filter_bytanggal2($tanggalawal, $tanggalakhir);
        $data['stok_sum'] = $this->inventoriModel->sum_stok_keluar($tanggalawal, $tanggalakhir);

        $data['disct'] = $this->db->query("SELECT DISTINCT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang 

        WHERE tanggal_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_keluar DESC
        
        ")->result();


        $data['title'] = "Laporan Transaksi Barang Keluar";
        $this->load->view('templates_manajer/header');
        $this->load->view('manajer/cetakLaporanKeluar', $data);
    }
}
