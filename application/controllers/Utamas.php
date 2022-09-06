<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utamas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "Dashboard Admin Kanwil";
    $this->template->view('template', 'home', $data);
  }
}

/* End of file: Utamas.php */
