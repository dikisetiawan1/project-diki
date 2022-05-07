<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategoribarang extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Data kategori barang";
        $this->load->model('inventoriModel');
        $data['kategori'] = $this->inventoriModel->get_data('tbl_kategori')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/kategoribarang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama_kategori = $this->input->post('nama_kategori');


            $data = array(

                'nama_kategori' => $nama_kategori,


            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->insert_data($data, 'tbl_kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong> Data berhasil ditambahkan!
          </div>');
            redirect('admin/kategoribarang');
        }
    }
    public function rules()
    {
        $this->form_validation->set_rules('nama_kategori', 'kategori', 'required');
    }
}
