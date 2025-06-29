<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model([
        'Admin_model',
        'Berita_model',
        'Galeri_model',
        'Seo_model',
        'User_model','Slides_model', 'Logo_model'
        ]);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);

        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form', 'seo']); // tambahkan helper SEO jika ingin pakai otomatis

    }

  public function index()
    {
        // Ambil data berita dan kategori
        $berita   = $this->Berita_model->get_all_berita();
        // Ambil data profil website
        $profile = $this->Seo_model->get_profile();
        $logo = $this->Logo_model->get_logo(); // Ambil logo dari database
        // Siapkan data untuk view
        $data = [
            'judul'            => 'Beranda',
            'berita'           => $berita,
            'profile'          => $profile,
            'logo'          => $logo,
        ];

        // Load view dengan semua data
        $this->load->view('home/head', $data);
        $this->load->view('home/header', $data);
        $this->load->view('home', $data);
        $this->load->view('home/footer');
    }

}
