<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksibarangkeluar extends CI_Controller
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
        $data['title'] = "Transaksi Barang keluar";
        $this->load->model('inventoriModel');
        $this->load->library('pagination');

        // config
        $this->load->model('inventoriModel');
        $config['base_url'] = 'http://localhost/projectSkripsi/admin/transaksibarangkeluar/index';
        $config['total_rows'] = $this->inventoriModel->countAllbrgklr();
        $config['per_page'] = 5;
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
        $data['barangkeluar'] = $this->inventoriModel->get_brgklr($config['per_page'], $data['start']);


        $data['masterbarang'] = $this->db->query("SELECT * FROM tbl_data_barang WHERE stok_brg > 0")->result();

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
    public function cetakData()
    {
        $data['title'] = "Transaksi Barang keluar";
        $this->load->model('inventoriModel');
        $data['barangkeluar'] = $this->db->query("SELECT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang
      
        ")->result();

        $this->load->model('inventoriModel');
        $data['stoksum'] = $this->inventoriModel->get_datasum()->result();
        $this->load->model('inventoriModel');
        $this->load->view('templates_admin/header');

        $this->load->view('admin/cetakBarangKeluar', $data);
    }
}
