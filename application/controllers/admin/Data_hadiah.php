<?php

class Data_hadiah extends CI_Controller
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
    $data['title']  = 'Admin | Data Hadiah';
    $data['judul'] = 'Data Hadiah';
    $data['title_card'] = 'DataTable Hadiah untuk Redeem Points';
    //Load ke model_barang
    $data['hadiah'] = $this->model_hadiah->tampil_data();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_hadiah', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan method tambah_aksi
  public function tambah_aksi()
  {
    $nh     = $this->input->post('nama_hadiah');
    $rks    = $this->input->post('ringkasan');
    $desc   = $this->input->post('deskripsi');
    $poin   = $this->input->post('points');
    $stok   = $this->input->post('stok');
    $gambar = $_FILES['gambar']['name'];

    //Inisialisasi upload gambar
    if ($gambar = '') {
    } else {
      $config['upload_path'] = './uploads/hadiah/';
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
      'nama_hadiah'  => $nh,
      'ringkasan'    => $rks,
      'deskripsi'    => $desc,
      'points'       => $poin,
      'stok'         => $stok,
      'gambar'       => $gambar
    );

    $this->model_hadiah->tambah_hadiah($data, 'tb_hadiah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Hadiah Berhasil di Tambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/data_hadiah');
  }

  // Pembuatan Function detail
  public function detail($id_hadiah)
  {
    $data['title']  = 'Admin | Detail hadiah';
    $data['title_card'] = 'Detail hadiah';
    $data['hadiah'] = $this->model_hadiah->detail_hadiah($id_hadiah);
    //Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_hadiah', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method edit
  public function edit($id)
  {
    $data['title']  = 'Admin | Edit Hadiah';
    $data['judul'] = 'Edit Hadiah';
    $data['title_card'] = 'Edit Hadiah untuk Redeem Poin';
    $where = array('id_hadiah' => $id);
    $data['hadiah'] = $this->model_hadiah->edit_hadiah($where, 'tb_hadiah')->result();
    //Pemanggilan Template
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_hadiah', $data);
    $this->load->view('templates_admin/footer');
  }

  //Pembuatan Method Update
  public function update()
  {
    $id     = $this->input->post('id_hadiah');
    $nh     = $this->input->post('nama_hadiah');
    $r      = $this->input->post('ringkasan');
    $d      = $this->input->post('deskripsi');
    $p      = $this->input->post('points');
    $stok   = $this->input->post('stok');

    $data = array(
      'nama_hadiah' => $nh,
      'ringkasan'   => $r,
      'deskripsi'   => $d,
      'points'      => $p,
      'stok'        => $stok
    );
    $where = array(
      'id_hadiah' => $id
    );
    $this->model_hadiah->update_hadiah($where, $data, 'tb_hadiah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Hadiah Berhasil di Ubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/data_hadiah');
  }

  //Pembuatan Function Hapus
  public function hapus($id)
  {
    $where = array('id_hadiah' => $id);
    $this->model_hadiah->hapus_hadiah($where, 'tb_hadiah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Hadiah Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('admin/data_hadiah');
  }
}
