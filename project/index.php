<?php
// index.php - titik masuk aplikasi + router sederhana
session_start();
ob_start(); // buffer output agar redirect (header Location) tetap bisa dipakai di dalam modul

require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/database.php';

// WHITELIST rute: hanya halaman di sini yang boleh dimuat
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'demo'        => __DIR__ . '/views/demo.php',
    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
];

$page = $_GET['page'] ?? 'dashboard';
$pageTitle = 'Dashboard';

if (!is_string($page)) {
    $page = '';
}
$page = trim($page, '/');
if ($page === '') {
    $page = 'dashboard';
}

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
    $pageTitle = '404 - Tidak ditemukan';
    $page = '404';
} else {
    $contentFile = $routes[$page];
    $pageTitle = ucfirst(str_replace('/', ' - ', $page));
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
ob_end_flush();
