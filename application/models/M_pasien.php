<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
{
    public function getPasien()
    {
        $res = $this->db->select('*')
            ->from('pasien')
            ->get()->result_array();
        return $res;
    }
    public function addpasien($data)
    {
        $this->db->insert('pasien', $data);
    }
    public function hapuspasien($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }
    public function updatepasien($data, $id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data);
    }
    public function getPasienId($id)
    {
        $pasien = $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
        return $pasien;
    }
    public function pasienTerbaru()
    {
        $data = $this->db->query("select * from pasien order by id_pasien DESC limit 5");
        return $data->result_array();
    }
}
