<?php
class Galeri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_galeri() {
        return $this->db->get('galeri')->result();
    }

    public function get_galeri_by_id($id) {
        return $this->db->get_where('galeri', ['id' => $id])->row();
    }

    public function insert_galeri($data) {
    return $this->db->insert('galeri', $data); // Pastikan nama tabel 'galeri'
    }


    public function update_galeri($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('galeri', $data);
    }

    

    public function delete_galeri($id) {
        $this->db->where('id', $id);
        return $this->db->delete('galeri');
    }

    public function get_active_sliders($limit = 3) {
    return $this->db->where('status', 'aktif')
                    ->order_by('date_created', 'DESC')
                    ->limit($limit)
                    ->get('slider')
                    ->result_array();
    }

    

}
