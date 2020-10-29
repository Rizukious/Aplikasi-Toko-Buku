<?php

class Model_barang extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        return $this->db->get('tb_barang');
    }

    //Pembuatan method tambah barang
    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit Barang
    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update Barang
    public function update_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus barang
    public function hapus_barang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Pembuatan Function find
    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    // Pembuatan function detail barang
    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
