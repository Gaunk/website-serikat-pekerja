<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slides_model extends CI_Model {

    private $table = 'slides';

    public function get_all_slides()
    {
        return $this->db->order_by('id', 'DESC')->get('slides')->result_array();
    }


    public function get_slides_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert_slides($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_slides($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_enum_values($table, $field)
    {
        $query = $this->db->query("SHOW COLUMNS FROM `$table` LIKE '$field'");
        $row = $query->row();
        preg_match('/^enum\((.*)\)$/', $row->Type, $matches);
        $enum = str_getcsv($matches[1], ',', "'");
        return $enum;
    }

    public function delete_slide($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
