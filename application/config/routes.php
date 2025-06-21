<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

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
$route['admin/hapus_pengguna/(:num)'] = 'admin/Admin/hapus_pengguna/$1';
$route['admin/settings'] = 'admin/admin/settings';
$route['admin/change_password'] = 'admin/admin/change_password';
// ROUTING UNTUK BERITA
$route['admin/berita'] = 'admin/admin/berita';  // admin dashboard page
$route['admin/tambah_berita'] = 'admin/admin/tambah_berita';  // Page to add new admin
$route['admin/edit_berita/(:num)'] = 'admin/admin/edit_berita/$1';  // Edit page for a specific admin (if needed)
$route['admin/hapus_berita/(:num)'] = 'admin/admin/hapus_berita/$1';  // Delete page for a specific admin (if needed)
$route['admin/detail/(:any)'] = 'admin/detail/$1';

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
