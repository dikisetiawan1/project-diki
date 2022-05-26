<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Data barang";
        $this->load->model('inventoriModel');
        $data['barang'] = $this->db->query("SELECT tbl_data_barang.id_barang,tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori        
        FROM tbl_data_barang
        
        INNER JOIN tbl_kategori ON tbl_data_barang.id_kategori=tbl_kategori.id_kategori
        
        ")->result();

        $this->load->model('inventoriModel');
        $data['supplier'] = $this->inventoriModel->get_data('tbl_supplier')->result();
        $data['kategori'] = $this->inventoriModel->get_data('tbl_kategori  ')->result();

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
            $hrg_brg = $this->input->post('hrg_brg');




            $data = array(
                'id_barang' => $id_barang,
                'nama_brg' => $nama_brg,
                'id_kategori' => $id_kategori,
                'hrg_brg' => $hrg_brg,





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
        $data['barang'] = $this->db->query("SELECT tbl_data_barang.id_barang,tbl_data_barang.stok_brg, tbl_data_barang.nama_brg,tbl_data_barang.hrg_brg,tbl_kategori.nama_kategori

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
            $hrg_brg = $this->input->post('hrg_brg');




            $data = array(

                'nama_brg' => $nama_brg,
                'id_kategori' => $id_kategori,
                'hrg_brg' => $hrg_brg,


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
        $this->form_validation->set_rules('hrg_brg', 'harga barang', 'required');
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
        redirect('admin/dataJabatan');
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
