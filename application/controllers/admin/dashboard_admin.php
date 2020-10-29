<?php

class Dashboard_admin extends CI_Controller
{
  // pembuaatn function construct
  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('role_id') != '1') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Maaf, Anda harus login terlebih dahulu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('auth/login');
    }
  }

  // Pembuatan function index
  public function index()
  {
    $data['title']  = 'Admin | Dashboard';
    $data['judul'] = 'Dashboard';
    $data['title_card'] = 'Monitoring Semua data di Aplikasi Toko Buku';

    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates_admin/footer');
  }
}
