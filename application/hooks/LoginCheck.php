<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCheck
{
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function checkLoginStatus()
    {
        $allowed_uris = array('login', 'auth', 'public'); // Halaman yang diizinkan tanpa login

        $current_uri = $this->CI->uri->segment(1);

        if (!in_array($current_uri, $allowed_uris) && !$this->CI->session->userdata('logged_in'))
        {
            redirect('login'); // Ganti 'login' dengan halaman login Anda
        }
    }
}