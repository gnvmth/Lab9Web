<section>
    <h2>Demo Helper</h2>
    <ul>
        <li>formatRupiah(150000) = <?= e(formatRupiah(150000)) ?></li>
        <li>hitungDiskon(200000) = <?= e(formatRupiah(hitungDiskon(200000))) ?> (10%)</li>
        <li>hitungDiskon(200000, 15) = <?= e(formatRupiah(hitungDiskon(200000, 15))) ?> (15%)</li>
        <li>validasiEmail('rina.putri@gmail.com') = <?= validasiEmail('rina.putri@gmail.com') ? 'valid' : 'tidak valid' ?></li>
        <li>validasiEmail('rina@') = <?= validasiEmail('rina@') ? 'valid' : 'tidak valid' ?></li>
        <li>ringkasTeks = <?= e(ringkasTeks('Ini adalah teks yang cukup panjang untuk diuji pemotongannya oleh function.', 30)) ?></li>
        <li>e() pada skrip = <?= e('<script>alert("uji")</script>') ?></li>
    </ul>
</section>
