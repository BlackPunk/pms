<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tagihan extends CI_Model
{
    public function tambahTagihan($data)
    {
        $this->db->insert('tagihan', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getTagihan()
    {
        $res = $this->db->query('select id_tagihan, nama_p, status_pembayaran, jumlah_tagihan, DATE_FORMAT(tagihan.tanggal_invoice, "%d %M,%Y") as tanggal from pasien,tagihan where pasien.id_pasien = tagihan.id_pasien');
        return $res->result_array();
    }
    public function getTagihanbyid($id)
    {
        $res = $this->db->select('nama_p,alamat,no_hp,tagihan.*')
            ->from('tagihan')
            ->join('pasien', 'tagihan.id_pasien=pasien.id_pasien')
            ->where('id_tagihan', $id)
            ->get();
        return $res->row_array();
    }
    public function hapusTagihan($id)
    {
        $this->db->delete('tagihan', ['id_tagihan' => $id]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function chart()
    {
        $res = $this->db->query("select status_pembayaran as status, count(*) as total from tagihan group by status");
        return $res->result_array();
    }
    public function getTagihanByPasien($id)
    {
        $res = $this->db->get_where('tagihan', ['id_pasien' => $id]);
        return $res->result_array();
    }
}
