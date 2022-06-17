<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard admin";
        $data['title2'] = "Tiga transaksi barang masuk terakhir - UPDATE";
        $data['title3'] = "Tiga transaksi barang keluar terakhir - UPDATE";
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

        $data['barangmasuk'] = $this->db->query("SELECT tbl_barang_masuk.id_brgMasuk, tbl_barang_masuk.tgl_masuk,tbl_barang_masuk.stok_masuk,tbl_barang_masuk.hrg_brg,tbl_data_barang.nama_brg,tbl_supplier.nama_supplier
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang
        INNER JOIN tbl_supplier ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier

        ORDER BY tgl_masuk DESC LIMIT 3")->result();
        $data['barangkeluar'] = $this->db->query("SELECT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
         FROM tbl_barang_keluar
         INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang
         ORDER BY tanggal_keluar DESC LIMIT 3
         ")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
