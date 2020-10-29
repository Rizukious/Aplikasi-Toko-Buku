<?php

class Model_pesanan extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_pesanan ORDER BY id DESC");
        return $query->result();
    }

    //Pembuatan method tambah barang
    public function tambah_buku($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit pesanan
    public function edit_pesanan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update pesanan
    public function update_pesanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus pesanan
    public function hapus_pesanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Pembuatan Function find
    public function find($id)
    {
        $result = $this->db->where('id_buku', $id)
            ->limit(1)
            ->get('tb_buku');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    // Pembuatan function detail buku
    public function detail_buku($id_buku)
    {
        $result = $this->db->where('id_buku', $id_buku)->get('tb_buku');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
