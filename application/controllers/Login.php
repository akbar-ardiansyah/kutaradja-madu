<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // admin cannot access the log in there!
        // if ($this->session->userdata('user_login') == false) {
        //     redirect('Main');
        // }

        // in session user login cannot access login admin
        // if ($this->session->userdata('user_data') == true) {
        //     redirect('admin');
        // }
        $this->session->sess_destroy();
        if ($this->session->userdata('email')) {
            redirect('Admin');
        } else {
            $data['title'] = 'Login | Admin';
            $data['app'] = $this->db->get('tb_application')->row_array();
            $this->load->view('admin/login', $data);
        }
    }
}
