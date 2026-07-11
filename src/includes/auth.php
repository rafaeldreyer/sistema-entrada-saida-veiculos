<?php
declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

function require_login(): void
{
    if (empty($_SESSION['usuario'])) {
        flash('erro', 'Faça login para acessar essa página.');
        redirect('login.php');
    }
}
