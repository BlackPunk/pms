<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_pasien');
        $this->load->model('m_appointment');
        $this->load->model('m_tagihan');
        $this->load->model('m_resep');

        // Pengecekan user sudah login atau belum
        if (!$_SESSION['email']) {
            // jika belum maka login dulu
            redirect('auth');
        }
    }
    public function index()
    {
        $data['pasien'] = $this->m_pasien->getPasien();
        $data['title'] = 'Pasien';
        $this->load->view('pasien', $data);
    }
    public function baru()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('usia', 'Usia', 'trim|required|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('phone', 'No. Hp', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi badan', 'trim|required|numeric');
        $this->form_validation->set_rules('berat', 'Berat badan', 'trim|required|numeric');
        $this->form_validation->set_rules('gol_darah', 'Golongan darah', 'trim|required');
        $this->form_validation->set_rules('tekanan_darah', 'Tekanan darah', 'trim|required|numeric');
        $this->form_validation->set_rules('detak_jantung', 'Detak jantung', 'trim|required|numeric');
        $this->form_validation->set_rules('pernapasan', 'Tingkat pernapasan', 'trim|required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah pasien';
            $this->load->view('tambahpasien', $data);
        } else {
            $data = [
                'nama_p' => $this->input->post('nama', true),
                'usia' => $this->input->post('usia'),
                'j_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat', true),
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'gol_darah' => $this->input->post('gol_darah'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'detak_jantung' => $this->input->post('detak_jantung'),
                'pernapasan' => $this->input->post('pernapasan'),
                'alergi' => $this->input->post('alergi'),
                'diet' => $this->input->post('diet')
            ];
            $this->m_pasien->addpasien($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 text-center" role="alert">
            Data pasien berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pasien');
        }
    }

    public function hapus($id)
    {
        $this->m_pasien->hapuspasien($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show col-3 text-center" role="alert">
            Data pasien berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('pasien');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('usia', 'Usia', 'trim|required|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('phone', 'No. Hp', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi badan', 'trim|required|numeric');
        $this->form_validation->set_rules('berat', 'Berat badan', 'trim|required|numeric');
        $this->form_validation->set_rules('gol_darah', 'Golongan darah', 'trim|required');
        $this->form_validation->set_rules('tekanan_darah', 'Tekanan darah', 'trim|required|numeric');
        $this->form_validation->set_rules('detak_jantung', 'Detak jantung', 'trim|required|numeric');
        $this->form_validation->set_rules('pernapasan', 'Tingkat pernapasan', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['pasien'] = $this->m_pasien->getPasienId($id);
            $data['title'] = 'Edit pasien';
            $this->load->view('editpasien', $data);
        } else {
            $data = [
                'nama_p' => $this->input->post('nama', true),
                'usia' => $this->input->post('usia'),
                'j_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat', true),
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'gol_darah' => $this->input->post('gol_darah'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'detak_jantung' => $this->input->post('detak_jantung'),
                'pernapasan' => $this->input->post('pernapasan'),
                'alergi' => $this->input->post('alergi'),
                'diet' => $this->input->post('diet'),
            ];
            $this->m_pasien->updatepasien($data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 text-center" role="alert">
            Data pasien berhasil di update.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pasien/profil/' . $id);
        }
    }
    public function profil($id)
    {
        $data['resep'] = $this->m_resep->getResepByPasien($id);
        $data['tagihan'] = $this->m_tagihan->getTagihanByPasien($id);
        $data['pasien'] = $this->m_pasien->getPasienId($id);
        $data['appointment'] = $this->m_appointment->getAppointment($id);
        $data['title'] = 'Profil pasien';
        $this->load->view('profilpasien', $data);
    }
}
