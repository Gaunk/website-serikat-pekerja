<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Seo_model extends CI_Model {
        protected $table = 'seo';

    public function __construct()
    {
        parent::__construct();
    }
    public function insert_seo($data)
    {
        return $this->db->insert('seo', $data);
    }

    public function get_seo_data()
    {
        return $this->db->get_where('seo', ['id' => 1])->row_array(); // Asumsikan id 1
    }

    public function get_all_seo()
    {
        return $this->db->get('seo')->result_array(); // Ambil semua baris SEO
    }

    public function get_seo_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function delete_seo($id)
    {
        return $this->db->delete('seo', ['id' => $id]);
    }


    public function update_seo($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // BLOCK PROFILE
   // Ambil data profil
public function get_profile()
{
    return $this->db->get('website_profile')->row_array();
}


// Ambil data SEO pertama (anggap hanya satu data yang disimpan)
public function get_site_web()
{
    return $this->db->get('website_profile')->row();
}

// Insert data SEO
public function insert_site_web($data)
{
    $this->db->insert('website_profile', $data);
}

// Update data SEO berdasarkan id
public function update_site_web($id, $data)
{
    $this->db->where('id', $id);
    $this->db->update('website_profile', $data);
}

// BLOCK LOGO




}
