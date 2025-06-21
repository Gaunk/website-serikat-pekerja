<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil user berdasarkan username
    public function get_user($username) {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
    }

    // Admin_model.php
public function get_all_users() {
    // Select the columns from 'users' and 'biodata' tables
    $this->db->select('users.id, users.username, users.email, users.role, users.avatar, 
                       biodata.name, biodata.status_keanggotaan, biodata.no_kta');
    $this->db->from('users');
    
    // LEFT JOIN the 'biodata' table on 'user_id'
    $this->db->join('biodata', 'biodata.user_id = users.id', 'left');
    
    // Execute the query and return the results as an array
    return $this->db->get()->result_array();
}

   
    // To update user role and status_keanggotaan in both users and biodata tables
        public function update_user_role($id, $data) {
            $this->db->where('id', $id);
            return $this->db->update('users', $data); // atau nama tabel yang digunakan
        }


    public function update_biodata_status($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('biodata', $data);
    }

    // Method untuk insert pengguna baru
    public function insert_pengguna($data) {
        return $this->db->insert('users', $data); // Ganti 'users' dengan nama tabel Anda
    }

    // Method untuk cek apakah username sudah ada
    public function cek_username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel Anda
        return $query->num_rows() > 0; // Jika ada baris yang ditemukan, artinya username sudah ada
    }

    // Update profile user baru
    public function update_profile($username, $data) {
    $this->db->where('username', $username);
    return $this->db->update('users', $data);
    }

    // Update password user baru
    public function update_password($username, $hashed_password) {
        return $this->update_profile($username, ['password' => $hashed_password]);
    }

     

    public function get_user_by_id($user_id) {
    // Make sure no_kta is part of the select statement
    return $this->db->get_where('users', ['id' => $user_id])->row_array();
}
public function get_no_kta_by_user_id($user_id) {
    // Query to get no_kta from the biodata or related table based on user_id
    $this->db->select('no_kta');
    $this->db->from('biodata');  // Or the table where no_kta is stored
    $this->db->where('user_id', $user_id);  // Assuming there is a user_id field in the biodata table
    $query = $this->db->get();

    // Return the 'no_kta' if exists
    if ($query->num_rows() > 0) {
        return $query->row()->no_kta;
    }

    return null;  // Return null if no_kta does not exist for the user
}
public function get_max_no_kta() {
    // Fetch the highest 'no_kta' from the 'users' table
    $this->db->select_max('no_kta');  // Select the maximum value of 'no_kta'
    $query = $this->db->get('users'); // Assuming 'no_kta' is in the 'users' table

    $result = $query->row();
    return $result ? $result->no_kta : 0;  // Return the highest 'no_kta' or 0 if none exists
}
public function is_no_kta_exists($no_kta) {
    $this->db->select('id');
    $this->db->from('biodata');
    $this->db->where('no_kta', $no_kta);
    $query = $this->db->get();
    return $query->num_rows() > 0;
}
// Admin_model.php
public function generate_next_no_kta() {
    // Fetch the last `no_kta` from the biodata table
    $this->db->select('no_kta');
    $this->db->from('biodata');
    $this->db->order_by('no_kta', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();

    // Check if there is any `no_kta` already
    $last_no_kta = $query->row_array();
    
    // If a no_kta is found, increment it
    if ($last_no_kta) {
        $last_number = (int) $last_no_kta['no_kta'];
        $next_no_kta = $last_number + 1;
    } else {
        // If no no_kta is found, start from 1
        $next_no_kta = 1;
    }

    return $next_no_kta;
}

public function count_is_active() {
    // Count users with is_blocked = 0 (active users) directly from the 'users' table
    $this->db->select('COUNT(*) as is_active');
    $this->db->from('users');
    $this->db->where('users.is_blocked', 0);  // Filter for active users (is_blocked = 0)
    $query = $this->db->get();
    
    $result = $query->row();  // Fetch the result row
    return $result->is_active;  // Return the count of active users
}

public function count_total_users() {
    // Count all rows in the 'users' table
    return $this->db->count_all('users');
}
public function count_is_blocked() {
    // Count users with is_blocked = 1 (inactive or blocked users) directly from the 'users' table
    $this->db->select('COUNT(*) as is_blocked');
    $this->db->from('users');
    $this->db->where('users.is_blocked', 1);  // Filter for blocked/inactive users (is_blocked = 1)
    $query = $this->db->get();
    
    $result = $query->row();  // Fetch the result row
    return $result->is_blocked;  // Return the count of blocked users
}



// In Admin_model.php
public function update_biodata_no_kta($user_id, $data) {
    // Update the biodata table based on user_id and the provided data
    $this->db->where('user_id', $user_id); // Make sure you're updating the correct user
    return $this->db->update('biodata', $data); // Update the 'biodata' table with the provided data
}

    public function get_biodata($user_id) {
    return $this->db->get_where('biodata', ['user_id' => $user_id])->row_array();
    }

    public function get_all_biodata() {
        return $this->db->get('biodata')->result_array();
    }


    public function update_biodata($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('biodata', $data);
    }

    public function insert_biodata($data) {
    return $this->db->insert('biodata', $data);
    }

    public function delete_user($id) {
    return $this->db->delete('users', ['id' => $id]);
}


// BLOCK MODEL BERITA
// Ambil semua berita
public function get_all_berita() {
    return $this->db->get('berita')->result_array();
}

// Ambil berita berdasarkan ID
public function get_berita_by_id($id) {
    return $this->db->get_where('berita', ['id' => $id])->row_array();
}

// Menyimpan berita baru
public function insert_berita($data) {
    return $this->db->insert('berita', $data);
}

// Update berita
public function update_berita($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('berita', $data);
}

// Hapus berita
public function delete_berita($id) {
    $this->db->where('id', $id);
    return $this->db->delete('berita');
}



    

}
