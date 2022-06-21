<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventoriModel');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Anda belum Login!</strong> </div>');
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Data Users";
        $this->load->library('pagination');

        // config

        $config['base_url'] = 'http://localhost/projectSkripsi/manajer/users/index';
        $config['total_rows'] = $this->inventoriModel->countAlluser();
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
        $data['query'] = $this->inventoriModel->get_user($config['per_page'], $data['start']);
        $data['hak_akses'] = $this->inventoriModel->get_data('hak_akses')->result();
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/users', $data);
        $this->load->view('templates_manajer/footer');
    }


    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $name = htmlspecialchars($this->input->post('name', true));
            $username = htmlspecialchars($this->input->post('username', true));
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tgl_masuk');
            $hak_akses = $this->input->post('hak_akses');
            $password = md5($this->input->post('password'));


            $upload_image = $_FILES['image']['name'];
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/photo/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_image' => $this->upload->data());
                $this->load->view('manajer/users');
            }



            $data = array(

                'name'               => $name,
                'username'            => $username,
                'jenis_kelamin'     => $jenis_kelamin,
                'tgl_masuk'     => $tanggal_masuk,
                'hak_akses'            => $hak_akses,
                'password'            => $password,
                'image'             => $upload_image,


            );
            $this->inventoriModel->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data berhasil di tambahkan!
          </div>');
            redirect('manajer/users');
        }
    }
    public function updateData($id)
    {
        $where = array('id' => $id);
        $this->load->model('inventoriModel');
        $data['users'] = $this->db->query("SELECT * FROM user WHERE id = '$id'")->result();
        $data['hak_akses'] = $this->inventoriModel->get_data('hak_akses')->result();
        $data['title'] = "Edit data users";
        $this->load->view('templates_manajer/header');
        $this->load->view('templates_manajer/sidebar');
        $this->load->view('templates_manajer/topbar');
        $this->load->view('manajer/updateDataUsers', $data);
        $this->load->view('templates_manajer/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tgl_masuk');
            $hak_akses = $this->input->post('hak_akses');
            $password = md5($this->input->post('password'));


            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/photo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $upload_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $data = array(

                'name'               => $name,
                'username'            => $username,
                'jenis_kelamin'     => $jenis_kelamin,
                'tgl_masuk'     => $tanggal_masuk,
                'hak_akses'            => $hak_akses,
                'password'            => $password,
                'image'             => $upload_image,


            );
            $where = array(
                'id' => $id
            );

            $this->inventoriModel->update_data('user', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data berhasil di ubah!
          </div>');
            redirect('manajer/users');
        }
    }
    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->inventoriModel->delete_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Data berhasil di Hapus!
      </div>');
        redirect('manajer/users');
    }



    public function _rules()
    {
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('username', 'Usernama', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak akses', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password harus mininmal 3!'
        ]);
    }
}
