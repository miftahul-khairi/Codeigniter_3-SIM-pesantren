<?php
function format_tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function format_tanggal_t($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulanS(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return  $tahun;
}

function getBulanS($bln)
{
    switch ($bln) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Ags";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Okt";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Des";
            break;
    }
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function format_angka($angka)
{
    $hasil = number_format($angka, 0, ",", ".");
    return $hasil;
}

if (!function_exists('explode_tanggal_datepicker')) {
    function explode_tanggal_datepicker($tanggal_datepicker)
    {
        $arraytanggal = explode('-', $tanggal_datepicker);
        $var_tanggal = $arraytanggal[0];
        $var_bulan = $arraytanggal[1];
        $var_tahun = $arraytanggal[2];
        return $tanggal = $var_tahun . '-' . $var_bulan . '-' . $var_tanggal;
    }
}

if (!function_exists('explode_tanggal')) {
    function explode_tanggal($tanggal)
    {
        $arraytanggal = explode('-', $tanggal);
        $var_tahun = $arraytanggal[0];
        $var_bulan = $arraytanggal[1];
        $var_tanggal = $arraytanggal[2];
        return $tanggal = $var_tanggal . '-' . $var_bulan . '-' . $var_tahun;
    }
}

if (!function_exists('cari_pembulatan')) {
    function cari_pembulatan($total)
    {
        $cari_ = (int) substr($total, -2);
        $pembulatan = 0;
        if ($cari_ > 0) {
            $pembulatan = 100 - $cari_;
        }

        return $pembulatan;
    }
}

/*-------- END FORMAT ANGKA --------*/
