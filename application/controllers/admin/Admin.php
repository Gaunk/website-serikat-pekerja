<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model'); // <- Tambahkan ini
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
        is_logged_in();
        is_admin();
    }

    public function index() {
        $this->dashboard(); // Saat akses /admin, langsung arahkan ke dashboard
    }

    public function dashboard() {
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login kembali.');
        return redirect('auth/login');
    }

    $user = $this->Admin_model->get_user_by_id($user_id);
    if (!$user) {
        $this->session->set_flashdata('error', 'User tidak ditemukan.');
        return redirect('auth/login');
    }

    // Get the total number of users
    $total_users = $this->Admin_model->count_total_users();

    // Get the total number of blocked users (is_blocked = 1)
    $blocked_users = $this->Admin_model->count_is_blocked();

    $active_users = $this->Admin_model->count_is_active();

    $data = [
        'judul'        => 'Admin - Dashboard',
        'biodata'      => $this->Admin_model->get_all_biodata(),
        'username'     => $user['username'],
        'email'        => $user['email'],
        'avatar'       => $user['avatar'],
        'total_users'  => $total_users,
        'blocked_users'=> $blocked_users,  // Pass blocked users count to the view
        'active_users' => $active_users,   // Pass active users count to the view
    ];

    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/footer');
}



    public function settings() {
        $username = $this->session->userdata('username');
        $user = $this->Admin_model->get_user($username);

        if (!$user) {
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login ulang.');
            return redirect('auth/login');
        }

        $data = [
            'judul'    => 'Dashboard - Settings',
            'username' => $user['username'],
            'email'    => $user['email'],
            'avatar'   => $user['avatar'],
        ];

        $this->load->view('admin/head', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/settings', $data);
        $this->load->view('admin/footer');
    }

    public function update_profile() {
        $username = $this->session->userdata('username');
        $email    = $this->input->post('email', true);
        $old_avatar = $this->session->userdata('avatar');
        $avatar = $old_avatar;

        if (!empty($_FILES['avatar']['name'])) {
            $config['upload_path']   = './temp_admin/assets/images/avatars/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
            $config['file_name']     = $username . '_' . time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $avatar = 'temp_admin/assets/images/avatars/' . $upload_data['file_name'];

                if ($old_avatar && file_exists('./' . $old_avatar)) {
                    unlink('./' . $old_avatar);
                }
            } else {
                $this->session->set_flashdata('error', "Gagal upload avatar: " . strip_tags($this->upload->display_errors()));
                return redirect('admin/settings');
            }
        }

        $update = $this->Admin_model->update_profile($username, [
            'email'  => $email,
            'avatar' => $avatar
        ]);

        if ($update) {
            $this->session->set_userdata('avatar', $avatar);
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }

        redirect('admin/settings');
    }

    public function change_password() {
        $username = $this->session->userdata('username');
        $current  = $this->input->post('current_password', true);
        $new      = $this->input->post('new_password', true);
        $confirm  = $this->input->post('confirm_password', true);

        $user = $this->Admin_model->get_user($username);
        if (!password_verify($current, $user['password'])) {
            $this->session->set_flashdata('error', 'Password lama salah.');
            return redirect('admin/settings');
        }

        if ($new !== $confirm) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak cocok.');
            return redirect('admin/settings');
        }

        $this->Admin_model->update_password($username, password_hash($new, PASSWORD_DEFAULT));
        $this->session->set_flashdata('success', 'Password berhasil diganti.');
        redirect('admin/settings');
    }

    public function biodata() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Sesi tidak valid. Silakan login kembali.');
            return redirect('auth/login');
        }

        $user = $this->Admin_model->get_user_by_id($user_id);
        $biodata = $this->Admin_model->get_biodata($user_id);

        $data = [
            'judul'    => 'Admin - Biodata',
            'biodata'  => $biodata ?? [],
            'username' => $user['username'],
            'email'    => $user['email'],
            'avatar'   => $user['avatar'],
        ];

        $this->load->view('admin/head', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/biodata', $data);
        $this->load->view('admin/footer');
    }

    public function update_biodata() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Sesi tidak valid.');
            return redirect('auth/login');
        }

        $biodata = $this->input->post([
            'name',
            'status_pekerjaan',
            'status_perkawinan',
            'no_kta',
            'alamat',
            'no_ktp',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'nama_perusahaan'
        ], true);

        $update = $this->Admin_model->update_biodata($user_id, $biodata);

        $this->session->set_flashdata('alert', [
            'type'    => $update ? 'success' : 'error',
            'message' => $update ? 'Data berhasil disimpan!' : 'Data gagal disimpan!'
        ]);

        redirect('admin/biodata');
    }

 
   public function update_role_pengguna($id) {
    // Get the role and status_keanggotaan from POST
    $role = $this->input->post('role', true);
    $status = $this->input->post('status_keanggotaan', true);

    // Validate the role
    if (!in_array($role, ['admin', 'user'])) {
        $this->session->set_flashdata('error', 'Role tidak valid.');
        return redirect('admin/pengguna');
    }

    // Validate the status_keanggotaan
    if (!in_array($status, ['aktif', 'tidak aktif'])) {
        $this->session->set_flashdata('error', 'Status keanggotaan tidak valid.');
        return redirect('admin/pengguna');
    }

    // Prepare the data for updating the users table
    $update_data_users = [
        'role' => $role,
        'is_blocked' => ($status === 'tidak aktif') ? 1 : 0 // Block user if status is "tidak aktif"
    ];

    // Prepare the data for updating the biodata table (only status_keanggotaan, no_kta remains unchanged)
    $update_data_biodata = [
        'status_keanggotaan' => $status
    ];

    // Start a transaction to ensure both updates happen together
    $this->db->trans_start();

    // Update the role in the users table
    $updated_users = $this->Admin_model->update_user_role((int)$id, $update_data_users);

    // Update the status_keanggotaan in the biodata table (no_kta will NOT be updated)
    $updated_biodata = $this->Admin_model->update_biodata_status((int)$id, $update_data_biodata);

    // Check if all updates were successful
    if ($updated_users && $updated_biodata) {
        $this->db->trans_commit();
        $this->session->set_flashdata('success', 'Role dan status berhasil diperbarui.');
    } else {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error', 'Gagal memperbarui role atau status keanggotaan.');
    }

    // Redirect to the pengguna page
    redirect('admin/pengguna');
}










public function hapus_pengguna($id) {
    // Cek apakah user dengan ID tersebut ada
    $user = $this->Admin_model->get_user_by_id($id);

    if (!$user) {
        $this->session->set_flashdata('error', 'Pengguna tidak ditemukan.');
        return redirect('admin/pengguna');
    }

    // Cegah admin menghapus dirinya sendiri (opsional)
    if ($this->session->userdata('user_id') == $id) {
        $this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun sendiri.');
        return redirect('admin/pengguna');
    }

    $deleted = $this->Admin_model->delete_user($id);

    if ($deleted) {
        $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
    }

    redirect('admin/pengguna');
}



// Fungsi untuk menampilkan daftar pengguna cooooooy
    public function pengguna() {
        // Ambil data pengguna dari model
        $users = $this->Admin_model->get_all_users();  // Panggil method untuk mengambil data pengguna

        // Data untuk dikirim ke view lieurcoding ahk
        $data = [
            'judul'    => 'Admin - Daftar Pengguna',
            'users'    => $users,  // Menambahkan data pengguna
            'username' => $this->session->userdata('username'),
            'avatar'   => $this->session->userdata('avatar'),
            'status_keanggotaan'   => $this->session->userdata('status_keanggotaan'),
            'no_kta'   => $this->session->userdata('no_kta'),
        ];

        // Load view dengan data
        $this->load->view('admin/head', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('admin/footer');
    }

 public function tambah_pengguna() {
    // Get the form data
    $email = $this->input->post('email', true); // Get email from POST
    $username = $this->input->post('username', true); // Get username from POST
    $password = $this->input->post('password'); // Get password from POST
    $role = $this->input->post('role'); // Get role from POST
    
    // Ensure password is provided
    if (empty($password)) {
        $this->session->set_flashdata('error', 'Password tidak boleh kosong.');
        return redirect('admin/pengguna');
    }
    
    // Ensure role is valid
    $validRoles = ['admin', 'user'];
    if (!in_array($role, $validRoles)) {
        $this->session->set_flashdata('error', 'Role tidak valid.');
        return redirect('admin/pengguna');
    }
    
    // Check if the username already exists
    if ($this->Admin_model->cek_username_exists($username)) {
        $this->session->set_flashdata('error', 'Username sudah terdaftar.');
        return redirect('admin/pengguna');
    }
    
    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Set the avatar path
    $avatar = NULL;

    // Check if an avatar file is uploaded
    if (!empty($_FILES['avatar']['name'])) {
        // Set upload configuration
        $config['upload_path'] = './temp_admin/assets/images/avatars/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed image types
        $config['max_size'] = 2048; // Max file size (2MB)
        $config['file_name'] = $username . '_' . time(); // Unique file name using username and timestamp

        // Initialize the upload library with the config
        $this->upload->initialize($config);

        // Attempt to upload the avatar
        if ($this->upload->do_upload('avatar')) {
            // Get the uploaded file data
            $upload_data = $this->upload->data();
            $avatar = 'temp_admin/assets/images/avatars/' . $upload_data['file_name']; // Path to the uploaded avatar
        } else {
            // If the upload failed, set a flash error message and redirect back
            $this->session->set_flashdata('error', "Gagal upload avatar: " . strip_tags($this->upload->display_errors()));
            return redirect('admin/pengguna');
        }
    }

    // Generate the next no_kta
    $no_kta = $this->Admin_model->generate_next_no_kta();

    // Prepare the data to insert the new user
    $user_data = [
        'email' => $email,
        'username' => $username,
        'password' => $passwordHash, // Store the hashed password
        'role' => $role,
        'avatar' => $avatar
    ];

    // Insert the new user into the users table
    $insert = $this->Admin_model->insert_pengguna($user_data);

    // If the user was successfully inserted, insert the biodata and no_kta
    if ($insert) {
        // Prepare the biodata data with the generated no_kta
        $biodata_data = [
            'user_id' => $this->db->insert_id(), // Assuming user_id is auto-incremented
            'no_kta' => $no_kta
        ];

        // Insert the biodata into the biodata table
        $insert_biodata = $this->Admin_model->insert_biodata($biodata_data);

        if ($insert_biodata) {
            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan dengan No KTA: ' . $no_kta);
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan biodata pengguna.');
        }
    } else {
        $this->session->set_flashdata('error', 'Gagal menambahkan pengguna.');
    }

    // Redirect back to the user management page
    redirect('admin/pengguna');
}




}
