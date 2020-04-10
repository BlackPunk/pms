<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_user($user, $pass)
    {
        $data = $this->db->get_where('users', ['username' => $user, 'password' => $pass])->row_array();
        return $data;
    }
}
