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
}
