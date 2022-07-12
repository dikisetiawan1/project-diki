<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{




    public function index()
    {



        $this->_rules();
        if ($this->form_validation->run() == FALSE) {

            $data['title'] = "Form Login";


            $this->load->view('Auth/login');
        } else {

            $data = array(

                $username = $this->input->post('username'),
                $password = $this->input->post('password'),
                $akses = $this->input->post('hak_akses')
            );
            $this->load->model('inventoriModel');
            $cek = $this->inventoriModel->cek_login($username, $password);


            if ($cek == FALSE) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Username atau Password salah!</strong> </div>');
                redirect('auth');
            } else {
                $this->session->set_userdata('hak_akses', $cek->hak_akses);
                $this->session->set_userdata('name', $cek->name);
                $this->session->set_userdata('image', $cek->image);
                $this->session->set_userdata('tgl_masuk', $cek->tgl_masuk);
                $this->session->set_userdata('jenis_kelamin', $cek->jenis_kelamin);

                switch ($cek->hak_akses) {

                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('manajer/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
