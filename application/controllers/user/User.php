<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model([
        'Admin_model',
        'Berita_model',
        'Galeri_model',
        'Seo_model',
        'User_model','Slides_model', 'Logo_model'
        ]);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
        
        // Optional: pastikan user login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function dashboard() {
         // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login kembali.');
            redirect('auth/login');
        }

        // Ambil data user
        $user = $this->User_model->get_user_by_id($user_id); // Anda bisa buat fungsi ini

        // Ambil data biodata user jika ada
        $biodata = $this->User_model->get_biodata($user_id);
        // Ambil username dari session
        $username = $this->session->userdata('username');
        $logo = $this->Logo_model->get_logo(); // Ambil logo dari database
        // Ambil data lengkap user dari database
        $user = $this->User_model->get_user($username);
        

        // Cek apakah data user ditemukan
        if ($user) {
            // Siapkan data untuk view
            $data['biodata']  = $biodata ?? []; // pastikan array, meski kosong
            $data['judul']    = 'Biodata Saya';
            $data['username'] = $user['username'];
            $data['email']    = $user['email'];
            $data['avatar']   = $user['avatar'];
            $data['logo'] = $logo;
            $this->load->view('user/head', $data);
            $this->load->view('user/dashboard', $data);
            $this->load->view('user/footer');
        } else {
            // Jika tidak ada user di database, redirect ke login
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login ulang.');
            redirect('auth/login');
        }
    }


   public function settings() {
    
        // Ambil username dari session
        $username = $this->session->userdata('username');

        // Ambil data lengkap user dari database
        $user = $this->User_model->get_user($username);

        // Cek apakah data user ditemukan
        if ($user) {
            $data['username'] = $user['username'];
            $data['email']    = $user['email'];
            $data['avatar']   = $user['avatar'];
            $data['judul'] = 'Dashboard - Settings';
            $this->load->view('user/head', $data);
            $this->load->view('user/settings', $data);
            $this->load->view('user/footer');
        } else {
            // Jika tidak ada user di database, redirect ke login
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login ulang.');
            redirect('auth/login');
        }
    }

    public function update_profile() {
        $username = $this->session->userdata('username');
        
        // Ambil email yang baru dari input
        $email = $this->input->post('email', true);
        
        // Mengambil avatar lama dari session
        $old_avatar = $this->session->userdata('avatar');
        
        // Avatar default jika tidak ada
        $avatar = $old_avatar;

        // Cek apakah ada file avatar yang diupload
        if (!empty($_FILES['avatar']['name'])) {
            // Konfigurasi upload gambar
            $config['upload_path'] = './temp_user/images/avatar/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // Maksimal 2MB
            $config['file_name'] = $username . '_' . time(); // Nama file unik

            // Inisialisasi upload
            $this->upload->initialize($config);

            // Lakukan upload
            if ($this->upload->do_upload('avatar')) {
                // Ambil data file yang di-upload
                $upload_data = $this->upload->data();
                $avatar = 'temp_user/images/avatar/' . $upload_data['file_name'];  // Lokasi gambar baru
                
                // Jika ada gambar lama, hapus file lama
                if ($old_avatar && file_exists('./' . $old_avatar)) {
                    unlink('./' . $old_avatar);  // Menghapus file gambar lama
                }

            } else {
                // Jika gagal upload, tampilkan error yang lebih detail
                $upload_error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "Gagal mengunggah gambar: " . $upload_error);
                redirect('user/settings');
                return; // Menghentikan eksekusi lebih lanjut
            }
        }

        // Update profile di database
        $update_data = [
            'email' => $email,
            'avatar' => $avatar
        ];

        // Update profile di model
        if ($this->User_model->update_profile($username, $update_data)) {
            // Update session dengan avatar yang baru (atau lama jika tidak ada perubahan)
            $this->session->set_userdata('avatar', $avatar);

            // Set flash message untuk sukses
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            // Jika gagal update profile, tampilkan pesan error
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui profil.');
        }

        // Redirect ke halaman pengaturan user
        redirect('user/settings');
    }


    public function biodata() {
        // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login kembali.');
            redirect('auth/login');
        }

        // Ambil data user
        $user = $this->User_model->get_user_by_id($user_id); // Anda bisa buat fungsi ini

        // Ambil data biodata user jika ada
        $biodata = $this->User_model->get_biodata($user_id);

        // Siapkan data untuk view
        $data['biodata']  = $biodata ?? []; // pastikan array, meski kosong
        $data['judul']    = 'Biodata Saya';
        $data['username'] = $user['username'];
        $data['email']    = $user['email'];
        $data['avatar']   = $user['avatar'];

        // Load views
        $this->load->view('user/head', $data);
        $this->load->view('user/biodata', $data);
        $this->load->view('user/footer');
    }


public function update_biodata() {
    // Ambil user_id dari session
    $user_id = $this->session->userdata('user_id');

    // Cek apakah user sudah login
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Sesi pengguna tidak valid. Silakan login kembali.');
        redirect('auth/login');
        return;
    }

    // Ambil data dari form input
    $biodata = [
        'name'               => $this->input->post('name', true),
        'status_pekerjaan'   => $this->input->post('status_pekerjaan', true),
        'status_perkawinan'  => $this->input->post('status_perkawinan', true),
        'no_kta'             => $this->input->post('no_kta', true),
        'alamat'             => $this->input->post('alamat', true),
        'no_ktp'             => $this->input->post('no_ktp', true),
        'tempat_lahir'       => $this->input->post('tempat_lahir', true),
        'tanggal_lahir'               => $this->input->post('tanggal_lahir', true),
        'jenis_kelamin'             => $this->input->post('jenis_kelamin', true),
        'nama_perusahaan'    => $this->input->post('nama_perusahaan', true),
        'user_id'            => $user_id
    ];

    // Validasi input dasar
    if (empty($biodata['name']) || empty($biodata['no_ktp'])) {
        $this->session->set_flashdata('error', 'Nama dan No. KTP wajib diisi.');
        redirect('user/biodata');
        return;
    }

    // Cek apakah biodata untuk user ini sudah ada
    $existing = $this->User_model->get_biodata($user_id);

    if ($existing) {
        // Update jika sudah ada
        $success = $this->User_model->update_biodata($user_id, $biodata);
        $message = $success ? 'Biodata berhasil diperbarui.' : 'Gagal memperbarui biodata.';
    } else {
        // Insert jika belum ada
        $success = $this->User_model->insert_biodata($biodata);
        $message = $success ? 'Biodata berhasil ditambahkan.' : 'Gagal menambahkan biodata.';
    }

    // Set flash message
    $this->session->set_flashdata($success ? 'success' : 'error', $message);

    // Redirect ke halaman biodata
    redirect('user/biodata');
}








    public function change_password() {
        $username = $this->session->userdata('username');
        $current = $this->input->post('current_password', true);
        $new     = $this->input->post('new_password', true);
        $confirm = $this->input->post('confirm_password', true);

        $user = $this->User_model->get_user($username);

        if (!password_verify($current, $user['password'])) {
            $this->session->set_flashdata('error', 'Password lama salah.');
            redirect('user/settings');
            return;
        }

        if ($new !== $confirm) {
            $this->session->set_flashdata('error', 'Password baru dan konfirmasi tidak cocok.');
            redirect('user/settings');
            return;
        }

        $this->User_model->update_password($username, password_hash($new, PASSWORD_DEFAULT));
        $this->session->set_flashdata('success', 'Password berhasil diganti.');
        redirect('user/settings');
    }
}
