<?php

class Data_pesanan extends CI_Controller
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

  public function index()
  {
    $data['title']  = 'Admin | Data Transaksi';
    $data['judul'] = 'Data Transaksi Pesanan';
    $data['title_card'] = 'DataTable Transaksi dari Pemesanan Buku';
    //Load ke model_barang
    $data['pesan'] = $this->model_pesanan->tampil_data();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_pesanan', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan method tambah_aksi
  public function tambah_aksi()
  {
    $judul_buku   = $this->input->post('judul_buku');
    $keterangan = $this->input->post('keterangan');
    $kategori   = $this->input->post('kategori');
    $harga      = $this->input->post('harga');
    $stok       = $this->input->post('stok');
    $gambar     = $_FILES['gambar']['name'];

    //Inisialisasi upload gambar
    if ($gambar = '') {
    } else {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->load->library('upload', $config);
      //Inisialisasi gagal upload
      if (!$this->upload->do_upload('gambar')) {
        echo "Gambar Gagal diUpload!";
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }
    //Pemasukan data ke array
    $data = array(
      'judul_buku'    => $judul_buku,
      'keterangan'    => $keterangan,
      'kategori'      => $kategori,
      'harga'         => $harga,
      'stok'          => $stok,
      'gambar'        => $gambar
    );

    $this->model_buku->tambah_buku($data, 'tb_buku');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Buku Berhasil di Tambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/data_buku/index');
  }

  // Pembuatan Function detail
  public function detail($id_buku)
  {
    $data['title']  = 'Admin | Detail Buku';
    $data['title_card'] = 'Detail Buku';
    $data['buku'] = $this->model_buku->detail_buku($id_buku);
    //Template
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/detail_buku', $data);
    $this->load->view('templates/footer');
  }

  //Pembuatan Method edit
  public function edit($id)
  {
    $data['title']  = 'Admin | Edit Transaksi';
    $data['judul'] = 'Edit Transaksi Pesanan';
    $data['title_card'] = 'Edit Pesanan';
    $where = array('id' => $id);
    $data['pesanan'] = $this->model_pesanan->edit_pesanan($where, 'tb_pesanan')->result();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_pesanan', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method Update
  public function update()
  {
    $id          = $this->input->post('id');
    $id_inv      = $this->input->post('id_invoice');
    $id_buku     = $this->input->post('id_buku');
    $judul_buku  = $this->input->post('judul_buku');
    $jumlah      = $this->input->post('jumlah');
    $harga       = $this->input->post('harga');

    $data = array(
      'id_invoice'  => $id_inv,
      'id_buku'     => $id_buku,
      'judul_buku'  => $judul_buku,
      'jumlah'      => $jumlah,
      'harga'       => $harga
    );
    $where = array(
      'id' => $id
    );
    $this->model_pesanan->update_pesanan($where, $data, 'tb_pesanan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pesanan Berhasil di Ubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/data_pesanan');
  }

  //Pembuatan Function Hapus
  public function hapus($id)
  {
    $where = array('id_invoice' => $id);
    $this->model_pesanan->hapus_pesanan($where, 'tb_pesanan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pesanan Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/data_pesanan/');
  }
}
