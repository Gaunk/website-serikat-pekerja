<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load semua model yang diperlukan
    $this->load->model([
        'Admin_model',
        'Berita_model',
        'Galeri_model',
        'Seo_model',
        'User_model','Slides_model', 'Logo_model', 'Menu_model', 'Clients_model'
        ]);
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
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
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
    $role = $this->input->post('role', true);
    $status = $this->input->post('status_keanggotaan', true);

    if (!in_array($role, ['admin', 'user'])) {
        $this->session->set_flashdata('error', 'Role tidak valid.');
        return redirect('admin/pengguna');
    }

    if (!in_array(strtolower($status), ['aktif', 'tidak aktif'])) {
        $this->session->set_flashdata('error', 'Status keanggotaan tidak valid.');
        return redirect('admin/pengguna');
    }

    $update_data_users = [
        'role' => $role,
        'is_blocked' => (strtolower($status) === 'tidak aktif') ? 1 : 0,
    ];

    $update_data_biodata = [
        'status_keanggotaan' => $status
    ];

    $this->db->trans_start();

    $updated_users = $this->Admin_model->update_user_role((int)$id, $update_data_users);
    $updated_biodata = $this->Admin_model->update_biodata_status((int)$id, $update_data_biodata);

    if ($updated_users && $updated_biodata) {
        $this->db->trans_commit();
        $this->session->set_flashdata('success', 'Role dan status berhasil diperbarui.');
    } else {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error', 'Gagal memperbarui role atau status keanggotaan.');
    }

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
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; // Allowed image types
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

public function berita() {
    $berita = $this->Berita_model->get_all_berita();
    $kategori = $this->Berita_model->get_all_kategori();

    $data = [
        'judul' => 'Admin - Daftar Berita',
        'berita' => $berita,
        'kategori' => $kategori,
        'username' => $this->session->userdata('username'),
    ];

    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('berita/dashboard', $data);
    $this->load->view('admin/footer');
}

public function tambah_berita() {
    // Cek apakah ada data POST yang dikirim
    if ($_POST) {
        $judul        = $this->input->post('judul', true);
        $konten       = $this->input->post('konten', true);
        $kategori_id  = $this->input->post('kategori_id', true);
        $meta_title   = $this->input->post('meta_title', true);
        $meta_description = $this->input->post('meta_description', true);
        $meta_keywords    = $this->input->post('meta_keywords', true);

        // Buat slug dari judul
        $slug = url_title($judul, 'dash', true);

        // Proses upload gambar jika ada
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/berita/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                redirect('admin/berita');
            }
        }

        // Data yang akan disimpan ke database, termasuk SEO
        $data = [
            'judul'            => $judul,
            'slug'             => $slug,
            'konten'           => $konten,
            'kategori_id'      => $kategori_id,
            'image'            => $image,
            'meta_title'       => $meta_title,
            'meta_description' => $meta_description,
            'meta_keywords'    => $meta_keywords
        ];

        // Simpan berita ke database
        $insert = $this->Admin_model->insert_berita($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Berita berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan berita.');
        }

        redirect('admin/berita');
    }

    // Ambil kategori list
    $data['kategori_list'] = $this->Berita_model->get_all_kategori_with_berita();
    $data['judul'] = 'Tambah Berita';

    // Tampilkan form tambah berita
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('berita/tambah_berita', $data); // View harus punya input SEO juga
    $this->load->view('admin/footer');
}


public function edit_berita($id) {
    // Ambil data berita berdasarkan ID
    $berita = $this->Berita_model->get_berita_by_id($id);

    if (!$berita) {
        $this->session->set_flashdata('error', 'Berita tidak ditemukan.');
        return redirect('admin/berita');
    }

    // Jika form disubmit
    if ($this->input->post()) {
        // Ambil data dari form POST dengan XSS Filtering
        $judul            = $this->input->post('judul', true);
        $konten           = $this->input->post('konten', true);
        $kategori_id      = $this->input->post('kategori_id', true);
        $meta_title       = $this->input->post('meta_title', true);
        $meta_description = $this->input->post('meta_description', true);
        $meta_keywords    = $this->input->post('meta_keywords', true);
        $slug             = url_title($judul, 'dash', true);

        // Default image (gambar lama)
        $image = $berita['image'];

        // Proses upload gambar baru (jika ada)
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/berita/' . $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($berita['image']) && file_exists('./' . $berita['image'])) {
                    unlink('./' . $berita['image']);
                }
            } else {
                // Gagal upload
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                return redirect('admin/edit_berita/' . $id);
            }
        }

        // Data yang akan diupdate ke database
        $update_data = [
            'judul'            => $judul,
            'slug'             => $slug,
            'konten'           => $konten,
            'kategori_id'      => $kategori_id,
            'image'            => $image,
            'meta_title'       => $meta_title,
            'meta_description' => $meta_description,
            'meta_keywords'    => $meta_keywords,
        ];

        // Update melalui model
        $update = $this->Berita_model->update_berita($id, $update_data);

        if ($update) {
            $this->session->set_flashdata('success', 'Berita berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui berita.');
        }

        return redirect('admin/berita');
    }

    // Data untuk view (jika form belum dikirim)
    $data = [
        'judul'             => 'Admin - Edit Berita',
        'berita'            => $berita,
        'kategori_list'     => $this->Berita_model->get_all_kategori(),
        'selected_kategori' => $berita['kategori_id'],
    ];

    // Tampilkan view edit
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('berita/edit_berita', $data);
    $this->load->view('admin/footer');
}







public function hapus_berita($id) {
    // Ambil data berita berdasarkan ID
    $berita = $this->Admin_model->get_berita_by_id($id);
    if (!$berita) {
        $this->session->set_flashdata('error', 'Berita tidak ditemukan.');
        redirect('admin/berita');
    }

    // Hapus gambar jika ada
    if ($berita['image'] && file_exists('./' . $berita['image'])) {
        unlink('./' . $berita['image']);
    }

    // Hapus berita dari database
    $delete = $this->Admin_model->delete_berita($id);

    if ($delete) {
        $this->session->set_flashdata('success', 'Berita berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus berita.');
    }

    redirect('admin/berita');
}


public function seo()
{
    
    // Data untuk view
    $data = [
        'judul'             => 'Admin - SEO',
        'seo'   => $this->Seo_model->get_seo_data(), // jika ada
        'seo_list' => $this->Seo_model->get_all_seo()



    ];

    // Tampilkan view edit berita untuk keperluan SEO
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('seo/dashboard', $data); // Atau view khusus SEO jika ada: seo_berita.php
    $this->load->view('admin/footer');
}

public function simpan_seo()
{
    $meta_title       = $this->input->post('meta_title');
    $meta_description = $this->input->post('meta_description');
    $meta_keywords    = $this->input->post('meta_keywords');

    // Simpan ke database melalui model
    $this->Seo_model->insert_seo([
        'meta_title'       => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords'    => $meta_keywords,
    ]);

    // Redirect kembali ke halaman SEO
    $this->session->set_flashdata('success', 'Data SEO berhasil disimpan.');
    redirect('admin/seo');
}

public function edit_seo($id)
{
    $seo = $this->Seo_model->get_seo_by_id($id);

    if (!$seo) {
        show_404(); // Jika ID tidak ditemukan
    }

    $data = [
        'judul' => 'Edit SEO',
        'seo'   => $seo
    ];

    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('seo/edit_form', $data); // Buat view baru khusus edit
    $this->load->view('admin/footer');
}

public function update_seo()
{
    $id = $this->input->post('id');
    $meta_title = $this->input->post('meta_title', true);
    $meta_description = $this->input->post('meta_description', true);
    $meta_keywords = $this->input->post('meta_keywords', true);

    // Validasi sederhana
    if (empty($id) || empty($meta_title) || empty($meta_description) || empty($meta_keywords)) {
        $this->session->set_flashdata('error', 'Semua field harus diisi!');
        redirect('admin/update_seo/' . $id);
        return;
    }

    $data = [
        'meta_title' => trim($meta_title),
        'meta_description' => trim($meta_description),
        'meta_keywords' => trim($meta_keywords)
    ];

    $update = $this->Seo_model->update_seo($id, $data);

    if ($update) {
        $this->session->set_flashdata('success', 'SEO berhasil diperbarui.');
    } else {
        $this->session->set_flashdata('error', 'Gagal memperbarui SEO.');
    }

    redirect('admin/seo');
}



public function delete_seo($id)
{
    $this->Seo_model->delete_seo($id);
    $this->session->set_flashdata('success', 'Data SEO berhasil dihapus.');
    redirect('admin/seo');
}

// BLOCK PROFILE WEBSITE
public function profile_website()
{
    $profile = $this->Seo_model->get_profile();
    $logo = $this->Logo_model->get_logo(); // Ambil logo dari database

    $data = [
        'judul' => 'Admin - Profil Website',
        'profile' => $profile,
        'logo' => $logo,
    ];

    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('seo/profile_website', $data); // Buat view ini
    $this->load->view('admin/footer');
}

 public function insert_website()
{
    $site_name       = $this->input->post('site_name');
    $site_desc       = $this->input->post('site_desc');
    $keyword_website       = $this->input->post('keyword_website');
    $contact_email   = $this->input->post('contact_email');

    // Cek apakah data website sudah ada
    $existing = $this->Seo_model->get_site_web();

    if ($existing) {
        // Kalau data sudah ada, update data
        $this->Seo_model->update_site_web($existing->id, [
            'site_name'     => $site_name,
            'site_desc'     => $site_desc,
            'keyword_website' => $keyword_website,
            'contact_email' => $contact_email,
        ]);

        $this->session->set_flashdata('success', 'Data SEO berhasil diperbarui.');
    } else {
        // Kalau belum ada data, insert baru
        $this->Seo_model->insert_site_web([
            'site_name'     => $site_name,
            'site_desc'     => $site_desc,
            'keyword_website' => $keyword_website,
            'contact_email' => $contact_email,
        ]);

        $this->session->set_flashdata('success', 'Data SEO berhasil disimpan.');
    }

    redirect('admin/profile_website');
}

 public function save_logo()
{
    $id_logo = $this->input->post('id_logo');
    $old_image = $this->input->post('old_image');
    $delete_image = $this->input->post('delete_image');

    $image = $old_image; // Default pakai gambar lama

    // Jika user centang hapus gambar
    if ($delete_image == "1" && file_exists($old_image)) {
        @unlink($old_image);
        $image = ''; // Kosongkan image di database
    }

    // Jika upload gambar baru
    if (!empty($_FILES['image']['name'])) {
        $config['upload_path']   = './temp_admin/assets/logo/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size']      = 4048;
        $config['file_name']     = time() . '_' . $_FILES['image']['name'];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $image = 'temp_admin/assets/logo/' . $upload_data['file_name'];

            // Hapus file lama jika ada dan belum dihapus sebelumnya
            if ($old_image && file_exists($old_image)) {
                @unlink($old_image);
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
            redirect('admin/profile_website');
            return;
        }
    }

    // Data yang akan disimpan ke database
    $data = [
        'image' => $image,
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // Update berdasarkan ID logo
    $this->Logo_model->update_logo($data, $id_logo);

    $this->session->set_flashdata('success', 'Logo berhasil diperbarui.');
    redirect('admin/profile_website');
}






// 
public function galeri() {
    $data['judul'] = 'Admin - Manajemen Galeri';
    $data['galeri'] = $this->Galeri_model->get_all_galeri();

    // Ambil flashdata error dan success untuk ditampilkan di view
    $data['error'] = $this->session->flashdata('error');
    $data['success'] = $this->session->flashdata('success');

    // Load view list galeri
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/galeri', $data);
    $this->load->view('admin/footer');
}

public function tambah_galeri() {
    // Cek apakah ada data POST yang dikirim
    if ($_POST) {
        $judul        = $this->input->post('judul', true);
        $deskripsi       = $this->input->post('deskripsi', true);
        $date_created = date('Y-m-d H:i:s');

        // Proses upload gambar jika ada
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/galeri/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                redirect('admin/galeri');
            }
        }

        // Data yang akan disimpan ke database, termasuk SEO
        $data = [
            'judul'            => $judul,
            'deskripsi'             => $deskripsi,
            'image'            => $image,
            'date_created' => $date_created,
        ];

        // Simpan galeri ke database
        $insert = $this->Galeri_model->insert_galeri($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'galeri berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan galeri.');
        }

        redirect('admin/galeri');
    }

    // Ambil kategori list
    $data['judul'] = 'Tambah Galeri';
    $data['slider_galeri'] = $this->Slider_model->get_active_sliders();

    // Tampilkan form tambah berita
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/tambah_galeri', $data); // View harus punya input SEO juga
    $this->load->view('admin/footer');
}

public function edit_galeri($id) {
    // Ambil data berita berdasarkan ID
    $galeri = $this->Galeri_model->get_galeri_by_id($id);

    if (!$galeri) {
        $this->session->set_flashdata('error', 'galeri tidak ditemukan.');
        return redirect('admin/berita');
    }

    // Jika form disubmit
    if ($this->input->post()) {
        // Ambil data dari form POST dengan XSS Filtering
        $judul        = $this->input->post('judul', true);
        $deskripsi       = $this->input->post('deskripsi', true);


        // Default image (gambar lama)
        $image = $galeri->image;

        // Proses upload gambar baru (jika ada)
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/galeri/' . $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($galeri->image) && file_exists('./' . $galeri->image)) {
                    unlink('./' . $galeri->image);
                }
            } else {
                // Gagal upload
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                return redirect('admin/galeri/edit/' . $id);
            }
        }

        // Data yang akan diupdate ke database
        $update_data = [
            'judul'            => $judul,
            'deskripsi'             => $deskripsi,
            'image'            => $image,
        ];

        // Update melalui model
        $update = $this->Galeri_model->update_galeri($id, $update_data);

        if ($update) {
            $this->session->set_flashdata('success', 'galeri berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui galeri.');
        }

        return redirect('admin/galeri');
    }

    // Data untuk view (jika form belum dikirim)
    $data = [
        'judul'             => 'Admin - Edit Galeri',
        'galeri'            => $galeri,
        'slider_galeri' => $this->Galeri_model->get_all_galeri(), // ambil 3 gambar
    ];

    // Tampilkan view edit
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_galeri', $data);
    $this->load->view('admin/footer');
}


public function hapus_galeri($id)
{
    $galeri = $this->Galeri_model->get_by_id($id);

    if (!$galeri) {
        $this->session->set_flashdata('error', 'Data galeri tidak ditemukan.');
        redirect('admin/galeri');
        return;
    }

    // Mengakses properti sebagai objek
    if (!empty($galeri->image) && $galeri->image !== 'default.jpg') {
        $file_path = FCPATH . $galeri->image;

        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    $deleted = $this->Galeri_model->delete_galeri($id);

    if ($deleted) {
        $this->session->set_flashdata('success', 'Galeri berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus galeri.');
    }

    redirect('admin/galeri');
}



// BLOCK SLIDER
public function slides()
{
    // Load data dari model
    $data['judul'] = 'Admin - Manajemen Slides';
    $data['slides'] = $this->Slides_model->get_all_slides();

    // Flash message (jika ada)
    $data['success'] = $this->session->flashdata('success');
    $data['error'] = $this->session->flashdata('error');

    // Load view
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/slides', $data); // Buat view: slides.php
    $this->load->view('admin/footer');
}

public function tambah_slides() {
    // Cek apakah ada data POST yang dikirim
    if ($_POST) {
        $judul        = $this->input->post('judul', true);
        $deskripsi       = $this->input->post('deskripsi', true);
        $status       = $this->input->post('status', true);
        $date_created = date('Y-m-d H:i:s');

        // Proses upload gambar jika ada
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/slides/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/slides/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                redirect('admin/slides');
            }
        }

        // Data yang akan disimpan ke database, termasuk SEO
        $data = [
            'judul'            => $judul,
            'status'            => $status,
            'deskripsi'             => $deskripsi,
            'image'            => $image,
            'date_created' => $date_created,
        ];

        // Simpan galeri ke database
        $insert = $this->Slides_model->insert_slides($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'galeri berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan galeri.');
        }

        redirect('admin/slides');
    }

    // Ambil kategori list
    $data['judul'] = 'Tambah Slides';
    $data['status_options'] = $this->Slides_model->get_enum_values('slides', 'status'); // Get enum values for status

    // Tampilkan form tambah berita
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/tambah_slides', $data); // View harus punya input SEO juga
    $this->load->view('admin/footer');
}


public function edit_slides($id) {
    // Ambil data berita berdasarkan ID
    $slides = $this->Slides_model->get_slides_by_id($id);

    if (!$slides) {
        $this->session->set_flashdata('error', 'Slides tidak ditemukan.');
        return redirect('admin/slides');
    }

    // Jika form disubmit
    if ($this->input->post()) {
        // Ambil data dari form POST dengan XSS Filtering
        $judul        = $this->input->post('judul', true);
        $deskripsi    = $this->input->post('deskripsi', true);
        $status       = $this->input->post('status', true); // Ambil status

        // Default image (gambar lama)
        $image = $slides->image;

        // Proses upload gambar baru (jika ada)
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/slides/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/slides/' . $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($slides->image) && file_exists('./' . $slides->image)) {
                    unlink('./' . $slides->image);
                }
            } else {
                // Gagal upload
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                return redirect('admin/slides/edit/' . $id);
            }
        }

        // Data yang akan diupdate ke database
        $update_data = [
            'judul'        => $judul,
            'deskripsi'    => $deskripsi,
            'image'        => $image,
            'status'       => $status, // Simpan status
        ];

        // Update melalui model
        $update = $this->Slides_model->update_slides($id, $update_data);

        if ($update) {
            $this->session->set_flashdata('success', 'Slides berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui slides.');
        }

        return redirect('admin/slides');
    }

    // Data untuk view (jika form belum dikirim)
    $data = [
        'judul'         => 'Admin - Edit Slides',
        'slides'        => $slides,
    ];
    $data['status_options'] = $this->Slides_model->get_enum_values('slides', 'status'); // Ambil opsi status

    // Tampilkan view edit
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_slides', $data);
    $this->load->view('admin/footer');
}



public function hapus_slides($id)
{
    $slide = $this->Slides_model->get_slides_by_id($id);
    if (!$slide) {
        show_404();
    }

    if ($slide->image !== 'default.jpg' && file_exists($slide->image)) {
        unlink($slide->image);
    }

    $this->Slides_model->delete_slide($id);
    $this->session->set_flashdata('success', 'Slide berhasil dihapus.');
    redirect('admin/slides');
}

// Menampilkan halaman daftar menu
    public function menu() {
        $data = [
            'judul' => 'Admin - Menu',
            'menu'  => $this->Menu_model->get_all(),
        ];

        $this->load->view('admin/head', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('menu/menu', $data);
        $this->load->view('admin/footer');
    }

    // Menyimpan menu baru
    public function tambah_menu() {
        if ($_POST) {
            $data = [
                'title'   => $this->input->post('title', true),
                'slug'    => url_title($this->input->post('title'), 'dash', true),
            ];

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('success', 'Menu berhasil disimpan.');
        }
        redirect('admin/menu');
    }

    // Menampilkan form edit
    public function edit_menu($id) {
        $menu = $this->Menu_model->get_menu_by_id($id);

        if (!$menu) {
            show_404();
        }

        $data = [
            'judul' => 'Edit Menu',
            'menu'  => $menu
        ];

        $this->load->view('admin/head', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('admin/footer');
    }

    // Memperbarui data menu
    public function update_menu() {
        $id      = $this->input->post('id');
        $title   = $this->input->post('title', true);
        $slug    = $this->input->post('slug', true);

        if (empty($id) || empty($title) || empty($slug)) {
            $this->session->set_flashdata('error', 'Semua field harus diisi!');
            redirect('admin/edit_menu/' . $id);
            return;
        }

        $data = [
            'title'   => trim($title),
            'slug'    => trim($slug),
        ];

        $update = $this->Menu_model->update_menu($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Menu berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui menu.');
        }

        redirect('admin/menu');
    }

     // FRONTEND: Menampilkan menu berdasarkan slug
    public function menu_view($slug) {
        $menu = $this->Menu_model->get_by_slug($slug);

        if (!$menu) {
            show_404();
        }

        $data = [
            'title' => $menu->title,
            'menu' => $menu
        ];

        // Tampilan frontend
        $this->load->view('home/head', $data);
        $this->load->view('home/header', $data);
        $this->load->view('home', $data);
        $this->load->view('home/footer');
    }

    // Menghapus menu
    public function delete_menu($id) {
        $this->Menu_model->delete_menu($id);
        $this->session->set_flashdata('success', 'Data menu berhasil dihapus.');
        redirect('admin/menu');
    }

// METHOD CLIENT
public function clients() {

    // Ambil flashdata error dan success untuk ditampilkan di view
    $data['error'] = $this->session->flashdata('error');
    $data['success'] = $this->session->flashdata('success');
    
    $data = [
        'judul' => 'Admin - Manajemen clients',
        'username' => $this->session->userdata('username'),
        'avatar'   => $this->session->userdata('avatar'),
        'clients' => $this->Clients_model->get_all_clients()
    ];
    // Load view list galeri
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/clients', $data);
    $this->load->view('admin/footer');
}

public function tambah_clients() {
    // Cek apakah ada data POST yang dikirim untuk menambahkan client
    if ($this->input->post()) {
        // Mendapatkan waktu saat ini untuk created_at dan updated_at
        $date_now = date('Y-m-d H:i:s');
        $image = '';
        $image_name = $this->input->post('image_name');  // Mendapatkan nama gambar dari form, jika ada

        // Proses upload gambar jika ada
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/clients/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 5048; // Maksimal 2MB
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            // Inisialisasi upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/clients/' . $upload_data['file_name'];
                // Jika nama gambar kosong, kita set nama gambar default dengan nama file yang diupload
                if (empty($image_name)) {
                    $image_name = $upload_data['file_name'];
                }
            } else {
                // Jika gagal upload, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                redirect('admin/clients');
                return; // Pastikan fungsi dihentikan agar tidak melanjutkan ke proses insert
            }
        }

        // Data yang akan disimpan ke database
        $data = [
            'image'        => $image,
            'image_name'   => $image_name,  // Menyimpan nama gambar
            'created_at'   => $date_now,    // Menyimpan created_at
            'updated_at'   => $date_now,    // Menyimpan updated_at saat pertama kali insert
        ];

        // Debug: cek data yang akan disimpan
        log_message('debug', 'Data yang akan disimpan: ' . print_r($data, true));

        // Simpan client ke database
        $insert = $this->Clients_model->insert_clients($data);

        // Beri feedback kepada user
        if ($insert) {
            $this->session->set_flashdata('success', 'Client berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan client.');
        }

        // Redirect ke halaman daftar client setelah insert
        redirect('admin/clients');
    }
}


public function edit_clients($id) {
    // Ambil data client berdasarkan ID
    $clients = $this->Clients_model->get_clients_by_id($id);

    if (!$clients) {
        $this->session->set_flashdata('error', 'Client tidak ditemukan.');
        return redirect('admin/clients');
    }

    // Jika form disubmit
    if ($this->input->post()) {
        // Ambil data dari form POST dengan XSS Filtering
        $image_name = $this->input->post('image_name', true);

        // Default image (gambar lama)
        $image = $clients->image;

        // Proses upload gambar baru (jika ada)
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './temp_admin/assets/clients/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image = 'temp_admin/assets/clients/' . $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($clients->image) && file_exists('./' . $clients->image)) {
                    unlink('./' . $clients->image); // Menghapus gambar lama dari server
                }
            } else {
                // Gagal upload
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                return redirect('admin/clients/edit/' . $id); // Redirect kembali ke halaman edit
            }
        }

        // Data yang akan diupdate ke database
        $update_data = [
            'image_name' => $image_name, // Menyimpan nama gambar yang diinputkan
            'image'      => $image,      // Menyimpan path gambar
            'updated_at' => date('Y-m-d H:i:s'), // Waktu update
        ];

        // Update client melalui model
        $update = $this->Clients_model->update_clients($id, $update_data);

        if ($update) {
            $this->session->set_flashdata('success', 'Client berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui client.');
        }

        return redirect('admin/clients');
    }

    // Data untuk view (jika form belum dikirim)
    $data = [
        'judul'    => 'Admin - Edit Client', // Judul halaman
        'clients'   => $clients,              // Data client yang akan diedit      
        'username' => $this->session->userdata('username'),
        'avatar'   => $this->session->userdata('avatar'),
    ];

    // // Tampilkan view edit
    $this->load->view('admin/head', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_clients', $data);
    $this->load->view('admin/footer');
}



public function hapus_clients($id)
{
    $clients = $this->Clients_model->delete_clients($id);

    if (!$clients) {
        $this->session->set_flashdata('error', 'Data clients tidak ditemukan.');
        redirect('admin/clients');
        return;
    }

    // Mengakses properti sebagai objek
    if (!empty($clients->image) && $clients->image !== 'default.jpg') {
        $file_path = FCPATH . $clients->image;

        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    $deleted = $this->Clients_model->delete_clients($id);

    if ($deleted) {
        $this->session->set_flashdata('success', 'clients berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus clients.');
    }

    redirect('admin/clients');
}
}
