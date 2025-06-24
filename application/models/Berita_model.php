<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// EDAN KOPI BEAK 5 TAPI ASA GREGET JADI LIEURCODING
class Berita_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   public function get_all_kategori()
{
    return $this->db->get('kategori')->result_array();
}

    // Function untuk mengambil semua kategori dengan informasi berita yang terkait
public function get_all_kategori_with_berita() {
    // Query untuk mengambil data kategori dan berita terkait
    $this->db->select('kategori.id as kategori_id, kategori.nama as kategori_name, berita.id as berita_id, berita.judul, berita.konten');
    $this->db->from('kategori');
    $this->db->join('berita', 'berita.kategori_id = kategori.id', 'left'); // LEFT JOIN untuk memastikan semua kategori diambil
    $query = $this->db->get();
    
    // Mengembalikan hasil query dalam bentuk array
    return $query->result_array();
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

    public function get_all_berita()
{
    $this->db->select('berita.*, kategori.nama_kategori');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id = berita.kategori_id', 'left');
    $this->db->order_by('berita.created_at', 'DESC');
    return $this->db->get()->result_array();
}

  public function get_berita_by_id($id) {
    $this->db->select('berita.*, kategori.nama_kategori');
    $this->db->from('berita');
    $this->db->join('kategori', 'berita.kategori_id = kategori.id', 'left');
    $this->db->where('berita.id', $id);
    $query = $this->db->get();

    return $query->num_rows() > 0 ? $query->row_array() : false;
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

