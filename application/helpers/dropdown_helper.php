<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('dropdown_pesantren')) {

    function dropdown_pesantren()
    {
        $CI = &get_instance();
        $CI->load->database();
        ## Menampilkan data
        $CI->db->select('*');
        $CI->db->from('pesantren');
        $CI->db->order_by('id', 'asc');
        $hasil = $CI->db->get();

        $arr_data[''] = "== Pilih Pesantren ==";
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result_array() as $key => $val) {
                $arr_data[$val['id']] = $val['namap'];
            }
        }
        return $arr_data;
    }

    function dropdown_kabupaten()
    {
        $CI = &get_instance();
        $CI->load->database();
        //Menampilkan data
        $CI->db->select('*');
        $CI->db->from('kabupaten');
        $CI->db->order_by('id', 'desc');
        $hasil = $CI->db->get();

        $arr_data[''] = "== Pilih Kabupaten ==";
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result_array() as $key => $val) {
                $arr_data[$val['id']] = $val['namaKab'];
            }
        }
        return $arr_data;
    }


    if (!function_exists('dropdown_kecamatan')) {

        function dropdown_kecamatan($kabupaten = 0)
        {
            $CI = &get_instance();
            $CI->load->database();
            // Menampilkan data
            $CI->db->select('*');
            $CI->db->from('kecamatan');
            $CI->db->order_by('id', 'DESC');
            $hasil = $CI->db->get();
            if ($kabupaten > 0) {
                $CI->db->where('kabid', $kabupaten);
            }

            $arr_data[''] = "== Pilih Kecamatan ==";
            if ($hasil->num_rows() > 0) {
                foreach ($hasil->result_array()  as $key => $val) {
                    $arr_data[$val['id']] = $val['namaKec'];
                }
            }
            return $arr_data;
        }
    }
}
