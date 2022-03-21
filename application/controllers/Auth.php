<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        // $this->load->model('Login_model', 'login');
    }
    // public function login()
    // {
    //     $cek = $this->login->getUser();
    //     if ($cek->num_rows() > 0) {
    //         $row = $cek->row_array();
    //         if ($row['is_active'] == '0') {
    //             $this->response['msg'] = 'Akun anda belum bisa digunakan, menunggu disetujui oleh admin.';
    //         } else if ($row['is_active'] == '1') {
    //             // $this->response = [
    //             //     'success' => true,
    //             // ];
    //             $this->session->set_userdata($row);
    //             // $this->session->set_userdata('is_login', true);
    //             $this->login->last_login();
    //         } else if ($row['is_active'] == '2') {
    //             $this->response = [
    //                 'success' => false,
    //             ];
    //             $this->response['msg'] = 'Mohon maaf akun adan sudah nonaktifkan.';
    //         }
    //     } else {
    //         $this->response = [
    //             'success' => false,
    //             'msg' => 'Akun tidak ditemukan.'
    //         ];
    //     }
    //     echo json_encode($cek);
    // }
    public function login()
    {
        $username       =   $this->input->post('username');
        $password       =   $this->input->post('password');
        $query          =   $this->db->get_where('tb_users', ['username' => $username])->row_array();
        if ($query) {
            if (password_verify($password, $query['password'])) {
                $data = [
                    'username'          => $query['username'],
                    'email'             => $query['email'],
                    'name'              => $query['name'],
                    'user_level'        => $query['user_level'],
                    'is_verified'       => 1
                ];
                $this->session->set_userdata($query);
            } else {
                $data = array(
                    'code' => 0
                );
            }
        } else {
            $data = [
                'user_level' => false
            ];
        }
        echo json_encode($data);
    }
    public function sign_out()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('user_level');
        session_destroy();
        redirect('Login');
    }
}
