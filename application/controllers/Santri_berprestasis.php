<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri_berprestasis extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('santri_berprestasi');
  }

  public function index()
  {
    $data['title'] = 'Santri Berprestasi';
    $data['result'] = $this->santri_berprestasi->get_data();
    $this->template->view('template', 'santriberprestasi/santriberprestasi', $data);
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
  // function preses
  public function proses()
  {
    $this->db->trans_start();
    $santriberprestasiid      = $this->input->post('santriberprestasiid') ? $this->input->post('santriberprestasiid') : "";
    $santriid                 = $this->input->post('santriid');
    $adminid                  = $this->session->userdata('adminid');
    $keterangan               = $this->input->post('keterangan');
    $isi                      = $this->input->post('isi');

    $return_data = array(
      'santriid'            => $santriid,
      'adminid'             => $adminid,
      'keterangan'          => $keterangan,
      'isi'                 => $isi
    );
    if ($santriberprestasiid == "") {
      $this->global_model->insert('santriberprestasi', $return_data);
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Ditambah</a></div>');
    } else {
      $this->global_model->update('santriberprestasi', $return_data, array('id' => $santriberprestasiid));
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
    }
    redirect('santri_berprestasis');
  }
  // Function Delete
  public function delete($id)
  {
    $this->global_model->delete('santriberprestasi', array('id' => $id));
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
       <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Berhasil <a href="#" class="alert-link"> Dihapus</a></div>');
    echo "<script>window.history.go(-1);</script>";
  }
}

/* End of file: Santri_Berprestasis.php */
