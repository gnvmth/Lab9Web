<?php
/** Partial form dipakai add & edit. Variabel: $formTitle, $formAction, $old, $errors */
?>
<section>
    <h2><?= e($formTitle) ?></h2>
    <?php if ($errors): ?>
        <div class="alert alert-error">
            <ul><?php foreach ($errors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= e($formAction) ?>">
        <?= csrfField() ?>
        <p><label>Nama<br>
            <input type="text" name="nama" value="<?= e($old['nama']) ?>" required maxlength="100"></label></p>
        <p><label>Email<br>
            <input type="email" name="email" value="<?= e($old['email']) ?>" required maxlength="150"></label></p>
        <p><label>Jurusan<br>
            <input type="text" name="jurusan" value="<?= e($old['jurusan']) ?>" maxlength="100"></label></p>
        <p><label>Alamat<br>
            <textarea name="alamat" rows="3"><?= e($old['alamat']) ?></textarea></label></p>
        <button type="submit">Simpan</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>
