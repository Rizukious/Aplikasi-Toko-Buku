<?php

class Model_hadiah extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_hadiah ORDER BY id_hadiah DESC");
        return $query->result();
    }

    public function tampil_data_id($id_hadiah)
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_hadiah WHERE id_hadiah = $id_hadiah ORDER BY id_hadiah DESC");
        return $query->result();
    }

    //Pembuatan method tambah barang
    public function tambah_hadiah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit hadiah
    public function edit_hadiah($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update Barang
    public function update_hadiah($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus barang
    public function hapus_hadiah($where, $table)
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
    public function detail_hadiah($id_hadiah)
    {
        $result = $this->db->where('id_hadiah', $id_hadiah)->get('tb_hadiah');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
