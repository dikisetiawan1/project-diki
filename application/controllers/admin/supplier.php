<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
        $data['title'] = "Data supplier";

        $this->load->model('inventoriModel');
        // load
        $this->load->library('pagination');

        // config

        $config['base_url'] = 'http://localhost/projectSkripsi/admin/supplier/index';
        $config['total_rows'] = $this->inventoriModel->countAllsupplier();
        $config['per_page'] = 3;
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
        $data['supplier'] = $this->inventoriModel->get_sup($config['per_page'], $data['start']);


        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/supplier', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama_supplier = $this->input->post('nama_supplier');
            $no_tlp = $this->input->post('no_tlp');
            $alamat = $this->input->post('alamat');

            $data = array(

                'nama_supplier' => $nama_supplier,
                'no_tlp' => $no_tlp,
                'alamat' => $alamat

            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->insert_data($data, 'tbl_supplier');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong> Data berhasil ditambahkan!
          </div>');
            redirect('admin/supplier');
        }
    }
    public function updateData($id)
    {
        $where = array('id_supplier' => $id);
        $this->load->model('inventoriModel');
        $data['supplier'] = $this->db->query("SELECT * FROM tbl_supplier WHERE id_supplier = '$id'")->result();
        $data['title'] = "Edit data supplier";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/updateDataSupplier', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id_supplier');
            $nama_supplier = $this->input->post('nama_supplier');
            $no_tlp = $this->input->post('no_tlp');
            $alamat = $this->input->post('alamat');


            $data = array(

                'nama_supplier' => $nama_supplier,
                'no_tlp' => $no_tlp,
                'alamat' => $alamat

            );
            $where = array(
                'id_supplier' => $id
            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->update_data('tbl_supplier', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong>Data barang berhasil di ubah!
          </div>');
            redirect('admin/supplier');
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('nama_supplier', 'nama supplier', 'required');
        $this->form_validation->set_rules('no_tlp', 'nomor telepone', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
    }
    public function deleteData($id)
    {
        $where = array('id_supplier' => $id);
        $this->load->model('inventoriModel');
        $this->inventoriModel->delete_data($where, 'tbl_supplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Data berhasil di Hapus!
      </div>');
        redirect('admin/supplier');
    }
    public function cetakData()
    {
        $data['title'] = "Data supplier";
        $this->load->model('inventoriModel');
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();
        $this->load->view('templates_admin/header');

        $this->load->view('admin/cetakSupplier', $data);
    }
}
