<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menambahkan client ke database
    public function insert_clients($data) {
    // Memasukkan data ke database
    $this->db->insert('clients', $data);  // Asumsikan tabel 'clients' memiliki kolom 'created_at' dan 'updated_at'
    return $this->db->affected_rows() > 0;
}


    // Mendapatkan semua data client
    public function get_all_clients() {
        return $this->db->get('clients')->result_array();
    }

    // Mengambil data client berdasarkan ID
    public function get_clients_by_id($id) {
        return $this->db->get_where('clients', ['id' => $id])->row_array();
    }

    // Mengupdate data client berdasarkan ID
    public function update_clients($id, $data) {
        return $this->db->update('clients', $data, ['id' => $id]);
    }

    // Menghapus data client berdasarkan ID
    public function delete_clients($id) {
        return $this->db->delete('clients', ['id' => $id]);
    }
}
