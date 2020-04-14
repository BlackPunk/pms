<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        $data['title'] = 'Dashboard - Sistem manajemen pasien';
        $data['jumlah'] = $this->m_dashboard->hitung_total();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
