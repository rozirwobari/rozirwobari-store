<?php

if (!function_exists('formatTanggal')) {
    function formatTanggal($date) 
    {
        $bulan = array (
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        $tanggal = date('d F Y | H:i:s', strtotime($date));
        return strtr($tanggal, $bulan);
    }
}