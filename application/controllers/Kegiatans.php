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
  public function entry($id = "")
  {


    if ($id == "") {
      $data['title']        = 'Form Input Kegiatan';
      $data['subtitle']     = 'Form Input <span class="font-weight-semibold">-Kegiatan';
      $data['kegiatanid']   = '';
      $data['judul']        = '';
      $data['deskripsi']    = '';
      $data['isi']          = '';
      $data['tanggal']      = date("Y-m-d");
      $data['gambar']       = '';
      $data['tombol']       = 'Tambah';
    } else {
      $data['title']        = 'Form Edit Kegiatan';
      $data['subtitle']     = 'Form Edit <span class="font-weight-semibold">-Kegiatan';
      $result               = $this->kegiatan->get_data($id);
      $data['kegiatanid']   = $id;
      $data['judul']        = $result['judul'];
      $data['deskripsi']    = $result['deskripsi'];
      $data['isi']          = $result['isi'];
      $data['tanggal']      = $result['tanggal'];
      $data['gambar']       = config_item('base_url') . "asset/gkegiatan/" . $result['gambar'];
      $data['tombol']       = 'Edit';
    }
    $this->template->view('template', 'kegiatan/kegiatan_entry', $data);
  }
  // Function Proses
  public function proses()
  {
    $this->db->trans_start();
    $kegiatanid = $this->input->post('kegiatanid') ? $this->input->post('kegiatanid') : "";
    $adminid    = $this->session->userdata('adminid') ? $this->session->userdata('adminid') : "";
    $judul      = $this->input->post('judul');
    $deskripsi  = $this->input->post('deskripsi');
    $isi        = $this->input->post('isi');
    $tanggal    = explode_tanggal_datepicker($this->input->post('tanggal'));

    $insert_data = array(
      'adminid'    => $adminid,
      'judul'      => $judul,
      'deskripsi'  => $deskripsi,
      'isi'        => $isi,
      'tanggal'    => $tanggal
    );
    if ($kegiatanid == "") {
      if ($this->kegiatan->search_data($tanggal) > 0) {
        $this->session->set_flashdata('error' . $tanggal . ' sudah ada harap gunakan tanggal lain');
        redirect('kegiatans/entry');
        die();
      }
      $gambar = null;
      if ($_FILES['gambar']['name'] != "") {
        // Upload Gambar
        $config['upload_path'] = './asset/gkegiatan/';
        $config['allowed_types'] = 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['file_name'] = 'gkegiatan_' . time();
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path . $gambar;
          $config2['maintain_ratio'] = true;
          $config['width'] = 70;
          $config['height'] = 70;
          $this->load->library('image_lib', $config2);
          $this->image_lib->resize();
        }
      }
      // insert data
      $insert_data['gambar'] = $gambar;
      $this->global_model->insert('kegiatan', $insert_data);
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil <a href="#" class="alert-link">Ditambah</a></div>');
      redirect('kegiatans');
    } else {
      $result = $this->kegiatan->get_data($kegiatanid);
      // Update Data
      $gambar = $this->input->post('gambar');
      if ($_FILES['gambar']['name'] != "") {
        unlink('./asset/gkegiatan/' . $result['gambar']);
        // Upload Gambar
        $config['upload_path'] = './asset/gkegiatan/';
        $config['allowed_types'] = 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['file_name'] = 'gkegiatan_' . time();
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path . $gambar;
          $config2['maintain_ratio'] = true;
          $config['width'] = 70;
          $config['height'] = 70;
          $this->load->library('image_lib', $config2);
          $this->image_lib->resize();
        }
      }

      $update_data = array(
        'adminid'    => $adminid,
        'judul'      => $deskripsi,
        'deskripsi'  => $deskripsi,
        'isi'        => $isi,
        'tanggal'    => $tanggal
      );

      if ($gambar != "") {
        $update_data['gambar'] = $gambar;
      }
      // Update Data
      $this->global_model->update('kegiatan', $update_data, array('id' => $kegiatanid));
      $this->db->trans_complete();
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link">Diedit</a></div>');
      redirect('kegiatans');
    }
  }
}

/* End of file: Kegiatans.php */
