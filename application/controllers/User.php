<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // inisialisasi model
        $this->load->model('m_user');

        // Get data user di database
        $user = $this->m_user->getUser();

        if ($user && !$this->session->userdata('email')) {
            // kalo data user sudah ada di database tapi user belum login maka user harus login dulu
            redirect('auth');
        }
    }

    public function index()
    {

        $data['title'] = 'Profile';

        // get data dokter (user) berdasarkan email yang terdapat di session
        $data['dokter'] = $this->m_user->getemail($this->session->userdata('email'))[0];
        $this->load->view('profile', $data);
    }
    public function updateprofil()
    {
        // variable $data ini menampung data yang dikirimkan oleh form pada saat mengubah data di halaman profil user
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('nohp'),
            'id' => $this->session->userdata('id_user')
        ];
        // Mengupdate data user sesuai data yang dikirim
        $this->m_user->updateprofil($data);
        // Menampilkan pesan sukses 
        $this->session->set_flashdata('profil', '<div class="alert alert-success text-center" role="alert">Update profil berhasil.</div>');
        redirect('user');
    }
    public function updatepassword()
    {
        // variable-variable ini menampung data password yang dikirimkan oleh form pada saat mengubah password di halaman profil user
        $pass_lama = $this->input->post('pass_lama');
        $pass_baru = $this->input->post('pass_baru');
        $pass_baru2 = $this->input->post('pass_baru2');

        // Mengambil data password user berdasarkan email user yang telah login saat ini
        $pass = $this->m_user->getemail($this->session->userdata('email'))[0]['password'];

        // Pengecekan password user saat ini dengan password yang diinput user
        if ($pass_lama == $pass) {
            // jika benar
            if ($pass_baru == $pass_baru2) {
                $data = [
                    'password' => $this->input->post('pass_baru'),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->m_user->updatepass($data);
                $this->session->set_flashdata('password', '<div class="alert alert-success text-center" role="alert">Update password berhasil.</div>');
                redirect('user');
            } else {
                $this->session->set_flashdata('password', '<div class="alert alert-danger text-center" role="alert">Password baru tidak cocok</div>');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('password', '<div class="alert alert-danger text-center" role="alert">Password salah!</div>');
            redirect('user');
        }
    }
    public function setup()
    {
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'No. Hp', 'trim|required|numeric');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]', [
            'matches' => "Konfirmasi password tidak sama!"
        ]);
        $this->form_validation->set_rules('cpassword', 'Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Setup';
            $this->load->view('setup', $data);
        } else {
            $nama = $this->input->post('nama_dokter');
            $email = $this->input->post('email');
            $nohp = $this->input->post('phone');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = [
                'username' => htmlspecialchars($username),
                'nama' => htmlspecialchars($nama),
                'email' => htmlspecialchars($email),
                'no_hp' => $nohp,
                'password' => $password
            ];
            $this->m_user->setUser($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Setup akun berhasil. Silahkan login untuk melanjutkan</div>');

            redirect('auth');
        }
    }
}
