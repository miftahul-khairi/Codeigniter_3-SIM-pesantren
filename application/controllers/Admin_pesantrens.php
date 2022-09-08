<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_pesantrens extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    cek_session('admin');
    $this->load->model('admin_pesantren');
  }

  public function index()
  {
    $data['title'] = "Management Admin Pesantren";
    $data['result'] = $this->admin_pesantren->get_data();
    $this->template->view('template', 'adminpesantren/adminpesantren', $data);
  }

  public function entry($id = "")
  {
    $data['dropdown_pesantren'] = dropdown_pesantren();
    if ($id == "") {
      $data['title'] = 'Form Input Admin';
      $data['adminid'] = '';
      $data['tombol'] = 'Tambah';
      $data['pesantrenid'] = '';
      $data['nama'] = '';
      $data['alamat'] = '';
      $data['email'] = '';
      $data['nohp'] = '';
      $data['username'] = '';
      $data['password'] = '';
      $data['passwordHid'] = '';
    } else {
      $result = $this->admin_pesantren->get_data($id);
      $data['title'] = 'Form Edit Admin';
      $data['adminid'] = $id;
      $data['tombol'] = 'Edit';
      $data['pesantrenid'] = $result['pesantrenid'];
      $data['nama'] = $result['nama'];
      $data['alamat'] = $result['alamat'];
      $data['email'] = $result['email'];
      $data['nohp'] = $result['nohp'];
      $data['username'] = $result['username'];
      $data['password'] = $result['password'];
      $data['passwordHid'] = $result['passwordHid'];
    }
    $this->template->view('template', 'adminpesantren/adminpesantren_entry', $data);
  }

  public function proses()
  {
    $this->db->trans_start();
    $adminid      = $this->input->post('adminid') ? $this->input->post('adminid') : "";
    $pesantrenid  = $this->input->post('pesantrenid');
    $nama         = $this->input->post('nama');
    $alamat       = $this->input->post('alamat');
    $email        = $this->input->post('email');
    $nohp         = $this->input->post('nohp');
    $username     = $this->input->post('username');
    $password     =  $this->input->post('password');

    $return_data = array(
      'pesantrenid' => $pesantrenid,
      'nama'        => $nama,
      'alamat'      => $alamat,
      'email'       => $email,
      'nohp'        => $nohp,
      'username'    => $username,
      'password'    => MD5($password),
      'passwordHid' => $password,
      'gambar'      => 'no-image.png',
      'level'       => 'adminpesantren',
    );
    if ($adminid == "") {
      if ($this->admin_pesantren->find_admin($username) > 0) {
        $this->session->set_flashdata('error', "<div class='alert alert-danger' role='alert'>Username Sudah digunakan</div>");
        redirect('admin_pesantrens/entry');
        die();
      } else {
        $this->global_model->insert('admin', $return_data);
        $this->db->trans_complete();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
      }
    } else {
      if ($this->admin_pesantren->find_admin($username, $adminid) > 0) {
        $this->session->set_flashdata('error', "<div class='alert alert-danger' role='alert'>Username Sudah digunakan</div>");
        redirect('admin_pesantrens/entry');
        die();
      } else {
        $this->global_model->update('admin', $return_data, array('id' => $adminid));
        $this->db->trans_complete();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">Data</span> Berhasil<a href="#" class="alert-link"> Diedit</a></div>');
      }
    }
    redirect('admin_pesantrens');
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
