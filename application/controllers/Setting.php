<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users', 'users');
        date_default_timezone_set('Asia/Jakarta');
        _validate();
        add_js([
            'js/users.js'
        ]);
    }
    public function index()
    {
        $data['title']        = 'Aplikasi';
        $data['app'] = $this->db->get('tb_application')->row_array();
        $this->template->admin('page/setting', $data);
    }
    public function users()
    {
        $data['title']        = 'Profile';
        $data['app'] = $this->db->get('tb_application')->row_array();
        $this->template->admin('page/profile', $data);
    }
    public function setPesan()
    {

        $pesan = [
            'required'           =>     '%s harus diisi.',
            'valid_email'       =>     '%s format salah.',
            'numeric'           =>     '%s just numeric.',
            'matches'           =>    '%s tidak sama %s.',
            'is_unique'           =>    '%s sudah ada',
            'max_length'       =>      '%s max %s character.',
            'min_length'       =>      '%s min %s character.',
            'alpha_dash'       =>    '%s diisi alpabet, numerik, dan garis bawah.',
            'alpha'               =>      '%s diisi dengan format alpha a-z',
            'valid_url_format' =>      '%s format salah, exampel (htpp://www.xxxxx.com/xxx)',
            'is_natural'       =>      '%s harus format number 0-9',
            'decimal'              =>    '%s harus format decimal',
        ];
        foreach ($pesan as $key => $value) {
            $this->form_validation->set_message($key, $value);
        }
    }
    function change_password()
    {
        if (ajax()) {
            $this->load->library('form_validation');
            $this->setPesan();
            $this->form_validation->set_rules("currentPassword", "password saat ini", "required|trim");
            $this->form_validation->set_rules("newPassword", "password baru", "required|trim|min_length[5]|matches[verifyPassword]");
            $this->form_validation->set_rules("verifyPassword", "konfirmasi password", "required|trim|min_length[5]|matches[newPassword]");
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run()) {

                $query                     = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
                $current_Password          = $this->input->post('currentPassword');
                $md5Password               = password_verify($current_Password, $query['password']);

                if ($md5Password == $this->session->userdata('password')) {
                    $this->response = [
                        'success' => true,
                        'msg' => 'benar'
                    ];

                    $id_user            = $this->input->post('id_user');
                    $new_password       = $this->input->post('newPassword');
                    $data               = password_hash($new_password, PASSWORD_DEFAULT);
                    $save_data          = $this->users->changePassword($data, $id_user);
                    if ($save_data == true) {
                        $this->response = [
                            'success' => true,
                            'msg' => 'Sukses simpan data.'
                        ];
                    } else {
                        $this->response = [
                            'success' => false,
                            'msg' => 'Terjadi kesalah di server.'
                        ];
                    }
                } else {
                    $this->response = [
                        'success' => false,
                        'msg' => 'password lama anda salah!'
                    ];
                }
            } else {
                $this->response['msg'] = 'Form belum lengkap.';
                foreach ($_POST as $key => $value) {
                    # code...
                    $this->response['messages'][$key] = form_error($key);
                }
            }
            echo json_encode($this->response);
        } else {
            exit("No direct scripts access allowed.");
        }
    }
}
