<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarangmasuk extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Transaksi Barang Masuk";
        $data['barangmasuk'] = $this->db->query("SELECT tbl_barang_masuk.tgl_masuk,tbl_barang_masuk.stok_masuk,tbl_barang_masuk.hrg_brg,tbl_data_barang.nama_brg,tbl_supplier.nama_supplier
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang
        INNER JOIN tbl_supplier ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier
        
        
         ")->result();
        $this->load->model('inventoriModel');

        $data['barang'] = $this->inventoriModel->get_data('tbl_data_barang')->result();
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/barangMasuk', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $id_barang = $this->input->post('id_barang');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $hrg_brg = $this->input->post('hrg_brg');
            $stok_masuk = $this->input->post('stok_masuk');
            $id_supplier = $this->input->post('id_supplier');






            $data = array(


                'id_barang'      => $id_barang,
                'tgl_masuk' => $tgl_masuk,
                'hrg_brg' => $hrg_brg,
                'stok_masuk' => $stok_masuk,
                'id_supplier' => $id_supplier




            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->insert_data($data, 'tbl_barang_masuk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong>Transaksi barang sukses!
          </div>');
            redirect('admin/transaksibarangmasuk');
        }
    }
    public function _rules()
    {

        $this->form_validation->set_rules('id_barang', 'nama barang', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk ', 'required');
        $this->form_validation->set_rules('hrg_brg', 'harga barang ', 'required');
        $this->form_validation->set_rules('stok_masuk', 'stok masuk ', 'required');
        $this->form_validation->set_rules('id_supplier', 'stok masuk ', 'required');
    }
}
