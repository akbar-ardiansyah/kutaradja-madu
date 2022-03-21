<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function getUser()
    {
        $username = $this->input->post('username');
        $pass = md5(md5(md5($this->input->post('password'))));
        $this->db->select("*")->from("tb_users")
            ->where([
                'username' => $username,
                'password' => $pass
            ]);
        return $this->db->get();
    }

    function last_login()
    {
        $iduser = $this->session->userdata('id_user');
        $this->db->where('id_users', $iduser);
        $this->db->update('tb_users', [
            'last_login' => date("Y-m-d H:i:s")
        ]);
    }
}
