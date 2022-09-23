<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporankegiatan extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function get_data($id = "")
  {
    $this->db->select('
  kegiatan.*,
     ');
    $this->db->from('kegiatan');
    if ($id != "") {
      $this->db->where('kegiatan.id', $id);
    }
    $this->db->order_by('kegiatan.id', 'DESC');

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      if ($id == "") {
        return $query->result_array();
      } else {
        return $query->row_array();
      }
    } else {
      return null;
    }
  }

  public function get_details($status = "", $satu = "", $dua = "")
  {
    $this->db->select('
  kegiatan.*,
     ');
    $this->db->from('kegiatan');
    if ($satu != "" and $dua != "") {
      if ($status == 'hari') {
        $this->db->where('(DATE_FORMAT(kegiatan.tanggal, "%Y-%m-%d") BETWEEN "' . $satu . '" AND "' . $dua . '")');
      } elseif ($status == 'bulan') {
        $this->db->where('(DATE_FORMAT(kegiatan.tanggal, "%Y-%m") BETWEEN "' . $satu . '" AND "' . $dua . '")');
      } elseif ($status == 'tahun') {
        $this->db->where('(DATE_FORMAT(kegiatan.tanggal, "%Y") BETWEEN "' . $satu . '" AND "' . $dua . '")');
      }
    }

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }
}

/* End of file: Laporankegiatan.php */
