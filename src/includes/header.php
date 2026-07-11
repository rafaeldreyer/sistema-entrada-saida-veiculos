<?php
declare(strict_types=1);
require_once __DIR__ . '/helpers.php';
$pageTitle = $pageTitle ?? 'Sistema de Entrada e Saída de Veículos';
$flashMessage = take_flash();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="<?= e(url('css/style.css')) ?>">
</head>
<body>
<header class="site-header">
    <div class="container header-row">
        <a class="brand" href="<?= e(url('index.php')) ?>">Controle de Veículos</a>
        <?php if (!empty($_SESSION['usuario'])): ?>
            <button class="menu-button" type="button" data-menu-button aria-label="Abrir menu">Menu</button>
            <nav class="main-nav" data-menu>
                <a href="<?= e(url('index.php')) ?>">Início</a>
                <a href="<?= e(url('veiculos/index.php')) ?>">Veículos</a>
                <a href="<?= e(url('condutores/index.php')) ?>">Condutores</a>
                <a href="<?= e(url('vagas/index.php')) ?>">Vagas</a>
                <a href="<?= e(url('movimentacoes/index.php')) ?>">Movimentações</a>
                <a href="<?= e(url('relatorios/index.php')) ?>">Consulta</a>
                <a href="<?= e(url('contato.php')) ?>">Contato</a>
                <a href="<?= e(url('logout.php')) ?>">Sair</a>
            </nav>
        <?php endif; ?>
    </div>
</header>
<main class="container main-content">
    <?php if ($flashMessage): ?>
        <div class="alert alert-<?= e($flashMessage['type']) ?>" role="alert"><?= e($flashMessage['message']) ?></div>
    <?php endif; ?>
