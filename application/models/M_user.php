<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function dataLogin($user, $pass)
    {
        $data = $this->db->get_where('users', ['username' => $user, 'password' => $pass])->result_array();
        return (count($data) >= 1) ? true : false;
    }
}
