<?php

use LDAP\Result;

class InventoriModel extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function get_datasum()
    {
        return $this->db->query("SELECT sum(stok_masuk) AS total_stok, sum(hrg_barang) AS total_harga FROM tbl_barang_masuk");
    }
    public function get_datasum2()
    {
        return $this->db->query("SELECT sum(stok_keluar) AS total_stok, sum(harga_brg) AS total_harga FROM tbl_barang_keluar");
    }

    //filter laporan barang masuk
    public function filter_bytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT tbl_barang_masuk.id_brgMasuk, tbl_barang_masuk.tgl_masuk,tbl_barang_masuk.stok_masuk,tbl_barang_masuk.hrg_barang,tbl_data_barang.nama_brg,tbl_supplier.nama_supplier
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang
        INNER JOIN tbl_supplier ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier

        WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk DESC
        
        ");

        return $query->result();
    }
    public function sum_stok_keluar($tanggalawal, $tanggalakhir)
    {
        return $this->db->query("SELECT sum(stok_keluar) AS total_stok FROM tbl_barang_keluar WHERE tanggal_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ")->result();
    }

    //filter laporan barang keluar
    public function filter_bytanggal2($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang 

        WHERE tanggal_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_keluar DESC
        
        ");

        return $query->result();
    }

    //data supplier
    public function get_sup($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_supplier', $keyword);
        }

        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_supplier', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllsupplier()
    {
        return $this->db->get('tbl_supplier')->num_rows();
    }

    //data barang 
    public function get_brg($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
        }

        $this->db->select('id_barang,stok_brg, nama_brg,hrg_brg,nama_kategori,satuan');
        $this->db->from('tbl_data_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_data_barang.id_kategori');
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_brg', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllbrg()
    {
        return $this->db->get('tbl_data_barang')->num_rows();
    }

    //kategori barang
    public function get_kat($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_kategori', $keyword);
        }

        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_kategori', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllkat()
    {
        return $this->db->get('tbl_kategori')->num_rows();
    }

    //transaksi barang masuk
    public function get_brgmsk($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
        }

        $this->db->select('id_brgMasuk,tgl_masuk,stok_masuk,hrg_barang,nama_brg,nama_supplier');
        $this->db->from('tbl_barang_masuk');
        $this->db->join('tbl_data_barang', 'tbl_data_barang.id_barang=tbl_barang_masuk.id_barang');
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_barang_masuk.id_supplier');
        $this->db->limit($limit, $start);
        $this->db->order_by('tgl_masuk', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllbrgmsk()
    {
        return $this->db->get('tbl_barang_masuk')->num_rows();
    }

    //transaksi barang keluar

    public function get_brgklr($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
        }

        $this->db->select('id_brgKeluar,nama_brg,tanggal_keluar,cabang,unit,stok_keluar,harga_brg');
        $this->db->from('tbl_barang_keluar');
        $this->db->join('tbl_data_barang', 'tbl_data_barang.id_barang=tbl_barang_keluar.id_barang');
        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal_keluar', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllbrgklr()
    {
        return $this->db->get('tbl_barang_keluar')->num_rows();
    }
    public function get_brgkosong($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
        }

        $this->db->select('id_barang,stok_brg,nama_brg,hrg_brg,nama_kategori');
        $this->db->from('tbl_data_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_data_barang.id_kategori');
        $where = "stok_brg <= '0'";
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_brg', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllbrgkosong()
    {
        return $this->db->get('tbl_data_barang')->num_rows();
    }
    public function get_brgready($limit, $start, $keyword = null)
    {


        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
        }

        $this->db->select('id_barang,   stok_brg,nama_brg,hrg_brg,nama_kategori');
        $this->db->from('tbl_data_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_data_barang.id_kategori');
        $where = "stok_brg > '0'";
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_brg', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllbrgready()
    {
        return $this->db->get('tbl_data_barang')->num_rows();
    }
    // get users pagination
    public function get_user($limit, $start)
    {


        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit($limit, $start);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAlluser()
    {
        return $this->db->get('user')->num_rows();
    }



    // login
    public function cek_login()
    {
        $username = set_Value('username');
        $password = set_Value('password');
        $hak_akses = set_Value('hak_akses');

        $result = $this->db->where('username', $username)
            ->where('hak_akses',$hak_akses)
            ->where('password', md5($password))
            ->limit(1)
            ->get('user');

        if ($result->num_rows() > 0) {
            return $result->row();

        
        } else {
            return FALSE;
        }
    }
}
