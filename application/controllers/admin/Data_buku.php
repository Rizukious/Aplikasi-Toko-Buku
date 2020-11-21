<?php

class Data_buku extends CI_Controller
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
    $data['title']  = 'Admin | Data Buku';
    $data['judul'] = 'Data Buku';
    $data['title_card'] = 'DataTable Buku di Aplikasi Toko Buku';
    //Load ke model_barang
    $data['buku'] = $this->model_buku->tampil_data();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_buku', $data);
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
    $this->session->set_flashdata('pesan', '<script>
    Swal.fire({
        icon: "success",
        title: "Berhasil!",
        text : "Data Buku berhasil ditambahkan."
      })
    </script>');
    redirect('admin/data_buku');
  }

  // Pembuatan Function detail
  public function detail($id_buku)
  {
    $data['title']  = 'Admin | Detail Buku';
    $data['title_card'] = 'Detail Buku';
    $data['buku'] = $this->model_buku->detail_buku($id_buku);
    //Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_buku', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method edit
  public function edit($id)
  {
    $data['title']  = 'Admin | Edit Buku';
    $data['judul'] = 'Edit Buku';
    $data['title_card'] = 'Edit Buku';
    $where = array('id_buku' => $id);
    $data['buku'] = $this->model_buku->edit_buku($where, 'tb_buku')->result();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_buku', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method Update
  public function update()
  {
    $id         = $this->input->post('id_buku');
    $judul_buku = $this->input->post('judul_buku');
    $keterangan = $this->input->post('keterangan');
    $kategori   = $this->input->post('kategori');
    $harga      = $this->input->post('harga');
    $stok       = $this->input->post('stok');

    $data = array(
      'judul_buku' => $judul_buku,
      'keterangan' => $keterangan,
      'kategori'  => $kategori,
      'harga' => $harga,
      'stok' => $stok
    );
    $where = array(
      'id_buku' => $id
    );
    $this->model_buku->update_buku($where, $data, 'tb_buku');
    $this->session->set_flashdata('pesan', '<script>
    Swal.fire({
        icon: "success",
        title: "Edit!",
        text : "Data Buku berhasil di Edit."
      })
    </script>');
    redirect('admin/data_buku');
  }

  //Pembuatan Function Hapus
  public function hapus($id)
  {
    $where = array('id_buku' => $id);
    $this->model_buku->hapus_buku($where, 'tb_buku');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Buku Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/data_buku/index');
  }
}
