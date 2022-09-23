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


    $this->template->view('template', 'alumni/alumni_detail', $data);
  }
  public function entry($id = "")
  {

    $data['dropdown_santri'] = dropdown_santri();
    if ($id == "") {
      $data['title']                   = 'Form Input Alumni';
      $data['subtitle']                = 'Form Input <span class="font-weight-semibold">-Alumni';
      $data['alumniid']                = '';
      $data['santriid']                = '';
      $data['tahunTamat']              = date("Y");
      $data['tombol']                  = 'Tambah';
    } else {
      $data['title']                   = 'Form Edit Alumni';
      $data['subtitle']                = 'Form Edit <span class="font-weight-semibold">-Alumni';
      $result                          = $this->alumni->get_data($id);
      $data['alumniid']                = $id;
      $data['santriid']                = $result['santriid'];
      $data['tahunTamat']              = $result['tahunTamat'];
      $data['tombol']                  = 'Edit';
    }
    $this->template->view('template', 'alumni/alumni_entry', $data);
  }

  // function preses
  public function proses()
  {
    $this->db->trans_start();
    $alumniid     = $this->input->post('alumniid') ? $this->input->post('alumniid') : "";
    $santriid     = $this->input->post('santriid');
    $pesantrenid  = $this->session->userdata('pesantrenid');
    $adminid      = $this->session->userdata('adminid');
    $tahunTamat   = $this->input->post('tahunTamat');

    $return_data = array(
      'santriid'            => $santriid,
      'pesantrenid'         => $pesantrenid,
      'adminid'             => $adminid,
      'tahunTamat'          => $tahunTamat
    );
    if ($alumniid == "") {
      $this->global_model->insert('alumni', $return_data);
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Ditambah</a></div>');
    } else {
      $this->global_model->update('alumni', $return_data, array('id' => $alumniid));
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
    }
    redirect('alumnis');
  }
  // Function Delete
  public function delete($id)
  {
    $this->global_model->delete('alumni', array('id' => $id));
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
       <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Berhasil <a href="#" class="alert-link"> Dihapus</a></div>');
    echo "<script>window.history.go(-1);</script>";
    redirect('alumnis');
  }
}

/* End of file: Alumnis.php */
