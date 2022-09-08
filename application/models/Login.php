<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  function setUsername($username)
  {
    $this->username = $username;
  }
  function getUsername()
  {
    return $this->username;
  }

  public function cek_user($data)
  {
    $query = $this->db->get_where('admin', $data);
    return $query;
  }

  function ambil()
  {
    $this->db->select('
   admin.*
  ');
    $this->db->from('admin');
    $this->db->where('username', $this->getUsername());
    $login = $this->db->get();
    if ($login->num_rows() > 0) {
      return $login->result_array();
    } else {
      return NULL;
    }
  }
}

/* End of file: Login.php */
