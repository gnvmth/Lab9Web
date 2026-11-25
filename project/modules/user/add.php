<?php
$errors = [];
$old = ['nama' => '', 'email' => '', 'jurusan' => '', 'alamat' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Token keamanan tidak valid. Muat ulang halaman.';
    }
    foreach ($old as $k => $_) {
        $old[$k] = trim((string) ($_POST[$k] ?? ''));
    }
    if ($old['nama'] === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if (!validasiEmail($old['email'])) {
        $errors[] = 'Format email tidak valid.';
    }

    if (!$errors) {
        try {
            $stmt = $pdo->prepare('INSERT INTO users (nama, email, jurusan, alamat) VALUES (?, ?, ?, ?)');
            $stmt->execute([$old['nama'], $old['email'], $old['jurusan'], $old['alamat']]);
            setFlash('success', 'Pengguna berhasil ditambahkan.');
            redirect('user/list');
        } catch (PDOException $ex) {
            if ($ex->getCode() === '23000') {
                $errors[] = 'Email sudah terdaftar.';
            } else {
                error_log($ex->getMessage());
                $errors[] = 'Terjadi kesalahan saat menyimpan data.';
            }
        }
    }
}

$formTitle  = 'Tambah Pengguna';
$formAction = url('user/add');
require __DIR__ . '/_form.php';
