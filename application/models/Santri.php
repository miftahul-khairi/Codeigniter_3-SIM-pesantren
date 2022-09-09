<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('santri.*,
    (SELECT namap FROM pesantren WHERE pesantren.id = santri.pesantrenid) as namapesantren
    ');
    $this->db->from('santri');
    if ($id != "") {
      $this->db->where('santri.id', $id);
    }

    $this->db->order_by('santri.id', 'desc');
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

/* End of file: Santri.php */
