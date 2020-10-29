<?php

class Model_user extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_user WHERE role_id = 2 ORDER BY id DESC");
        return $query->result();
    }

    //Pembuatan method tambah barang
    public function tambah_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit Barang
    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update Barang
    public function update_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus barang
    public function hapus_user($where, $table)
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

    // Pembuatan function detail user
    public function detail_user($id)
    {
        $result = $this->db->where('id', $id)->get('tb_user');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
