<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard - Sistem manajemen pasien';
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
