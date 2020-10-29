<?php

class Data_pesan_reward extends CI_Controller
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
        $data['title']  = 'Admin | Data Pesan Reward';
        $data['judul'] = 'Data Pesan Reward';
        $data['title_card'] = 'DataTable Pemesanan Reward Redeem Poin';
        //Load ke model_barang
        $data['pesan'] = $this->model_pesan_reward->tampil_data();
        //Pemanggilan Template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pesan_reward', $data);
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
    public function detail_pesanan($id)
    {
        $data['title']  = 'Admin | Detail Pesanan Reward';
        $data['title_card'] = 'Detail Pesanan Reward Anda';
        $data['pesan'] = $this->model_pesan_reward->detail_pesan_reward($id);
        //Template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_pesan_reward', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan Method edit
    public function edit($id)
    {
        $data['title']  = 'Admin | Edit Pesan Reward';
        $data['judul'] = 'Edit Pesan Reward';
        $data['title_card'] = 'Edit Pemesanan Reward';
        $where = array('id' => $id);
        $data['pesan'] = $this->model_pesan_reward->edit_pesan_reward($where, 'tb_pesan_reward')->result();
        //Pemanggilan Template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pesan_reward', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan Method Update
    public function update()
    {
        $id      = $this->input->post('id');
        $id_h    = $this->input->post('id_hadiah');
        $nama    = $this->input->post('nama');
        $alamat  = $this->input->post('alamat');
        $jumlah  = $this->input->post('jumlah');
        $tgl_p   = $this->input->post('tgl_pesan');

        $data = array(
            'id_hadiah'   => $id_h,
            'nama'        => $nama,
            'alamat'      => $alamat,
            'jumlah'      => $jumlah,
            'tgl_pesan'   => $tgl_p
        );
        $where = array(
            'id' => $id
        );
        $this->model_pesan_reward->update_pesan_reward($where, $data, 'tb_pesan_reward');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pesanan Reward Berhasil di Ubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_pesan_reward/');
    }

    //Pembuatan Function Hapus
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_pesan_reward->hapus_pesan_reward($where, 'tb_pesan_reward');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pesan Reward Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_pesan_reward/');
    }
}
