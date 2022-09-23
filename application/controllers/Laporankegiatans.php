<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporankegiatans extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_session('admin');
    $this->load->model('laporankegiatan');
  }

  public function index()
  {
    $data['title']  = 'Laporan Kegiatan Admin Pesantren';
    $data['result'] = $this->laporankegiatan->get_data();
    $this->template->view('template', 'laporankegiatan/laporankegiatan', $data);
  }

  public function proses()
  {
    $this->db->trans_start();
    $status = $this->input->post('status');
    $tgl_mulai = $this->input->post('tgl_mulai');
    $tgl_akhir = $this->input->post('tgl_akhir');
    $bln_mulai = $this->input->post('bln_mulai');
    $bln_akhir = $this->input->post('bln_akhir');
    $tahun = $this->input->post('tahun');
    $data = array(
      'status' => $status,
      'tgl_mulai' => $tgl_mulai,
      'tgl_akhir' => $tgl_akhir,
      'bln_mulai' => $bln_mulai,
      'bln_akhir' => $bln_akhir,
      'tahun' => $tahun,
    );

    if ($status == 'hari') {
      $data['result'] = $this->laporankegiatan->get_details($status, $tgl_mulai, $tgl_mulai);
    } elseif ($status == 'bulan') {
      $data['result'] = $this->laporankegiatan->get_details($status, $bln_mulai, $bln_mulai);
    } elseif ($status == 'tahun') {
      $data['result'] = $this->laporankegiatan->get_details($status, $tahun, $tahun);
    }

    $this->load->view('laporankegiatan/laporankegiatan_cetak', $data);
  }
}

/* End of file: Laporankegiatans.php */
