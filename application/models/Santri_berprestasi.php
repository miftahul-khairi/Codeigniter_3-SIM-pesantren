<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri_berprestasi extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('santriberprestasi.*,
    (SELECT nama FROM santri WHERE santri.id = santriberprestasi.santriid) as namasantri,
    ');
    $this->db->from('santriberprestasi');
    if ($id != "") {
      $this->db->where('santriberprestasi.id', $id);
    }

    $this->db->order_by('santriberprestasi.id', 'desc');
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

  // Ambil Data Detail santriberprestasi
  public function ambil($where = "")
  {

    $this->db->select('*');
    $this->db->select('santriberprestasi.*,
    (SELECT nama FROM santri WHERE santri.id = santriberprestasi.santriid) as namasantri
    ');
    $this->db->from('santriberprestasi');
    if ($where != "") {
      $this->db->where('santriberprestasi.id', $where);
    }
    $this->db->order_by('santriberprestasi.id', 'desc');
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
    $this->db->select('santriberprestasi.*,
    (SELECT nama FROM santri WHERE santri.id = santriberprestasi.santriid) as namasantri
    ');
    $this->db->select('santriberprestasi.*,');
    $this->db->from('santriberprestasi');
    if ($santriid != "") {
      $this->db->where('santriberprestasi.id', $santriid);
    }
    $this->db->order_by('santriberprestasi.id', 'asc');
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
}

/* End of file: Santri_berprestasi.php */
