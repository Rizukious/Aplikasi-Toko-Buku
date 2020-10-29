<?php

class Invoice extends CI_Controller
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
    $data['title']  = 'Admin | Data Invoice';
    $data['judul'] = 'Data Invoice';
    $data['title_card'] = 'DataTable Invoice Pemesanan Buku';
    //Load ke model_barang
    $data['invoice'] = $this->model_invoice->tampil_data();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/invoice', $data);
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

  //Pembuatan function detail keranjang
  public function detail_inv($id)
  {
    $data['title']  = 'User | Detail Poin';
    $data['title_card'] = 'Detail Transaksi Anda';
    $data['transaksi'] = $this->model_invoice->tampil_data_transaksi();
    $data['det_trans'] = $this->model_invoice->tampil_data_det_transaksi($id);
    //Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method edit
  public function edit($id)
  {
    $data['title']  = 'Admin | Edit Invoice';
    $data['judul'] = 'Edit Invoice';
    $data['title_card'] = 'Edit Invoice Pemesanan';
    $where = array('id' => $id);
    $data['invoice'] = $this->model_invoice->edit_invoice($where, 'tb_invoice')->result();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_invoice', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method Update
  public function update()
  {
    $id      = $this->input->post('id');
    $nama    = $this->input->post('nama');
    $alamat  = $this->input->post('alamat');
    $tgl_p   = $this->input->post('tgl_pesan');
    $bb      = $this->input->post('batas_bayar');
    $p       = $this->input->post('points');

    $data = array(
      'nama'        => $nama,
      'alamat'      => $alamat,
      'tgl_pesan'   => $tgl_p,
      'batas_bayar' => $bb,
      'points'      => $p
    );
    $where = array(
      'id' => $id
    );
    $this->model_invoice->update_invoice($where, $data, 'tb_invoice');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Invoice Berhasil di Ubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/invoice/');
  }

  //Pembuatan Function Hapus
  public function hapus($id)
  {
    $where = array('id' => $id);
    $this->model_invoice->hapus_invoice($where, 'tb_invoice');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Invoice Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/invoice/');
  }
}
