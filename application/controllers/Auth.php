<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');  // Assuming User_model is your model
        $this->load->model('User_model', 'Logo_model');  // Assuming User_model is your model
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    // Halaman login dan logicnya
    public function index() {
        // Jika sudah login, redirect ke dashboard sesuai role
        if ($this->session->userdata('logged_in') === true) {
            $role = $this->session->userdata('role');
            if ($role === 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
            return; // jangan lanjut ke load view login
        }

        // Jika form login disubmit
        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            // Validasi input sederhana
            if (empty($username) || empty($password)) {
                $this->session->set_flashdata('error', 'Username dan password wajib diisi.');
                redirect('auth/login');
            }

            // Ambil data user dari database
            $user = $this->User_model->get_user($username);

            // Jika user ditemukan dan password cocok
            if ($user && password_verify($password, $user['password'])) {
                // Check if the user is blocked
                if ($user['is_blocked'] == 1) {
                    // Blocked user
                    $this->session->set_flashdata('error', 'Akun Anda diblokir. Silakan hubungi admin.');
                    redirect('auth/login');
                } else {
                    // Set session user
                    $this->session->set_userdata([
                        'user_id'   => $user['id'],
                        'username'  => $user['username'],
                        'role'      => $user['role'],
                        'avatar'    => $user['avatar'],
                        'logged_in' => true
                    ]);

                    // Redirect sesuai role
                    if ($user['role'] === 'admin') {
                        redirect('admin/dashboard');
                    } else {
                        redirect('user/dashboard');
                    }
                }
            } else {
                // Login gagal
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        }

        // Tampilkan halaman login
        $this->load->view('auth/login');
    }

    // Halaman registrasi dan logicnya
    public function register() {
        if ($this->input->post()) {
            $username         = $this->input->post('username', true);
            $password         = $this->input->post('password', true);
            $confirm_password = $this->input->post('confirm_password', true);

            // Validasi input
            if (empty($username) || empty($password) || empty($confirm_password)) {
                $this->session->set_flashdata('error', 'Semua field wajib diisi.');
                redirect('auth/register');
            }

            if ($password !== $confirm_password) {
                $this->session->set_flashdata('error', 'Password dan konfirmasi password tidak cocok.');
                redirect('auth/register');
            }

            // Cek apakah username sudah terdaftar
            if ($this->User_model->get_user($username)) {
                $this->session->set_flashdata('error', 'Username sudah terdaftar.');
                redirect('auth/register');
            }
            $logo     = $this->Logo_model->get_logo();
            // Siapkan data user baru
            $data = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role'     => 'user',
                'avatar'   => 'default.png', // gunakan default avatar
                'is_blocked' => 0, // Default to not blocked
                'logo'    => $logo,
            ];

            // Simpan user baru
            if ($this->User_model->insert_user($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi.');
                redirect('auth/register');
            }
        }

        // Tampilkan halaman registrasi
        $this->load->view('auth/register');
    }

    // Logout user
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    // Alias supaya bisa akses /auth/login
    public function login() {
        $this->index();
    }
}
