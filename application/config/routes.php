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
// routes.php
$route['admin/pengguna'] = 'admin/admin/pengguna';
$route['admin/tambah_pengguna'] = 'admin/admin/tambah_pengguna';
$route['admin/update_role_pengguna/(:num)'] = 'admin/admin/update_role_pengguna/$1';
$route['admin/hapus_pengguna/(:num)'] = 'admin/Admin/hapus_pengguna/$1';

// 
$route['admin/settings'] = 'admin/admin/settings';
$route['admin/change_password'] = 'admin/admin/change_password';

// ROUTING UNTUK USER
$route['user'] = 'user/user/dashboard'; // akses: /user
$route['user/dashboard'] = 'user/user/dashboard'; // akses: /user/dashboard

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
