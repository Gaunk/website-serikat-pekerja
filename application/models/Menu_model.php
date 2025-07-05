<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function get_all() {
        return $this->db->get('menu')->result();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('menu', ['slug' => $slug])->row();
    }

    public function insert($data) {
        return $this->db->insert('menu', $data);
    }

    public function update_menu($id, $data) {
    return $this->db->where('id', $id)->update('menu', $data);
    }
    
    public function get_menu_by_id($id) {
    return $this->db->get_where('menu', ['id' => $id])->row();
    }

    public function delete_menu($id) {
        return $this->db->where('id', $id)->delete('menu');
    }

}
