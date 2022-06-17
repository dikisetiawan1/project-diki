<?php


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
        return $this->db->query("SELECT sum(stok_masuk) AS total_stok, sum(hrg_brg) AS total_harga FROM tbl_barang_masuk");
    }
    public function get_datasum2()
    {
        return $this->db->query("SELECT sum(stok_keluar) AS total_stok, sum(harga_brg) AS total_harga FROM tbl_barang_keluar");
    }


    public function filter_bytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT tbl_barang_masuk.id_brgMasuk, tbl_barang_masuk.tgl_masuk,tbl_barang_masuk.stok_masuk,tbl_barang_masuk.hrg_brg,tbl_data_barang.nama_brg,tbl_supplier.nama_supplier
        
        FROM tbl_barang_masuk

        INNER JOIN tbl_data_barang ON tbl_barang_masuk.id_barang=tbl_data_barang.id_barang
        INNER JOIN tbl_supplier ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier

        WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk DESC
        
        ");

        return $query->result();
    }
    public function filter_bytanggal2($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT tbl_barang_keluar.id_brgKeluar,tbl_data_barang.nama_brg,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.cabang,tbl_barang_keluar.unit,tbl_barang_keluar.stok_keluar,tbl_barang_keluar.harga_brg
        FROM tbl_barang_keluar
        INNER JOIN tbl_data_barang ON tbl_barang_keluar.id_barang = tbl_data_barang.id_barang 

        WHERE tanggal_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_keluar DESC
        
        ");

        return $query->result();
    }
}
