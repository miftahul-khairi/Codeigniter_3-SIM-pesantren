<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logins extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->model('login');
  }

  function index()
  {
    if (($this->session->userdata('username'))) {
      redirect('');
    } else {
      $this->load->view('login');
    }
  }

  function cek_login()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    $hasil = $this->login->cek_user($data);
    $_log  = array();
    if ($hasil->num_rows() == 1) {
      foreach ($hasil->result() as $val) {
        $sess_data['username'] = $val->username;
        $sess_data['adminid'] = $val->id;
        $sess_data['pesantrenid'] = $val->pesantrenid;
        $sess_data['level'] = $val->level;
        $sess_data['nama'] = $val->nama;
        $sess_data['email'] = $val->email;
        $sess_data['gambar'] = $val->gambar;
        $this->session->set_userdata($sess_data);
        $_log['status'] = "1";
        $_log['keterangan'] = "<div class='alert alert-success' role='alert'>Login Sukses </div>";
      }
    } else {
      $_log['status'] = "0";
      $_log['keterangan'] = "<div class='alert alert-danger' role='alert'>Login Gagal</div>";
    }
    echo json_encode($_log);
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('logins/');
  }
}

/* End of file: Logins.php */
