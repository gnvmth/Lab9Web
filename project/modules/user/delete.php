<?php
// Hapus data hanya lewat POST + token CSRF (bukan lewat URL GET)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setFlash('error', 'Penghapusan harus melalui tombol Hapus (metode POST).');
    redirect('user/list');
}
if (!csrfVerify($_POST['csrf_token'] ?? null)) {
    setFlash('error', 'Token keamanan tidak valid.');
    redirect('user/list');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    setFlash('error', 'ID pengguna tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
$stmt->execute([$id]);
if ($stmt->rowCount()) {
    setFlash('success', 'Pengguna berhasil dihapus.');
} else {
    setFlash('error', 'Pengguna tidak ditemukan.');
}
redirect('user/list');
