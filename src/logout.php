<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/helpers.php';
$_SESSION = [];
session_destroy();
session_start();
flash('sucesso', 'Você saiu do sistema.');
redirect('login.php');
