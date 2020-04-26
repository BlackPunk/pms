<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // inisialisasi model
        $this->load->model('m_appointment');
        $this->load->model('m_user');
        $this->load->model('m_pasien');

        // Pengecekan user sudah login atau belum
        if (!$_SESSION['email']) {
            // jika belum maka login dulu
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Appointment';
        $data['pasien'] = $this->m_pasien->getPasien();
        $data['ap_list'] = $this->m_appointment->appointment_list();
        $this->load->view('appointment', $data);
    }

    public function getJadwal()
    {
        $data_event = $this->m_appointment->getAllEvents();
        foreach ($data_event as $row) {
            $data[] = array(
                'id' => $row['id_appointment'],
                'title' => $this->m_pasien->getPasienId($row['id_pasien'])['nama_p'],
                'start' => $row['tanggal'] . "T" . $row['jam']
            );
        }
        die(json_encode($data));
    }

    public function getJadwalTgl()
    {
        $tgl = $this->input->post('tgk');

        $events = $this->m_appointment->getEvent($tgl);
        if ($events) {
            echo json_encode($events);
        } else {
            echo json_encode(array('status' => 1));
        }
    }

    public function tambah()
    {
        $data = [
            'id_pasien' => $this->input->post('p_id'),
            'tanggal' => $this->input->post('date'),
            'jam' => $this->input->post('time')
        ];
        if ($data['id_pasien'] == '0' or $data['tanggal'] == '') {
            echo json_encode(array('status' => 3));
        } else {
            $cek = $this->m_appointment->setAppointment($data);
            if ($cek == 1) {
                echo json_encode(array('status' => 1));
            } elseif ($cek == 2) {
                echo json_encode(array('status' => 2));
            } else {
                echo json_encode(array('status' => 0));
            }
        }
    }

    public function hapus($id)
    {
        $this->m_appointment->hapusAppointment($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 text-center" role="alert">
            Jadwal appointment berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
