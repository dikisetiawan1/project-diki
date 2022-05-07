<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{



    public function index()
    {
        $data['title'] = "Data supplier";
        $this->load->model('inventoriModel');
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();
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

    public function rules()
    {
        $this->form_validation->set_rules('nama_supplier', 'nama supplier', 'required');
        $this->form_validation->set_rules('no_tlp', 'nomor telepone', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
    }
}