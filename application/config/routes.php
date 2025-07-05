<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ROUTING UNTUK ADMIN
// Untuk akses http://localhost/re/admin
$route['auth'] = 'auth'; // misalnya auth adalah halaman awal login
$route['admin'] = 'admin/admin/index';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/settings'] = 'admin/admin/settings';
$route['admin/biodata'] = 'admin/admin/biodata';
$route['admin/update_biodata'] = 'admin/admin/update_biodata';
$route['admin/update_profile'] = 'admin/admin/update_profile';
// ROUTING UNTUK USER
$route['user'] = 'user/user/dashboard'; // akses: /user
$route['user/dashboard'] = 'user/user/dashboard'; // akses: /user/dashboard
// ROUTING UNTUK PENGGUNA
$route['admin/pengguna'] = 'admin/admin/pengguna';
$route['admin/tambah_pengguna'] = 'admin/admin/tambah_pengguna';
$route['admin/update_role_pengguna/(:num)'] = 'admin/admin/update_role_pengguna/$1';
$route['admin/hapus_pengguna/(:num)'] = 'admin/admin/hapus_pengguna/$1';
$route['admin/settings'] = 'admin/admin/settings';
$route['admin/change_password'] = 'admin/admin/change_password';
// ROUTING UNTUK BERITA
$route['admin/berita'] = 'admin/admin/berita';  // admin dashboard page
$route['admin/tambah_berita'] = 'admin/admin/tambah_berita';  // Page to add new admin
$route['admin/edit_berita/(:num)'] = 'admin/admin/edit_berita/$1'; // edit berita
$route['admin/hapus_berita/(:num)'] = 'admin/admin/hapus_berita/$1';  // Delete page for a specific admin (if needed)
$route['admin/detail/(:any)'] = 'admin/detail/$1';
// 
$route['admin/seo'] = 'admin/admin/seo';
$route['admin/simpan_seo']  = 'admin/admin/simpan_seo';     // Aksi update SEO
$route['admin/edit_seo/(:num)'] = 'admin/admin/edit_seo/$1';
$route['admin/delete_seo/(:num)'] = 'admin/admin/delete_seo/$1';
$route['admin/update_seo'] = 'admin/admin/update_seo';
// PROFILE WEBSITE COY
$route['admin/profile_website'] = 'admin/admin/profile_website';
$route['admin/insert_website'] = 'admin/admin/insert_website';
$route['admin/save_logo'] = 'admin/admin/save_logo';
// 
$route['home/(:any)'] = 'home/index/$1'; // menangani slug menu
$route['default_controller'] = 'home';

$route['admin/menu'] = 'admin/admin/menu';
$route['admin/tambah_menu'] = 'admin/admin/tambah_menu';
$route['admin/edit_menu/(:num)'] = 'admin/admin/edit_menu/$1';
$route['admin/delete_menu/(:num)'] = 'admin/admin/delete_menu/$1';
$route['admin/update_menu'] = 'admin/admin/update_menu';

//
$route['admin/generator'] = 'admin/admin/generator';
// 
$route['admin/galeri'] = 'admin/admin/galeri';
$route['admin/tambah_galeri'] = 'admin/admin/tambah_galeri';
$route['admin/edit_galeri/(:num)'] = 'admin/admin/edit_galeri/$1';
$route['admin/hapus_galeri/(:num)'] = 'admin/admin/hapus_galeri/$1';
// 
$route['admin/clients'] = 'admin/admin/clients';
$route['admin/tambah_clients'] = 'admin/admin/tambah_clients';
$route['admin/edit_clients/(:num)'] = 'admin/admin/edit_clients/$1';
$route['admin/hapus_clients/(:num)'] = 'admin/admin/hapus_clients/$1';
// 
$route['admin/slides'] = 'admin/admin/slides';
$route['admin/tambah_slides'] = 'admin/admin/tambah_slides';
$route['admin/edit_slides/(:num)'] = 'admin/admin/edit_slides/$1';
$route['admin/hapus_slides/(:num)'] = 'admin/admin/hapus_slides/$1';

// Tambahkan Route Update Profile
$route['user/update_profile'] = 'user/user/update_profile'; // akses: /user/update_profile
$route['user/biodata'] = 'user/user/biodata';                // Untuk menampilkan halaman biodata
$route['user/update_biodata'] = 'user/user/update_biodata';  // Untuk memperbarui biodata
$route['user/settings'] = 'user/user/settings';
// ROUTING UNTUK AUTH
$route['auth'] = 'auth/index'; // akses: /auth
$route['auth/login'] = 'auth/login'; // akses: /auth/login
$route['auth/register'] = 'auth/register'; // akses: /auth/register
$route['auth/logout'] = 'auth/logout'; // akses: /auth/logout



// 404 dan lainnya
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
