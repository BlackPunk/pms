<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pasien');
        $this->load->model('m_tagihan');
        $this->load->model('m_user');


        // Pengecekan user sudah login atau belum
        if (!$_SESSION['email']) {
            // jika belum maka login dulu
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Tagihan';
        $data['tagihan'] = $this->m_tagihan->getTagihan();
        // die(var_dump($data['tagihan']));
        $this->load->view('tagihan', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah tagihan';
        $data['pasien'] = $this->m_pasien->getPasien();
        $this->load->view('tambahtagihan', $data);
    }

    public function baru()
    {

        $this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
        $this->form_validation->set_rules('mode_pembayaran', 'Mode pembayaran', 'required');
        $this->form_validation->set_rules('status_pembayaran', 'Status pembayaran', 'required');
        $this->form_validation->set_rules('deskripsi_invoice[]', 'Deskripsi invoice', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('jumlah_invoice[]', 'Jumlah', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $error['id_pasien'] = form_error('id_pasien');
            $error['mode_pembayaran'] = form_error('mode_pembayaran');
            $error['status_pembayaran'] = form_error('status_pembayaran');
            $error['deskripsi_invoice'] = form_error('deskripsi_invoice[]');
            $error['jumlah_invoice'] = form_error('jumlah_invoice[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . 'tagihan/tambah');
        } else {
            $data['id_pasien'] = $this->input->post('id_pasien');
            $data['mode_pembayaran'] = $this->input->post('mode_pembayaran');
            $data['status_pembayaran'] = $this->input->post('status_pembayaran');
            $data['deskripsi_tagihan'] = json_encode($this->input->post('deskripsi_invoice[]'));
            $data['jumlah_tagihan'] = json_encode($this->input->post('jumlah_invoice[]'));
            $data['tanggal_invoice'] = date('Y-m-d');

            if ($this->m_tagihan->tambahTagihan($data)) {
                $res = $this->db->query('select max(id_tagihan) as id from tagihan')->result_array();
                redirect(base_url('tagihan/cetak/') . $res[0]['id']);
            } else {
                echo 'alert("Terjadi kesalahan di database")';
            }
        }
    }

    public function hapus($id)
    {
        if ($this->m_tagihan->hapusTagihan($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 text-center" role="alert">
            Invoice berhasil di hapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('tagihan');
        }
    }

    public function cetak($id)
    {
        $data['title'] = 'Cetak';
        $data['user'] = $this->m_user->getUser()[0];
        $data['tagihan'] = $this->m_tagihan->getTagihanbyid($id);
        $this->load->view('cetaktagihan', $data);
    }
}
