<?php
$judul = 'Home';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/helpers.php';
?>
<section class="content">
    <h2>Halaman Home</h2>
    <p>Ini adalah konten khusus halaman beranda.</p>
    <p>Contoh pemakaian function: harga <?php echo formatRupiah(150000); ?>,
       diskon 10% = <?php echo formatRupiah(hitungDiskon(150000)); ?></p>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
