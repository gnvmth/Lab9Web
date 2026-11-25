<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle ?? 'Aplikasi PHP Modular') ?> | Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>CRUD Pengguna dengan template, helper, dan router</p>
    </header>
    <nav>
        <a href="<?= e(url('dashboard')) ?>" class="<?= $page === 'dashboard' ? 'active' : '' ?>">Dashboard</a>
        <a href="<?= e(url('user/list')) ?>" class="<?= isActive($page, 'user') ? 'active' : '' ?>">Pengguna</a>
        <a href="<?= e(url('demo')) ?>" class="<?= $page === 'demo' ? 'active' : '' ?>">Demo Helper</a>
    </nav>
    <?php if ($flash = getFlash()): ?>
        <div class="alert alert-<?= e($flash['tipe']) ?>"><?= e($flash['pesan']) ?></div>
    <?php endif; ?>
    <main>
