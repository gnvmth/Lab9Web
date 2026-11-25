<?php
$judul = 'Latihan Function';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/helpers.php';
?>
<section class="content">
    <h2>Latihan Function</h2>
    <ul>
        <li>Salam: <?php tampilkanSalam(); ?></li>
        <li>Sapa: <?php sapaPengguna('Rina'); ?></li>
        <li>Luas persegi panjang 8 x 5 = <?php echo hitungLuasPersegiPanjang(8, 5); ?></li>
        <li>Diskon 10% dari 200.000 = <?php echo formatRupiah(hitungDiskon(200000)); ?></li>
        <li>Diskon 15% dari 200.000 = <?php echo formatRupiah(hitungDiskon(200000, 15)); ?></li>
        <li>37 &deg;C = <?php echo konversiCelciusKeFahrenheit(37); ?> &deg;F</li>
        <li>Nilai 78 = <?php echo tentukanStatusNilai(78); ?></li>
        <li>3 barang @ Rp 25.000 = <?php echo formatRupiah(hitungTotal(25000, 3)); ?></li>
        <li>Escape XSS: <?php echo e('<script>alert("uji")</script>'); ?></li>
    </ul>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
