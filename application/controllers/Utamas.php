<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utamas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_session('admin');
    $this->load->model(array('utama'));
  }

  public function index()
  {
    if ($this->session->userdata('level') == 'admin') {

      $data['title'] = "Dashboard Admin";
      $this->template->view('template', 'homeadmin', $data);
    } else {

      $adminid            = $this->session->userdata('adminid');
      $result         = $this->utama->get_data($adminid);
      $data['result'] = $result;
      $this->template->view('template', 'profil/profil', $data);
    }
  }
}

/* End of file: Utamas.php */
