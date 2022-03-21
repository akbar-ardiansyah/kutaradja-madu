<?php

function _validate()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('main');
    }
}
function isAdmin()
{
    $ci = get_instance();
    $userData = $ci->session->userdata('user_level');
    if ($userData !== '1') {
        redirect('error');
    }
}
