<?php

class Auth extends CI_Controller
{
    // Pembuatan Function login
    public function login()
    {
        // membuat validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            // load ke Form Login
            $data['title']  = 'Form Login';
            $this->load->view('templates/header', $data);
            $this->load->view('form_login');
            // $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                // Jika salah, tampilkan alert
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password yang Anda masukkan salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                // dan kembalikan ke form login
                redirect('auth/login');
            } else {
                // Jika berhasil login
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('id', $auth->id);
                $this->session->set_userdata('nama', $auth->nama);

                // Pemilihan role id
                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    // Pembuatan function logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
