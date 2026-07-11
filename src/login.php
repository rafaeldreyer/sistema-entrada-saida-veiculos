<?php
declare(strict_types=1);

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/helpers.php';

if (!empty($_SESSION['usuario'])) {
    redirect('index.php');
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validate_csrf();
    $identificador = trim((string) ($_POST['identificador'] ?? ''));
    $senha = (string) ($_POST['senha'] ?? '');

    if ($identificador === '' || $senha === '') {
        $erro = 'Informe o usuário ou e-mail e a senha.';
    } else {
        $stmt = db()->prepare('SELECT * FROM usuarios WHERE (email = :email OR nome_usuario = :nome_usuario) AND status = \'ATIVO\' LIMIT 1');
        $stmt->execute(['email' => $identificador, 'nome_usuario' => $identificador]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
            session_regenerate_id(true);
            $_SESSION['usuario'] = [
                'id_usuario' => (int) $usuario['id_usuario'],
                'nome' => $usuario['nome'],
                'perfil' => $usuario['perfil'],
            ];
            redirect('index.php');
        }
        $erro = 'Usuário ou senha inválidos.';
    }
}

$pageTitle = 'Login';
require __DIR__ . '/includes/header.php';
?>
<section class="login-panel">
    <h1>Entrar no sistema</h1>
    <p class="muted">Use seu nome de usuário ou e-mail.</p>
    <?php if ($erro): ?><div class="alert alert-erro"><?= e($erro) ?></div><?php endif; ?>
    <form method="post" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <label>Usuário ou e-mail
            <input type="text" name="identificador" maxlength="150" required autofocus value="<?= e($_POST['identificador'] ?? '') ?>">
        </label>
        <label>Senha
            <input type="password" name="senha" required>
        </label>
        <button class="button" type="submit">Entrar</button>
    </form>
    <p class="demo-note"><strong>Demonstração:</strong> admin / Admin@2026</p>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
