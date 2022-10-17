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
  public function detail_santri($id)
  {
    $data['title'] = 'Santri Berprestasi';
    $data['detail'] = $this->santri->get_data_perlimit($id);
    $data['detail'] = $this->santri->ambil($id);
    $result               = $this->santri->get_data($id);
    $$data['pesantrenid']  = $result['pesantrenid'];
    $data['nis']          = $result['nis'];
    $data['nama']         = $result['nama'];
    $data['tmpLahir']     = $result['tmpLahir'];
    $data['tglLahir']     = $result['tglLahir'];
    $data['nohp']         = $result['nohp'];
    $data['alamat']       = $result['alamat'];
    $data['pasPhoto']       = config_item('base_url') . "asset/pasphoto/" . $result['pasPhoto'];


    // $this->template->view('template', 'santri/santri_detail', $data);
  }

  public function entry($id = "")
  {


    if ($id == "") {
      $data['title']        = 'Form Input Santri';
      $data['subtitle']     = 'Form Input <span class="font-weight-semibold">-Santri';
      $data['santriid']     = '';
      $data['adminid']      = '';
      $data['pesantrenid']  = '';
      $data['nis']          = '';
      $data['nama']         = '';
      $data['tmpLahir']     = '';
      $data['tglLahir']     = date("Y-m-d");
      $data['nohp']         = '';
      $data['alamat']       = '';
      $data['pasPhoto']       = '';
      $data['tombol']       = 'Tambah';
    } else {
      $data['title']        = 'Form Edit Santri';
      $data['subtitle']     = 'Form Edit <span class="font-weight-semibold">-Santri';
      $result               = $this->santri->get_data($id);
      $data['santriid']     = $id;
      $data['nis']          = $result['nis'];
      $data['nama']         = $result['nama'];
      $data['tmpLahir']     = $result['tmpLahir'];
      $data['tglLahir']     = $result['tglLahir'];
      $data['nohp']         = $result['nohp'];
      $data['alamat']       = $result['alamat'];
      $data['pasPhoto']       = config_item('base_url') . "asset/pasphoto/" . $result['pasPhoto'];
      $data['tombol']       = 'Edit';
    }
    $this->template->view('template', 'santri/santri_entry', $data);
  }
  // Function Proses
  public function proses()
  {
    $this->db->trans_start();
    $santriid     = $this->input->post('santriid') ? $this->input->post('santriid') : "";
    $adminid      = $this->session->userdata('adminid');
    $pesantrenid  = $this->session->userdata('pesantrenid');
    $nis          = $this->input->post('nis');
    $nama         = $this->input->post('nama');
    $tmpLahir     = $this->input->post('tmpLahir');
    $tglLahir     = explode_tanggal_datepicker($this->input->post('tglLahir'));
    $nohp         = $this->input->post('nohp');
    $alamat       = $this->input->post('alamat');

    $insert_data = array(
      'adminid'        => $adminid,
      'pesantrenid'    => $pesantrenid,
      'nis'            => $nis,
      'nama'           => $nama,
      'tmpLahir'       => $tmpLahir,
      'tglLahir'       => $tglLahir,
      'nohp'           => $nohp,
      'alamat'         => $alamat
    );
    if ($santriid == "") {
      if ($this->santri->search_data($nis) > 0) {
        $this->session->set_flashdata('error' . $nis . ' sudah ada harap gunakan NIS lain');
        redirect('santris/entry');
        die();
      }
      $pasPhoto = null;
      if ($_FILES['pasPhoto']['name'] != "") {
        // Upload Gambar
        $config['upload_path'] = './asset/pasphoto/';
        $config['allowed_types'] = 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['file_name'] = 'pasPhoto_' . time();
        $this->upload->initialize($config);
        if ($this->upload->do_upload('pasPhoto')) {
          $pasPhoto = $this->upload->data('file_name');
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path . $pasPhoto;
          $config2['maintain_ratio'] = true;
          $config['width'] = 70;
          $config['height'] = 70;
          $this->load->library('image_lib', $config2);
          $this->image_lib->resize();
        }
      }
      // insert data
      $insert_data['pasPhoto'] = $pasPhoto;
      $this->global_model->insert('santri', $insert_data);
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil <a href="#" class="alert-link">Ditambah</a></div>');
      redirect('santris');
    } else {
      $result = $this->santri->get_data($santriid);
      if ($this->santri->search_data($nis, $santriid) > 0) {
        $this->session->set_flashdata('error' . $nis . 'sudah ada harap gunakan NIS lain');
        redirect('santris/entry');
        die();
      }
      // Update Data
      $pasPhoto = $this->input->post('pasPhoto');
      if ($_FILES['pasPhoto']['name'] != "") {
        unlink('./asset/pasphoto/' . $result['pasPhoto']);
        // Upload Gambar
        $config['upload_path'] = './asset/pasphoto/';
        $config['allowed_types'] = 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['file_name'] = 'pasPhoto_' . time();
        $this->upload->initialize($config);
        if ($this->upload->do_upload('pasPhoto')) {
          $pasPhoto = $this->upload->data('file_name');
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path . $pasPhoto;
          $config2['maintain_ratio'] = true;
          $config['width'] = 70;
          $config['height'] = 70;
          $this->load->library('image_lib', $config2);
          $this->image_lib->resize();
        }
      }

      $update_data = array(
        'adminid'        => $adminid,
        'pesantrenid'    => $pesantrenid,
        'nis'            => $nis,
        'nama'           => $nama,
        'tmpLahir'       => $tmpLahir,
        'tglLahir'       => $tglLahir,
        'nohp'           => $nohp,
        'alamat'         => $alamat
      );

      if ($pasPhoto != "") {
        $update_data['pasPhoto'] = $pasPhoto;
      }
      // Update Data
      $this->global_model->update('santri', $update_data, array('id' => $santriid));
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
      redirect('santris');
    }
  }
  // public function delete($id)
  public function delete($id)
  {
    $result = $this->santri->get_data($id);
    $this->global_model->delete('santri', array('id' => $id));
    unlink('./asset/pasphoto/' . $result['pasPhoto']);
    echo "<script>window.history.go(-1);</script>";
    // flashdata
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Berhasil <a href="#" class="alert-link"> Dihapus</a></div>');
    redirect('santris');
  }
}

/* End of file: Santris.php */
