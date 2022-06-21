<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbarang extends CI_Controller
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
        $data['title'] = "Stok barang kosong";
        $this->load->model('inventoriModel');
        $this->load->model('inventoriModel');

        //pagination start
        // load
        $this->load->library('pagination');

        // config

        $config['base_url'] = 'http://localhost/projectSkripsi/manajer/stokbarang/index';
        $config['total_rows'] = $this->inventoriModel->countAllbrgkosong();
        $config['per_page'] = 2;
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

        $data['start'] = $this->uri->segment(4);
        $data['stok_kosong'] = $this->inventoriModel->get_brgkosong($config['per_page'], $data['start']);

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
        $this->load->library('pagination');

        // config

        $config['base_url'] = 'http://localhost/projectSkripsi/manajer/stokbarang/tersedia/index';
        $config['total_rows'] = $this->inventoriModel->countAllbrgready();
        $config['per_page'] = 2;
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

        $data['start'] = $this->uri->segment(5);
        $data['stok_ready'] = $this->inventoriModel->get_brgready($config['per_page'], $data['start']);

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
