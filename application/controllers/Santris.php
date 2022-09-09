<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santris extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    $this->load->model('santri');
  }

  public function index()
  {
    $data['title'] = 'List Data Satri';
    $data['result'] = $this->santri->get_data();
    $this->template->view('template', 'santri/santri', $data);
  }
}

/* End of file: Santris.php */
