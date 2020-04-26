<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // inisialisasi model
        $this->load->model('m_user');

        // melakukan migrasi database (https://codeigniter.com/user_guide/dbmgmt/migration.html)
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }

        // Pengecekan user di database, kalo belum ada user maka akan redirect ke user/setup dulu
        $user = $this->m_user->getUser();
        if (!$user) {
            redirect('user/setup');
        }
    }

    public function index()
    {
        // Pengecekan session user, apakah sudah login atau belum
        if ($this->session->userdata('email')) {
            // jika sudah login akan redirect ke dashboard
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // pengecekan form_validation
        if ($this->form_validation->run() == FALSE) {
            // kalau form_validation belum jalan atau rules ada yang tidak terpenuhi maka akan load view login
            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            // kalo data form udah sesuai dengan rules yang di set di form_validation maka akan dialihkan ke function login
            $this->login();
        }
    }

    public function login()
    {
        // menyimpan data post yang dikirim pada login page
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];

        // get data user berdasarkan username dan password saat login
        $user = $this->m_user->get_user($data);

        // pengecekan data user
        if (count($user) > 0) {
            // jika ada maka akan set semua data user ke session dan redirect ke dashboard
            $this->session->set_userdata($user);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Username/Password salah!</div>');
            redirect(base_url());
        }
    }

    public function lupapassword()
    {
        // Pengecekan session user, apakah sudah login atau belum
        if ($this->session->userdata('email')) {
            // jika sudah login akan redirect ke dashboard
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        // pengecekan form_validation
        if ($this->form_validation->run() == FALSE) {
            // kalau form_validation belum jalan atau rules ada yang tidak terpenuhi maka akan load view lupapassword
            $data['title'] = 'Pulihkan password';
            $this->load->view('lupapassword', $data);
        } else {
            // form_validation sudah benar

            $email = $this->input->post('email');

            // Mengecek data user berdasarkan email
            $user = $this->m_user->getemail($email);
            if (count($user) == 1) {
                // Jika ada masuk sini
                $body = "<h2>Akun untuk login kedalam sistem PMS</h2>";
                $body .= "<p>Username : ";
                $body .= $user[0]['username'];
                $body .= "</p><p>Password : ";
                $body .= $user[0]['password'];
                $body .= "</p>";

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => "mail.blackpunk.id",
                    'smtp_port' => 465,
                    'smtp_user' => "support@blackpunk.id",
                    'smtp_pass' => "WpLur,0q3a&!",
                    'smtp_crypto' => 'ssl',
                    'mailtype' => 'html'
                );
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('support@blackpunk.id');
                $this->email->to($email);
                $this->email->subject('Pemulihan password PMS');
                $this->email->message($body);
                if (!$this->email->send()) {
                    show_error($this->email->print_debugger());
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Instruksi telah dikirim, Silahkan cek email anda</div>');
                    redirect('auth');
                }
            } else {
                // kalo gaada maka set_flashdata dengan pesan dibawah, dan kembali ke form lupa password
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Email tidak dapat ditemukan</div>');
                redirect('auth/lupapassword');
            }
        }
    }
    public function kunci()
    {
        // Pengecekan session user, apakah sudah login atau belum
        if (!$this->session->userdata('email')) {
            // kalo belum, maka redirect ke halaman login
            redirect('auth');
        }

        // di view kunci nanti session di destroy
        $data['username'] = $_SESSION['username'];
        $data['title'] = 'Locked';
        $this->load->view('kunci', $data);
    }

    public function logout()
    {
        // menghapus session yang telah diset saat login, dan meredirect ke base_url() (auth)
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning text-center" role="alert">Logout berhasil.</div>');
        redirect(base_url());
    }
}
