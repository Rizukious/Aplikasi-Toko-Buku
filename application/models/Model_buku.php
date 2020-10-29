<?php

class Model_buku extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_buku ORDER BY id_buku DESC");
        return $query->result();
    }

    //Pembuatan method tambah barang
    public function tambah_buku($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit Barang
    public function edit_buku($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update Barang
    public function update_buku($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus barang
    public function hapus_buku($where, $table)
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
