<?php

class Model_invoice extends CI_Model
{
    //Pembuatan function index
    public function index()
    {
        //setting waktu setempat
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $notel = $this->input->post('no_telp');
        $jk = $this->input->post('jasa_kirim');
        $bank = $this->input->post('bank');
        $invoice = array(
            'id_user'   => $id,
            'nama'      => $nama,
            'alamat'    => $alamat,
            'no_telp'   => $notel,
            'jasa_kirim' => $jk,
            'bank'      => $bank,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            //batas bayar 1 hari setelah pemesanan
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            'points'    => 5,
        );
        //input ke table invoice
        $this->db->insert('tb_invoice', $invoice);

        $id_invoice = $this->db->insert_id();

        //Memasukkan juga ke table pemesanan
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_invoice'    => $id_invoice,
                'id_buku'       => $items['id'],
                'judul_buku'    => $items['name'],
                'jumlah'        => $items['qty'],
                'harga'         => $items['price'],
            );
            //Masukkan ke table Pemesanan
            $this->db->insert('tb_pesanan', $data);
        }
        return true;
    }

    //Pembuatan function index
    public function pesanan_reward()
    {
        //setting waktu setempat
        date_default_timezone_set('Asia/Jakarta');
        $id_hadiah = $this->input->post('id_hadiah');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');
        $reward = array(
            'id_hadiah'   => $id_hadiah,
            'nama'      => $nama,
            'alamat'    => $alamat,
            'jumlah'    => $jumlah,
            'keterangan' => $ket,
            'tgl_pesan' => date('Y-m-d H:i:s'),
        );
        //input ke table pesan reward
        $this->db->insert('tb_pesan_reward', $reward);
    }

    //Pembuatan function tampil data
    public function tampil_data()
    {
        $result = $this->db->query("SELECT *
        FROM tb_invoice ORDER BY id DESC");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    //Pembuatan function tampil data
    public function tampil_data_poin()
    {
        $id_user = $this->session->userdata('id');
        $result = $this->db->query("SELECT a.*
        FROM tb_invoice a
        WHERE a.id_user = $id_user");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_data_transaksi()
    {
        $id_user = $this->session->userdata('id');
        $result = $this->db->query("SELECT COUNT(a.id) AS total_id_invoice, a.nama, a.alamat, COUNT(a.tgl_pesan) AS total_tanggal_pesan, COUNT(b.judul_buku) AS total_buku_dipesan, SUM(a.points) AS total_poin
        FROM tb_invoice a
        JOIN tb_pesanan b ON a.id = b.id_invoice
        JOIN tb_user c ON a.id_user = c.id
        WHERE a.id_user = $id_user");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_data_det_trans()
    {
        $id_user = $this->session->userdata('id');
        $result = $this->db->query("SELECT a.id, a.nama, a.tgl_pesan, b.judul_buku, a.points
        FROM tb_invoice a
        JOIN tb_pesanan b ON a.id = b.id_invoice
        JOIN tb_user c ON a.id_user = c.id
        WHERE a.id_user = $id_user");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_data_det_transaksi($id)
    {
        $result = $this->db->query("SELECT a.id, a.nama, a.tgl_pesan, b.judul_buku, a.points
        FROM tb_invoice a
        JOIN tb_pesanan b ON a.id = b.id_invoice
        JOIN tb_user c ON a.id_user = c.id
        WHERE a.id = $id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    // Pembuatan function ambil id invoice
    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    // Pembuatan function ambil id pesanan
    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    //Pembuatan method tambah barang
    public function tambah_buku($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Pembuatan Method Edit invoice
    public function edit_invoice($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Pembuatan Function update pesanan
    public function update_invoice($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Pembuatan Function hapus pesanan
    public function hapus_invoice($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Pembuatan Function find
    public function find($id)
    {
        $result = $this->db->where('id_buku', $id)
            ->limit(1)
            ->get('tb_buku');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    // Pembuatan function detail buku
    public function detail_buku($id_buku)
    {
        $result = $this->db->where('id_buku', $id_buku)->get('tb_buku');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
