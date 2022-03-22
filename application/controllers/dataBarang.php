<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang extends CI_Controller
{


    public function barangmasuk()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('databarang/barangmasuk');
        $this->load->view('templates/footer');
    }
    public function barangkeluar()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('databarang/barangkeluar');
        $this->load->view('templates/footer');
    }
    public function stokbarang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('databarang/stokbarang');
        $this->load->view('templates/footer');
    }
}
