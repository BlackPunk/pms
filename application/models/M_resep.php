<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_resep extends CI_Model
{
    public function getResep()
    {
        $res = $this->db->query('select id_resep, nama_p, DATE_FORMAT(resep.tanggal, "%d %M,%Y") as tanggal from pasien,resep where pasien.id_pasien = resep.id_pasien');
        return $res->result_array();
    }
    public function tambahResep($data)
    {
        $this->db->insert('resep', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function hapusResep($id)
    {
        $this->db->delete('resep', ['id_resep' => $id]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getResepById($id)
    {
        $res = $this->db->select('nama_p,alamat,no_hp,resep.*')
            ->from('resep')
            ->join('pasien', 'resep.id_pasien=pasien.id_pasien')
            ->where('id_resep', $id)
            ->get();
        return $res->row_array();
    }
    public function getResepByPasien($id)
    {
        $res = $this->db->get_where('resep', ['id_pasien' => $id]);
        return $res->result_array();
    }
}
