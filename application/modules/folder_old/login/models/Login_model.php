<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getDataUser($username)
    {
        $this->db->select('a.*');
        $this->db->where('a.username', $username);
        $this->db->from('user a');

        $query = $this->db->get();
        return $query;
    }
}
