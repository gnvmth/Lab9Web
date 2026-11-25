<?php
$total  = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$latest = $pdo->query('SELECT nama, email, alamat FROM users ORDER BY id DESC LIMIT 5')->fetchAll();
?>
<section>
    <h2>Dashboard</h2>
    <p>Total pengguna terdaftar: <strong><?= $total ?></strong></p>
    <h3>Pengguna terbaru</h3>
    <?php if (!$latest): ?>
        <p>Belum ada data.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($latest as $u): ?>
                <li><?= e($u['nama']) ?> (<?= e($u['email']) ?>) &mdash; <?= e(ringkasTeks((string) $u['alamat'], 30)) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <p><a class="btn" href="<?= e(url('user/list')) ?>">Kelola Pengguna</a></p>
</section>
