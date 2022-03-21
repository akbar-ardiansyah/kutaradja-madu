<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    // template admin
    function admin($template, $data_content = NULL)
    {
        $data['content']         = $this->ci->load->view($template, $data_content, TRUE);
        $data['leftbar']         = $this->ci->load->view('admin/leftbar', $data_content, TRUE);

        $this->ci->load->view('admin/wrapper', $data);
    }
    // template main page
    function main($template, $data_content = NULL)
    {
        $data['content']         = $this->ci->load->view($template, $data_content, TRUE);
        $this->ci->load->view('main/wrapper', $data);
    }
}
