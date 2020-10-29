<?php

class Model_kategori extends CI_Model
{
    // Pembuatan function data pemrograman
    public function data_pemrograman()
    {
        return $this->db->get_where("tb_buku", array('kategori' => 'pemrograman'));
    }

    // Pembuatan function data novel
    public function data_novel()
    {
        return $this->db->get_where("tb_buku", array('kategori' => 'novel'));
    }

    // Pembuatan function data biografi
    public function data_biografi()
    {
        return $this->db->get_where("tb_buku", array('kategori' => 'biografi'));
    }

    // Pembuatan function data komik
    public function data_komik()
    {
        return $this->db->get_where("tb_buku", array('kategori' => 'komik'));
    }
}
