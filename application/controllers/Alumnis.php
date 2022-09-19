<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumnis extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    $this->load->model('alumni');
  }

  public function index()
  {
    $data['title'] = 'Alumni';
    $data['result'] = $this->alumni->get_data();
    $this->template->view('template', 'alumni/alumni', $data);
  }
  public function detail_santri($id)
  {
    $data['title']  = 'Santri Berprestasi';
    $data['detail'] = $this->santri_berprestasi->get_data_perlimit($id);
    $data['detail'] = $this->santri_berprestasi->ambil($id);


    $this->template->view('template', 'santriberprestasi/santriberprestasi_detail', $data);
  }
  public function entry($id = "")
  {

    $data['dropdown_santri'] = dropdown_santri();
    if ($id == "") {
      $data['title']                   = 'Form Input Santri Berprestasi';
      $data['subtitle']                = 'Form Input <span class="font-weight-semibold">-Santri Berprestasi';
      $data['santriberprestasiid']     = '';
      $data['santriid']                = '';
      $data['keterangan']              = '';
      $data['isi']                     = '';
      $data['tombol']                  = 'Tambah';
    } else {
      $data['title']                   = 'Form Edit Santri Berprestasi';
      $data['subtitle']                = 'Form Edit <span class="font-weight-semibold">-Santri Berprestasi';
      $result                          = $this->santri_berprestasi->get_data($id);
      $data['santriberprestasiid']     = $id;
      $data['santriid']                = $result['santriid'];
      $data['keterangan']              = $result['keterangan'];
      $data['isi']                     = $result['isi'];
      $data['tombol']                  = 'Edit';
    }
    $this->template->view('template', 'santriberprestasi/santriberprestasi_entry', $data);
  }
}

/* End of file: Alumnis.php */
