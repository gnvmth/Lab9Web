<?php
// Kumpulan function latihan (dimuat dengan require_once agar tidak "already declared")

function tampilkanSalam() {
    echo "Selamat belajar PHP modular!";
}

function sapaPengguna($nama) {
    echo "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// ---- Latihan function ----
function konversiCelciusKeFahrenheit($c) {
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai($nilai) {
    if ($nilai >= 85) return 'A (Sangat Baik)';
    if ($nilai >= 75) return 'B (Baik)';
    if ($nilai >= 65) return 'C (Cukup)';
    if ($nilai >= 50) return 'D (Kurang)';
    return 'E (Gagal)';
}

function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}
