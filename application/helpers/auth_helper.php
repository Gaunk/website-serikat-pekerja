<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $ci = get_instance();
        if (!$ci->session->userdata('logged_in')) {
            redirect('auth/login');
            exit;
        }
    }
}

if (!function_exists('is_user')) {
    function is_user() {
        $ci = get_instance();
        if ($ci->session->userdata('role') !== 'user') {
            // Jika bukan user, redirect ke dashboard admin (atau halaman lain)
            redirect('admin/dashboard');
            exit;
        }
    }
}

if (!function_exists('is_admin')) {
    function is_admin() {
        $ci = get_instance();
        if ($ci->session->userdata('role') !== 'admin') {
            redirect('auth/login');
            exit;
        }
    }
}
