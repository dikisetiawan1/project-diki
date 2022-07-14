<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ubahPassword extends CI_Controller
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
        $data['title'] = "Ubah Password";


        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/ubahPassword', $data);
        $this->load->view('templates_manajer/footer');
    }
    public function ubahpasswordAksi()
    {
        $new_password1 = $this->input->post('new_password1');
        $new_password2 = $this->input->post('new_password2');


        $this->form_validation->set_rules('new_password1', 'New password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New password', 'required|trim');


        if ($this->form_validation->run() != False) {
            $data = array('password' => md5($new_password1));
            $id = array('id' => $this->session->userdata('id'));
            $this->load->model('inventoriModel');
            $this->inventoriModel->update_data('user', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong>Password berhasil di ubah!
          </div>');
            redirect('manajer/ubahpassword');
        } else {
            $data['title'] = "Ubah Password";


            $this->load->view('templates_manajer/header');
            $this->load->view('templates_manajer/sidebar');
            $this->load->view('templates_manajer/topbar');
            $this->load->view('manajer/ubahPassword', $data);
            $this->load->view('templates_manajer/footer');
        }
    }
}
