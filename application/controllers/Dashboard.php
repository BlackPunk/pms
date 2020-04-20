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
        $this->load->view('dashboard', $data);
    }

    public function resep()
    {
        $data['title'] = 'Resep - Sistem manajemen pasien';
        $this->load->view('resep', $data);
    }
    public function appointment()
    {
        $data['title'] = 'appointment';
        $this->load->view('appointment', $data);
    }


    public function pasien()
    {
        $data['title'] = 'Pasien - Sistem manajemen pasien';
        $this->load->view('pasien', $data);
    }
    public function tambahpasien()
    {
        $data['title'] = 'Tambah pasien - Sistem manajemen pasien';
        $this->load->view('tambahpasien', $data);
    }
    public function tambahresep()
    {
        $data['title'] = 'Tambah presep - Sistem manajemen pasien';
        $this->load->view('tambahresep', $data);
    }

}
