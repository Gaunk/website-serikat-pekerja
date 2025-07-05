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
        'User_model','Slides_model', 'Logo_model', 'Menu_model', 'Clients_model'
        ]);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);

        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form', 'seo']); // tambahkan helper SEO jika ingin pakai otomatis

    }

  public function index($slug = null)
{
    $berita   = $this->Berita_model->get_all_berita();
    $profile  = $this->Seo_model->get_profile();
    $logo     = $this->Logo_model->get_logo();
    $clients   = $this->Clients_model->get_all_clients();
    // Jika ada slug, tampilkan halaman menu
    if ($slug !== null) {
        $menu = $this->Menu_model->get_by_slug($slug);
        if (!$menu) show_404();

        $data = [
            'judul'   => $menu->title,
            'menu'    => $menu,
            'content' => $menu->content,
            'berita'  => $berita,
            'profile' => $profile,
            'logo'    => $logo,
            'clients' => $clients
        ];

        $this->load->view('home/head', $data);
        $this->load->view('home/header', $data);
        $this->load->view('home/menu_view', $data); // tampilkan konten halaman dinamis
        $this->load->view('home/footer');
        return;
    }

    // Jika tidak ada slug, tampilkan halaman utama (beranda)
    $data = [
        'judul'   => 'Beranda',
        'berita'  => $berita,
        'profile' => $profile,
        'logo'    => $logo,
        'clients' => $clients
    ];

    $this->load->view('home/head', $data);
    $this->load->view('home/header', $data);
    $this->load->view('home', $data); // tampilkan homepage
    $this->load->view('home/footer');
}


}
