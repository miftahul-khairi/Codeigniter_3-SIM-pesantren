<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesantren extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('pesantren.*,');
    $this->db->from('pesantren');
    if ($id != "") {
      $this->db->where('pesantren.id', $id);
    }

    $this->db->order_by('pesantren.id', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      if ($id == "") {
        return $query->result_array();
      } else {
        return $query->row_array();
      }
    } else {
      return NULL;
    }
  }
}

/* End of file: Pesantren.php */
