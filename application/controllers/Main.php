<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $data['app'] = $this->db->get('tb_application')->row_array();
        $data['title'] = 'Koetaradja Madu';
        $this->template->main('main/index', $data);
    }
    public function error()
    {
        $this->load->view('page/error');
    }
}
