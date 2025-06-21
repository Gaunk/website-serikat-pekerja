<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk meng-upload gambar
    public function upload_image($field_name) {
        $config['upload_path'] = './uploads/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['file_name'] = uniqid('image_'); // Nama file unik

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors(); // Tampilkan error upload jika gagal
        }
    }

    // Fungsi untuk membuat slug berdasarkan judul berita
    public function create_slug($judul) {
        return url_title($judul, 'dash', TRUE);
    }

    // Menambahkan berita ke database
    public function insert_berita($data) {
        $this->db->insert('berita', $data);
    }

    // Mengambil semua berita
    public function get_all_berita() {
        return $this->db->get('berita')->result_array();
    }

    // Mengambil berita berdasarkan ID
    public function get_berita_by_id($id) {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }

    // Memperbarui berita
    public function update_berita($id, $data) {
        $this->db->update('berita', $data, ['id' => $id]);
    }

    // Menghapus berita
    public function delete_berita($id) {
        $this->db->delete('berita', ['id' => $id]);
    }

    public function get_berita_by_slug($slug) {
    return $this->db->get_where('berita', ['slug' => $slug])->row_array();
}

}

