<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Model_users extends CI_Model
{
    public function changePassword($new_password, $id_user)
    {
        $update = $this->db->query('UPDATE tb_users SET password =   "' . $new_password . '"   WHERE tb_users.id_users = ' . $id_user . '');
        return $update;
    }

    public function getusers()
    {
        $data = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
        return $data;
    }   // }
}


/* End of file filename.php */