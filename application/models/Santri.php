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
  // Ambil Data Detail santri
  public function ambil($where = "")
  {

    $this->db->select('*');
    $this->db->select('santri.*,
    (SELECT namap FROM pesantren WHERE pesantren.id = santri.pesantrenid) as namapesantren
    ');
    $this->db->from('santri');
    if ($where != "") {
      $this->db->where('santri.id', $where);
    }
    $this->db->order_by('santri.id', 'desc');
    $data = $this->db->get();
    if ($data->num_rows() > 0) {
      if ($where != "") {
        return $data->row_array();
      } else {
        return $data->result_array();
      }
    } else {
      return null;
    }
  }

  public function get_data_perlimit($santriid = "")
  {
    $this->db->select('santri.*,
    (SELECT namap FROM pesantren WHERE pesantren.id = santri.pesantrenid) as namapesantren
    ');
    $this->db->select('santri.*,');
    $this->db->from('santri');
    if ($santriid != "") {
      $this->db->where('santri.id', $santriid);
    }
    $this->db->order_by('santri.id', 'asc');
    $this->db->limit(10);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      if ($santriid == "") {
        return $query->result_array();
      } else {
        return $query->row_array();
      }
    } else {
      return null;
    }
  }
  // Function mencari data sesuai dengan keyword yang diinputkan
  public function search_data($nis, $id = "")
  {
    $this->db->select('santri.*,');
    $this->db->from('santri');
    $this->db->or_like('santri.nis', $nis);
    if ($id != "") {
      $this->db->where_not_in('santri.id', $id);
    }

    $this->db->order_by('santri.id', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }
}

/* End of file: Santri.php */
