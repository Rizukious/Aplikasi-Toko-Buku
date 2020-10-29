<?php

class Model_reward extends CI_Model
{
    public function tampil_data()
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_hadiah ORDER BY id_hadiah DESC");
        return $query->result();
    }

    public function tampil_data_sesuai_poin($id)
    {
        //Ambil data ke database
        $query = $this->db->query("SELECT * FROM tb_hadiah WHERE points <= $id ORDER BY id_hadiah DESC");
        return $query->result();
    }
}
