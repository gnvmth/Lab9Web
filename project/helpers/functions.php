<?php
// helpers/functions.php - function umum yang dipakai banyak modul

if (!defined('BASE_URL')) {
    $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    define('BASE_URL', rtrim($dir, '/'));
}

/** Escape output ke HTML (cegah XSS). */
function e(?string $nilai): string
{
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}

/** Bentuk URL routing: index.php?page=... (bungkus dengan e() saat dicetak di HTML). */
function url(string $page = 'dashboard', array $params = []): string
{
    $query = http_build_query(['page' => $page] + $params);
    return BASE_URL . '/index.php?' . $query;
}

/** Path aset statis. */
function asset(string $path): string
{
    return BASE_URL . '/assets/' . ltrim($path, '/');
}

/** Redirect ke rute tertentu. */
function redirect(string $page, array $params = []): void
{
    header('Location: ' . url($page, $params));
    exit;
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

/** Hitung nilai diskon (bukan harga akhir). */
function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/** Ringkas teks panjang dengan "..." di akhir. */
function ringkasTeks(string $teks, int $batas = 50): string
{
    $teks = trim($teks);
    if (mb_strlen($teks, 'UTF-8') <= $batas) {
        return $teks;
    }
    return rtrim(mb_substr($teks, 0, $batas, 'UTF-8')) . '...';
}

/** Menu aktif: true jika rute saat ini sama/diawali $prefix. */
function isActive(string $currentPage, string $prefix): bool
{
    return $currentPage === $prefix || str_starts_with($currentPage, $prefix . '/');
}

/* ---------- Flash message ---------- */
function setFlash(string $tipe, string $pesan): void
{
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function getFlash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

/* ---------- CSRF ---------- */
function csrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrfField(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrfToken()) . '">';
}

function csrfVerify(?string $token): bool
{
    return is_string($token) && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}
