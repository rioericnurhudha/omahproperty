<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($jumlah) {
        if (is_numeric($jumlah)) {
            return 'Rp. ' . number_format($jumlah, 0, ',', '.');
        }
        return $jumlah; // Jika bukan angka, kembalikan nilai asli
    }
}
