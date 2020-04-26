<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pasien');
        $this->load->model('m_resep');
        $this->load->model('m_user');

        // Pengecekan user sudah login atau belum
        if (!$_SESSION['email']) {
            // jika belum maka login dulu
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Resep';
        $data['resep'] = $this->m_resep->getResep();
        $this->load->view('resep', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
        $this->form_validation->set_rules('nama_obat[]', 'Nama obat', 'required');
        $this->form_validation->set_rules('catatan_obat[]', 'Catatan obat', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah presep';
            $data['pasien'] = $this->m_pasien->getPasien();
            $this->load->view('tambahresep', $data);
        } else {
            $data['id_pasien'] = $this->input->post('id_pasien');
            $data['gejala'] = $this->input->post('gejala');
            $data['diagnosa'] = $this->input->post('diagnosa');
            $data['obat'] = json_encode($this->input->post('nama_obat[]'));
            $data['catatan_obat'] = json_encode($this->input->post('catatan_obat[]'));
            $data['tanggal'] = date('Y-m-d');

            if ($this->m_resep->tambahResep($data)) {
                $res = $this->db->query('select max(id_resep) as id from resep')->result_array();
                redirect(base_url('resep/cetak/') . $res[0]['id']);
            } else {
            }
        }
    }
    public function cetak($id)
    {
        $data['title'] = 'Cetak';
        $data['user'] = $this->m_user->getUser()[0];
        $data['resep'] = $this->m_resep->getResepById($id);
        $this->load->view('cetakresep', $data);
    }
    public function hapus($id)
    {
        if ($this->m_resep->hapusResep($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 text-center" role="alert">
            Resep berhasil di hapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('resep');
        }
    }
}
