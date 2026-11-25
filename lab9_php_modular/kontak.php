<?php
$judul = 'Kontak';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/helpers.php';

$pesanHasil = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if ($nama === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesanHasil = 'Nama wajib diisi dan email harus valid.';
    } else {
        $pesanHasil = 'Terima kasih, ' . e($nama) . '. Pesan dari ' . e($email) . ' diterima.';
    }
}
?>
<section class="content">
    <h2>Kontak</h2>
    <?php if ($pesanHasil): ?><p><strong><?php echo $pesanHasil; ?></strong></p><?php endif; ?>
    <form method="post">
        <p><label>Nama<br><input type="text" name="nama" required></label></p>
        <p><label>Email<br><input type="text" name="email" required></label></p>
        <button type="submit">Kirim</button>
    </form>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
