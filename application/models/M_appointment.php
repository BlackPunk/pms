<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_appointment extends CI_Model
{

    public function getAllEvents()
    {
        $res = $this->db->select('*')
            ->from('appointment')
            ->get()->result_array();
        return $res;
    }

    public function getEvent($tgl)
    {
        $res = $this->db->select('nama_p, appointment.*')
            ->from('appointment')
            ->join('pasien', 'appointment.id_pasien=pasien.id_pasien')
            ->where('tanggal', $tgl)
            ->get();
        return $res->result_array();
    }

    public function appointment_list()
    {
        $res = $this->db->query("SELECT appointment.*, pasien.nama_p FROM appointment, pasien WHERE pasien.id_pasien = appointment.id_pasien AND tanggal = DATE_FORMAT(CURDATE(),'%Y-%m-%d')");
        return $res->result_array();
    }
    public function getAppointment($id)
    {
        $res = $this->db->get_where('appointment', ['id_pasien' => $id]);
        return $res->result_array();
    }
    public function setAppointment($data)
    {
        $res = $this->db->get_where('appointment', ['id_pasien' => $data['id_pasien'], 'tanggal' => $data['tanggal']]);
        if (count($res->result_array()) == 1) {
            return 1;
        } else {
            $res1 = $this->db->get_where('appointment', ['jam' => $data['jam'], 'tanggal' => $data['tanggal']]);
            if (count($res1->result_array()) == 1) {
                return 2;
            } else {
                $this->db->insert('appointment', $data);
            }
        }
    }

    public function hapusAppointment($id)
    {
        $this->db->where('id_appointment', $id);
        $this->db->delete('appointment');
    }

    public function chart()
    {
        $res = $this->db->query("SELECT MONTHNAME(appointment.tanggal) AS bulan, Month(appointment.tanggal) as no_bulan, count(*) AS total FROM appointment GROUP BY bulan ORDER BY no_bulan ASC");
        return $res->result_array();
    }
}
