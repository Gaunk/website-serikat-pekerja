<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generate_meta_title')) {
    function generate_meta_title($judul) {
        return character_limiter(strip_tags($judul), 60);
    }
}

if (!function_exists('generate_meta_description')) {
    function generate_meta_description($konten) {
        return character_limiter(strip_tags($konten), 160);
    }
}

if (!function_exists('generate_meta_keywords')) {
    function generate_meta_keywords($konten) {
        // Ambil kata-kata unik terbanyak (contoh kasar)
        $konten = strtolower(strip_tags($konten));
        $words = str_word_count($konten, 1);
        $word_freq = array_count_values($words);
        arsort($word_freq);
        $keywords = array_keys(array_slice($word_freq, 0, 10));
        return implode(', ', $keywords);
    }
}
