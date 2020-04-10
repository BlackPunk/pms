<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // inisialisasi model
        $this->load->model('m_user');
    }

    public function index()
    {
        // melakukan migrasi database
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }

        $data['title'] = 'Sistem manajemen pasien';
        $this->load->view('template/header', $data);
        $this->load->view('login', $data);
        $this->load->view('template/footer');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // pengecekan data login
        $user = $this->m_user->get_user($username, $password);
        if (count($user) > 0) {
            die("Sukses");
        } else {
            $this->session->set_flashdata('pesan', 'Username/Password salah !');
            redirect(base_url());
        }
    }
}
