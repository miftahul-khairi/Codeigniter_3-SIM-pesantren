<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Admin_pesantren extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($adminid = "")
  {
    $this->db->select('admin.*,
    (SELECT namap FROM pesantren WHERE pesantren.id = admin.pesantrenid) as namapesantren
            ')->where_in('level', ['adminpesantren']);
    $this->db->from('admin');
    if ($adminid != "") {
      $this->db->where('admin.id', $adminid);
    }
    $this->db->order_by('admin.id', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      if ($adminid == "") {
        return $query->result_array();
      } else {
        return $query->row_array();
      }
    } else {
      return null;
    }
  }

  public function find_admin($username, $id = "")
  {
    $this->db->select('
        admin.*
     ');
    $this->db->from('admin');
    $this->db->where('admin.username', $username);

    if ($id != "") {
      $this->db->where_not_in('admin.id', $id);
    }

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
}
