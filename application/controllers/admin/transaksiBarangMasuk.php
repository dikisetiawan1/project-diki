<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Anda belum Login!</strong> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Transaksi Barang Masuk";

        $this->load->library('pagination');

        // config
        $this->load->model('inventoriModel');
        $config['base_url'] = 'http://localhost/projectSkripsi/admin/transaksibarangmasuk/index';
        $config['total_rows'] = $this->inventoriModel->countAllbrgmsk();
        $config['per_page'] = 5;
        // styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end"> ';
        $config['full_tag_close'] = '</ul></nav>';


        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');
        //initialize

        $this->pagination->initialize($config);
        $data['keyword'] = $this->input->post('keyword');
        if ($this->input->post('submit')) {
            $data['keyword'];
        }
        $data['start'] = $this->uri->segment(4);
        $data['barangmasuk'] = $this->inventoriModel->get_brgmsk($config['per_page'], $data['start'], $data['keyword']);
        $data['keyword'] = $this->input->post('keyword');


        // ambil data barang & supplier
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
            $hrg_brg = $this->input->post('hrg_barang');
            $stok_masuk = $this->input->post('stok_masuk');
            $id_supplier = $this->input->post('id_supplier');






            $data = array(


                'id_barang'      => $id_barang,
                'tgl_masuk' => $tgl_masuk,
                'hrg_barang' => $hrg_brg,
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


        $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk ', 'required');
        $this->form_validation->set_rules('hrg_barang', 'harga barang ', 'required');
        $this->form_validation->set_rules('stok_masuk', 'stok masuk ', 'required');
        $this->form_validation->set_rules('id_supplier', 'stok masuk ', 'required');
    }
    public function deleteData($id)
    {
        $where = array('id_brgMasuk' => $id);
        $this->load->model('inventoriModel');
        $this->inventoriModel->delete_data($where, 'tbl_barang_masuk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Data berhasil di Hapus!
      </div>');
        redirect('admin/transaksibarangkeluar');
    }
    public function cetakData()
    {
        $data['title'] = "Transaksi Barang Masuk";
        $data['barangmasuk'] = $this->db->query("SELECT tbl_barang_masuk.id_brgMasuk, tbl_barang_masuk.tgl_masuk,tbl_barang_masuk.stok_masuk,tbl_barang_masuk.hrg_brg,tbl_data_barang.nama_brg,tbl_supplier.nama_supplier
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang
        INNER JOIN tbl_supplier ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier
        
        
         ")->result();
        $this->load->model('inventoriModel');
        $data['stoksum'] = $this->inventoriModel->get_datasum()->result();
        $this->load->model('inventoriModel');
        $this->load->view('templates_admin/header');

        $this->load->view('admin/cetakBarangMasuk', $data);
    }
}
