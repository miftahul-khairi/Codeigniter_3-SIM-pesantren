<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('alumni.*,
    (SELECT namap FROM pesantren WHERE pesantren.id = alumni.pesantrenid) as namapesantren,
    (SELECT nama FROM santri WHERE santri.id = alumni.santriid) as namasantri
    ');
    $this->db->from('alumni');
    if ($id != "") {
      $this->db->where('alumni.id', $id);
    }

    $this->db->order_by('alumni.id', 'desc');
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

/* End of file: Alumni.php */
