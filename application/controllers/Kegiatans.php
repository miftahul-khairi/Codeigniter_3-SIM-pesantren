<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatans extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    $this->load->model('kegiatan');
  }

  public function index()
  {
    $data['title'] = 'List Kegiatan';
    $data['result'] = $this->kegiatan->get_data();
    $this->template->view('template', 'kegiatan/kegiatan', $data);
  }
  public function detail_kegiatan($id)
  {
    $data['title'] = 'Santri Berprestasi';
    $data['detail'] = $this->kegiatan->get_data_perlimit($id);
    $data['detail'] = $this->kegiatan->ambil($id);


    $this->template->view('template', 'kegiatan/kegiatan_detail', $data);
  }
}

/* End of file: Kegiatans.php */
