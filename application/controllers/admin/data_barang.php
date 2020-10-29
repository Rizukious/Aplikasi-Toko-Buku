<?php

class Data_barang extends CI_Controller
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
        //Load ke model_barang
        $data['barang'] = $this->model_barang->tampil_data()->result();
        //Pemanggilan Template
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan method tambah_aksi
    public function tambah_aksi()
    {
        $nama_brg   = $this->input->post('nama_brg');
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
            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok,
            'gambar'        => $gambar
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    //Pembuatan Method edit
    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        //Pemanggilan Template
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan Method Update
    public function update()
    {
        $id         = $this->input->post('id_brg');
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'  => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );
        $where = array(
            'id_brg' => $id
        );
        $this->model_barang->update_barang($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    //Pembuatan Function Hapus
    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_barang($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}
