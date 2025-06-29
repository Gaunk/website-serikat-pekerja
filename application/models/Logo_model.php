<?php

class Logo_model extends CI_Model {
    // Fungsi untuk mendapatkan logo
    public function get_logo() {
        return $this->db->get('logo')->row();  // Mengambil 1 baris data logo
    }

    // Fungsi untuk menyimpan logo baru
    public function insert_logo($data) {
        return $this->db->insert('logo', $data);  // Menyimpan logo baru
    }

    // Fungsi untuk memperbarui logo yang sudah ada
    public function update_logo($data, $id)
    {
        return $this->db->where('id', $id)->update('logo', $data);
        // Ganti 'logo_table' dengan nama tabel Anda
    }
}

