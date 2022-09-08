<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesantrens extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pesantren');
  }

  public function index()
  {
    $data['title'] = 'Management Data Pesantren';
    $data['result'] = $this->pesantren->get_data();
    $this->template->view('template', 'pesantren/pesantren', $data);
  }

  public function entry($id = "")
  {
    if ($id == "") {
      $data['title'] = "Form Input pesantren";
      $data['pesantrenid'] = '';
      $data['tombol']      = 'Tambah';
      $data['namap']     = '';
      $data['alamat']     = '';
      $data['nohp']   = '';
    } else {
      $data['title'] = "Form Edit Pesantren";
      $result              = $this->pesantren->get_data($id);
      $data['pesantrenid'] = $id;
      $data['tombol']      = 'Edit';
      $data['namap']     = $result['namap'];
      $data['alamat']     = $result['alamat'];
      $data['nohp']     = $result['nohp'];
    }

    $this->template->view('template', 'pesantren/pesantren_entry', $data);
  }
  // Function Proses 
  public function proses()
  {
    $this->db->trans_start();
    $pesantrenid = $this->input->post('pesantrenid') ? $this->input->post('pesantrenid') : "";
    $namap = $this->input->post('namap');
    $alamat = $this->input->post('alamat');
    $nohp = $this->input->post('nohp');

    $return_data = array(
      'namap' => $namap,
      'alamat' => $alamat,
      'nohp'  => $nohp
    );

    if ($pesantrenid == "") {
      // Inset Data
      $this->global_model->insert('pesantren', $return_data);
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil <a href="#" class="alert-link"> Ditambah</a></div>');
    } else {
      // Update Data
      $this->global_model->update('pesantren', $return_data, array('id' => $pesantrenid));
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
    }
    redirect('pesantrens');
  }
  // Function Delete Data pesantren
  public function delete($id)
  {
    $cek = $this->global_model->get('admin', '*', array('pesantrenid' => $id));
    if (count($cek) > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
       <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Tidak bisa di Hapus, <a href="#" class="alert-link"> dikarenakan pesantren sudah digunakan</a></div>');
      redirect('pesantrens');
    } else {
      $this->global_model->delete('pesantren', array('id' => $id));
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
       <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Berhasil <a href="#" class="alert-link"> Dihapus</a></div>');
      echo "<script>window.history.go(-1);</script>";
      redirect('pesantrens');
    }
  }
}

/* End of file: Pesantrens.php */
