<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function page_missing() {
        // Menggunakan view kustom 404
        $this->load->view('custom_404');
    }
}
