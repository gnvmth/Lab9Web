<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    setFlash('error', 'ID pengguna tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();
if (!$user) {
    setFlash('error', 'Pengguna tidak ditemukan.');
    redirect('user/list');
}

$errors = [];
$old = [
    'nama' => $user['nama'], 'email' => $user['email'],
    'jurusan' => (string) $user['jurusan'], 'alamat' => (string) $user['alamat'],
];

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
            $stmt = $pdo->prepare('UPDATE users SET nama = ?, email = ?, jurusan = ?, alamat = ? WHERE id = ?');
            $stmt->execute([$old['nama'], $old['email'], $old['jurusan'], $old['alamat'], $id]);
            setFlash('success', 'Data pengguna berhasil diperbarui.');
            redirect('user/list');
        } catch (PDOException $ex) {
            if ($ex->getCode() === '23000') {
                $errors[] = 'Email sudah dipakai pengguna lain.';
            } else {
                error_log($ex->getMessage());
                $errors[] = 'Terjadi kesalahan saat memperbarui data.';
            }
        }
    }
}

$formTitle  = 'Ubah Pengguna';
$formAction = url('user/edit', ['id' => $id]);
require __DIR__ . '/_form.php';
