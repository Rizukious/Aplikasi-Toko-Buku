<?php

class Dashboard extends CI_Controller
{

    // pembuaatn function construct
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Maaf, Anda harus login terlebih dahulu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    //Function Tambah ke Keranjang
    public function tambah_ke_keranjang($id)
    {
        $buku = $this->model_buku->find($id);
        $data = array(
            'id'      => $buku->id_buku,
            'qty'     => 1,
            'price'   => $buku->harga,
            'name'    => $buku->judul_buku
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('pesan', '<script>
        Swal.fire({
            icon: "success",
            title: "Buku berhasil ditambahkan",
            showConfirmButton: false,
            timer: 1500
          })
        </script>');
        redirect('welcome');
    }

    //Pembuatan function detail keranjang
    public function detail_keranjang()
    {
        $data['title']  = 'User | Detail Keranjang';
        $data['title_card'] = 'Detail Keranjang Anda';
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang', $data);
        $this->load->view('templates/footer');
    }

    //Pembuatan function hapus keranjang
    public function hapus_keranjang()
    {
        //Fungsi untuk menghapus semua isi di keranjang
        $this->cart->destroy();
        $this->session->set_flashdata('pesan', '<script>
        Swal.fire({
            icon: "success",
            title: "Hapus!",
            text : "Buku berhasil dihapus dari Keranjang.",
          })
        </script>');

        redirect('dashboard/detail_keranjang');
    }

    //Pembuatan function pembayaran
    public function pembayaran()
    {
        $data['title']  = 'User | Form Transaksi';
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    //Pembuatan function Proses pemesanan
    public function proses_pesanan()
    {
        // Validasi form pengiriman dan pembayaran
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Lengkap Wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Lengkap Wajib diisi!'
        ]);
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required', [
            'required' => 'No. Telepon Wajib diisi!'
        ]);
        $this->form_validation->set_rules('jasa_kirim', 'Jasa Kirim', 'required', [
            'required' => 'Jasa Pengiriman Wajib diisi!'
        ]);
        $this->form_validation->set_rules('bank', 'Bank', 'required', [
            'required' => 'Bank Wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            //load ke form pembayaran
            $data['title']  = 'User | Form Transaksi';
            //Template
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran');
            $this->load->view('templates/footer');
        } else {
            $is_processed =  $this->model_invoice->index();

            if ($is_processed) {
                //Jika memesan, hapus keranjang
                $this->cart->destroy();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pesanan berhasil di simpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pembayaran');
            } else {
                echo "Maaf, Pesanan Anda Gagal diProses!!";
            }
        }
    }

    //Pembuatan function Proses pemesanan
    public function proses_pesanan_reward()
    {
        $data['pesanan_reward'] = $this->model_invoice->pesanan_reward();
        //Template
        $data['title']  = 'User | Proses Pesanan Reward';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pesanan', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan function detail buku
    public function detail($id_buku)
    {
        $data['title']  = 'User | Detail Buku';
        $data['title_card'] = 'Detail Buku';
        $data['buku'] = $this->model_buku->detail_buku($id_buku);
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail_buku', $data);
        $this->load->view('templates/footer');
    }

    //Pembuatan function detail keranjang
    public function detail_poin()
    {
        $data['title']  = 'User | Detail Poin';
        $data['title_card'] = 'Detail Point dan Transaksi';
        $data['invoice'] = $this->model_invoice->tampil_data_poin();
        $data['transaksi'] = $this->model_invoice->tampil_data_transaksi();
        $data['det_trans'] = $this->model_invoice->tampil_data_det_trans();
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail_poin', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan Function detail
    public function detail_hadiah($id_hadiah)
    {
        $data['title']  = 'Admin | Detail hadiah';
        $data['title_card'] = 'Detail hadiah';
        $data['hadiah'] = $this->model_hadiah->detail_hadiah($id_hadiah);
        $data['tampil_hadiah'] = $this->model_hadiah->tampil_data_id($id_hadiah);
        $data['tampil_invoice'] = $this->model_invoice->tampil_data_transaksi();
        //Template
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail_hadiah', $data);
        $this->load->view('templates/footer');
    }
}
