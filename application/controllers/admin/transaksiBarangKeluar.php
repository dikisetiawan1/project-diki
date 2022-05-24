<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarangkeluar extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Transaksi Barang keluar";
        $this->load->model('inventoriModel');
        $data['barang'] = $this->db->query("SELECT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang
        
        
        
        ")->result();
        $this->load->model('inventoriModel');
        $data['masterbarang'] = $this->inventoriModel->get_data('tbl_data_barang')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/barangKeluar', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_barang = $this->input->post('id_barang');
            $cabang = $this->input->post('cabang');
            $tanggal_keluar = $this->input->post('tanggal_keluar');
            $unit = $this->input->post('unit');
            $stok_keluar = $this->input->post('stok_keluar');
            $harga_brg = $this->input->post('harga_brg');

            $data = array(
                'id_barang' => $id_barang,
                'cabang' => $cabang,
                'tanggal_keluar' => $tanggal_keluar,
                'unit' => $unit,
                'stok_keluar ' => $stok_keluar,
                'harga_brg' => $harga_brg
            );

            $this->load->model('inventoriModel');
            $this->inventoriModel->insert_data($data, 'tbl_barang_keluar');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check fa-2x"></i></strong> Transaksi barang sukses!
          </div>');
            redirect('admin/transaksibarangkeluar');
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('id_barang', 'nama barang', 'required');
        $this->form_validation->set_rules('cabang', 'sekber', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('stok_keluar', 'qty', 'required');
        $this->form_validation->set_rules('harga_brg', 'Harga', 'required');
    }
    public function deleteData($id)
    {
        $where = array('id_brgKeluar' => $id);
        $this->load->model('inventoriModel');
        $this->inventoriModel->delete_data($where, 'tbl_barang_keluar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Data berhasil di Hapus!
      </div>');
        redirect('admin/transaksibarangkeluar');
    }
}
