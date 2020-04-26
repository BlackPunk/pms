<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function hitung_total()
    {
        $jum_appointment = $this->db->select('*')
            ->from('appointment')
            ->get()->result_array();
        $jum_pasien = $this->db->select('*')
            ->from('pasien')
            ->get()->result_array();
        $jum_invoice = $this->db->select('*')
            ->from('tagihan')
            ->get()->result_array();
        $jum_lunas = $this->db->select('*')
            ->from('tagihan')
            ->where('status_pembayaran', 'Lunas')
            ->get()->result_array();
        $pendapatan = 0;
        for ($i = 0; $i < count($jum_lunas); $i++) :
            $amount = json_decode($jum_lunas[$i]['jumlah_tagihan']);
            $pendapatan += array_sum($amount);
        endfor;
        return ['appointment' => count($jum_appointment), 'pasien' => count($jum_pasien), 'tagihan' => count($jum_invoice), 'pendapatan' => $pendapatan];
    }
}
