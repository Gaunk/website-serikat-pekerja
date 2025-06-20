<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil user berdasarkan username
    public function get_user($username) {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
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


    public function update_user_role($id, $role) {
        $this->db->where('id', $id);
        $this->db->update('users', ['role' => $role]);

        return $this->db->affected_rows() > 0;
    }

    // (Opsional) Mendapatkan semua user
    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }


    public function get_user_by_id($user_id) {
    return $this->db->get_where('users', ['id' => $user_id])->row_array();
}

    public function get_biodata($user_id) {
    return $this->db->get_where('biodata', ['user_id' => $user_id])->row_array();
}

public function update_biodata($user_id, $data) {
    $this->db->where('user_id', $user_id);
    return $this->db->update('biodata', $data);
}

public function insert_biodata($data) {
    return $this->db->insert('biodata', $data);
}





    

}
