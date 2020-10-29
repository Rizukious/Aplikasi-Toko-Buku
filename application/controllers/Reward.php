<?php

class Reward extends CI_Controller
{
    // Pembuatan Function Pemrograman
    public function redeem()
    {
        $data['title']  = 'Reward | Redeem Point';
        $data['reward'] = $this->model_reward->tampil_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('reward', $data);
        $this->load->view('templates/footer');
    }

    // Pembuatan Function poin kamu
    public function redeem_poinmu($id)
    {
        $data['title']  = 'Reward | Redeem Poinmu';
        $data['poinmu'] = $this->model_reward->tampil_data_sesuai_poin($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('reward_sesuai_poin', $data);
        $this->load->view('templates/footer');
    }
}
