<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
        $this->load->model('m_user');
        $this->load->model('m_appointment');
        $this->load->model('m_pasien');
        $this->load->model('m_tagihan');

        // Pengecekan user sudah login atau belum
        if (!$_SESSION['email']) {
            // jika belum maka login dulu
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['jumlah'] = $this->m_dashboard->hitung_total();
        $data['pasien'] = $this->m_pasien->pasienTerbaru();
        $this->load->view('dashboard', $data);
    }

    public function chartappointment()
    {
        $res = $this->m_appointment->chart();
        if ($res) {
            echo json_encode($res);
        } else {
            echo json_encode(array('status' => 1));
        }
    }

    public function charttagihan()
    {
        $res = $this->m_tagihan->chart();
        if ($res) {
            echo json_encode($res);
        } else {
            echo json_encode(array('status' => 1));
        }
    }
}
