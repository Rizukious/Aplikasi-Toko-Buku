<?php

class Kategori extends CI_Controller
{
    // Pembuatan Function Pemrograman
    public function pemrograman()
    {
        $data['title']  = 'Kategori | Pemrograman';
        $data['pemrograman'] = $this->model_kategori->data_pemrograman()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pemrograman', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan Function Novel
    public function novel()
    {
        $data['title']  = 'Kategori | Novel';
        $data['novel'] = $this->model_kategori->data_novel()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('novel', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan Function biografi
    public function biografi()
    {
        $data['title']  = 'Kategori | Biografi';
        $data['biografi'] = $this->model_kategori->data_biografi()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('biografi', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan Function komik
    public function komik()
    {
        $data['title']  = 'Kategori | Komik';
        $data['komik'] = $this->model_kategori->data_komik()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('komik', $data);
        $this->load->view('templates/footer');
    }
}
