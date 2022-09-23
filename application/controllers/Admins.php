<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    cek_session('admin');
    $this->load->model('admin');
  }

  public function index()
  {
    $data['title'] = "Admin Management";
    $data['result'] = $this->admin->get_data();
    $this->template->view('template', 'admin/admin', $data);
  }

  public function entry($id = "")
  {
    if ($id == "") {
      $data['title'] = 'Form Input Admin';
      $data['adminid'] = '';
      $data['tombol'] = 'Tambah';
      $data['nama'] = '';
      $data['alamat'] = '';
      $data['email'] = '';
      $data['nohp'] = '';
      $data['username'] = '';
      $data['password'] = '';
      $data['passwordHid'] = '';
    } else {
      $result = $this->admin->get_data($id);
      $data['title'] = 'Form Edit Admin';
      $data['adminid'] = $id;
      $data['tombol'] = 'Edit';
      $data['nama'] = $result['nama'];
      $data['alamat'] = $result['alamat'];
      $data['email'] = $result['email'];
      $data['nohp'] = $result['nohp'];
      $data['username'] = $result['username'];
      $data['password'] = $result['password'];
      $data['passwordHid'] = $result['passwordHid'];
    }
    $this->template->view('template', 'admin/admin_entry', $data);
  }

  public function proses()
  {
    $this->db->trans_start();
    $adminid = $this->input->post('adminid') ? $this->input->post('adminid') : "";
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $nohp = $this->input->post('nohp');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $return_data = array(
      'nama' => $nama,
      'alamat' => $alamat,
      'email' => $email,
      'nohp' => $nohp,
      'username' => $username,
      'password' => MD5($password),
      'passwordHid' => $password,
      'gambar'    => 'no-image.png',
      'level' => 'admin',
    );
    if ($adminid == "") {
      if ($this->admin->find_admin($username) > 0) {
        $this->session->set_flashdata('error', "<div class='alert alert-danger' role='alert'>Username Sudah digunakan</div>");
        redirect('admins/entry');
        die();
      } else {
        $this->global_model->insert('admin', $return_data);
        $this->db->trans_complete();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link">Diedit</a></div>');
      }
    } else {
      if ($this->admin->find_admin($username, $adminid) > 0) {
        $this->session->set_flashdata('error', "<div class='alert alert-danger' role='alert'>Username Sudah digunakan</div>");
        redirect('admins/entry');
        die();
      } else {
        $this->global_model->update('admin', $return_data, array('id' => $adminid));
        $this->db->trans_complete();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link">Diedit</a></div>');
      }
    }
    redirect('admins');
  }

  // public function delete($id)
  public function delete($id)
  {
    if ($id == '1') {
      $this->session->set_flashdata('pesan', '<div class="form-group"><div class="col-sm-12 alert alert-danger" role="alert">Admin tidak  bisa di HAPUS!!!</div></div>');
      echo "<script>window.history.go(-1);</script>";
    } else {
      $result = $this->admin->get_data($id);
      $this->global_model->delete('admin', array('id' => $id));
      unlink('./asset/Gadmin/' . $result['gambar']);
      echo "<script>window.history.go(-1);</script>";
      // flashdata
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-semibold"></span>Data Berhasil <a href="#" class="alert-link"> Dihapus</a></div>');
      redirect('admins');
    }
  }
}
