<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang extends CI_Controller
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
        $data['title'] = "Data barang";


        $this->load->model('inventoriModel');
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();
        $data['kategori'] = $this->inventoriModel->get_data('tbl_kategori  ')->result();
        // load
        $this->load->library('pagination');

        // config

        $config['base_url'] = 'http://localhost/project-diki/admin/databarang/index';
        $config['total_rows'] = $this->inventoriModel->countAllbrg();
        $config['per_page'] = 4;


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

        // ambil data keyword
        $data['keyword'] = $this->input->post('keyword');
        if ($this->input->post('submit')) {
            $data['keyword'];
        }
        $data['start'] = $this->uri->segment(4);
        $data['barang'] = $this->inventoriModel->get_brg($config['per_page'], $data['start'], $data['keyword']);

        $data['value_kat'] = $this->inventoriModel->get_data('tbl_kategori')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/databarang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $id_barang = $this->input->post('id_barang');
            $nama_brg = $this->input->post('nama_brg');
            $id_kategori = $this->input->post('id_kategori');
            $satuan = $this->input->post('satuan');




            $data = array(
                'id_barang' => $id_barang,
                'nama_brg' => $nama_brg,
                'id_kategori' => $id_kategori,
                'satuan' => $satuan,





            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->insert_data($data, 'tbl_data_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong> Barang berhasil di tambahkan!
          </div>');
            redirect('admin/databarang');
        }
    }
    public function updateData($id)
    {
        $where = array('id_barang' => $id);
        $data['barang'] = $this->db->query("SELECT tbl_data_barang.satuan,tbl_data_barang.id_barang,tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori

        FROM tbl_data_barang

        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
      
        WHERE id_barang = '$id'")->result();

        $this->load->model('inventoriModel');
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();
        $data['kategori'] = $this->inventoriModel->get_data('tbl_kategori  ')->result();
        $data['title'] = "Edit data barang";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/updateDataBarang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id_barang');
            $nama_brg = $this->input->post('nama_brg');
            $id_kategori = $this->input->post('id_kategori');
            $satuan = $this->input->post('satuan');




            $data = array(

                'nama_brg' => $nama_brg,
                'id_kategori' => $id_kategori,
                'satuan' => $satuan,


            );
            $where = array(
                'id_barang' => $id
            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->update_data('tbl_data_barang', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong>Data barang berhasil di ubah!
          </div>');
            redirect('admin/databarang');
        }
    }
    public function rules()
    {

        $this->form_validation->set_rules('nama_brg', 'nama barang', 'required');
        $this->form_validation->set_rules('id_kategori', 'kategori', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
    }
    public function deleteData($id)
    {
        $where = array('id_barang' => $id);
        $this->load->model('inventoriModel');
        $this->inventoriModel->delete_data($where, 'tbl_data_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Data berhasil di Hapus!
      </div>');
        redirect('admin/databarang');
    }


    public function cetakData()
    {
        $data['title'] = "Data barang";
        $this->load->model('inventoriModel');
        $data['cetakbarang'] = $this->db->query("SELECT tbl_data_barang.id_barang,tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        
        ")->result();
        $this->load->view('templates_admin/header');

        $this->load->view('admin/cetakBarang', $data);
    }
}
