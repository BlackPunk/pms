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
    public function login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        // pengecekan data login
        if ($this->m_user->dataLogin($user, $pass)) {
            die("Sukses");
        } else {
            $this->session->set_flashdata('pesan', 'Username/Password salah !');
            redirect(base_url());
        }
    }
}
