<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_user($data)
    {
        $user = $this->db->get_where('users', $data)->row_array();
        return $user;
    }
    public function getUser()
    {
        $res = $this->db->select('*')
            ->from('users')
            ->get()->result_array();
        return $res;
    }
    public function setUser($data)
    {
        $this->db->insert('users', $data);
    }
    public function updateprofil($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('email', $data['email']);
        $this->db->set('no_hp', $data['no_hp']);
        $this->db->where('id_user', $data['id']);
        $this->db->update('users');
    }
    public function updatepass($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('users');
    }
    public function getemail($email)
    {
        $res = $this->db->select('*')
            ->from('users')
            ->where('email', $email)
            ->get()->result_array();
        return $res;
    }
}
