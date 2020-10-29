<?php

class Data_user extends CI_Controller
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
        //Load ke model_user
        $data['user'] = $this->model_user->tampil_data();
        $data['title']     = 'Admin | Data Users';
        $data['judul'] = 'Data Users';
        $data['title_card'] = 'DataTables Users yang terdaftar di Aplikasi Toko Buku';

        //Pemanggilan Template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan method tambah_aksi
    public function tambah_aksi()
    {
        $nama   = $this->input->post('nama');
        $user = $this->input->post('username');
        $pass   = $this->input->post('password');
        $role      = $this->input->post('role_id');

        //Pemasukan data ke array
        $data = array(
            'nama'      => $nama,
            'username'    => $user,
            'password'      => $pass,
            'role_id'         => $role
        );

        $this->model_user->tambah_user($data, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data User Berhasil di Tambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/data_user/index');
    }

    // Pembuatan Function detail
    public function detail($id)
    {
        $data['title']  = 'Admin | Detail User';
        $data['title_card'] = 'Detail User';
        $data['user'] = $this->model_user->detail_user($id);
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detail_user', $data);
        $this->load->view('templates/footer');
    }

    //Pembuatan Method edit
    public function edit($id)
    {
        $data['title']  = 'Admin | Edit User';
        $data['judul'] = 'Edit User';
        $data['title_card'] = 'Edit User';
        $where = array('id' => $id);
        $data['user'] = $this->model_user->edit_user($where, 'tb_user')->result();
        //Pemanggilan Template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates_admin/footer');
    }

    //Pembuatan Method Update
    public function update()
    {
        $id     = $this->input->post('id');
        $nama   = $this->input->post('nama');
        $user   = $this->input->post('username');
        $pass   = $this->input->post('password');
        $role   = $this->input->post('role_id');

        $data = array(
            'nama'     => $nama,
            'username' => $user,
            'password' => $pass,
            'role_id'     => $role,
        );
        $where = array(
            'id' => $id
        );
        $this->model_user->update_user($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data User Berhasil di Ubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_user/index');
    }

    //Pembuatan Function Hapus
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_user->hapus_user($where, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data User Berhasil di Hapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_user/index');
    }
}
