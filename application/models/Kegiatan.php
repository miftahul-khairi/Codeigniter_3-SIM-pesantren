<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('kegiatan.*,');
    $this->db->from('kegiatan');
    if ($id != "") {
      $this->db->where('kegiatan.id', $id);
    }

    $this->db->order_by('kegiatan.id', 'desc');
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

  public function search_data($tanggal, $id = "")
  {
    $this->db->select('kegiatan.*,');
    $this->db->from('kegiatan');
    $this->db->or_like('kegiatan.tanggal', $tanggal);
    if ($id != "") {
      $this->db->where_not_in('kegiatan.id', $id);
    }

    $this->db->order_by('kegiatan.id', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }

  // Ambil Data Detail kegiatan
  public function ambil($where = "")
  {

    $this->db->select('*');
    $this->db->select('kegiatan.*,');
    $this->db->from('kegiatan');
    if ($where != "") {
      $this->db->where('kegiatan.id', $where);
    }
    $this->db->order_by('kegiatan.id', 'desc');
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
    $this->db->select('kegiatan.*,');
    $this->db->select('kegiatan.*,');
    $this->db->from('kegiatan');
    if ($santriid != "") {
      $this->db->where('kegiatan.id', $santriid);
    }
    $this->db->order_by('kegiatan.id', 'asc');
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

/* End of file: Kegiatan.php */
