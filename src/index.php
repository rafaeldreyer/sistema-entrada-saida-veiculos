<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/auth.php';
require_login();
require_once __DIR__ . '/config/database.php';

$pdo = db();
$resumo = [
    'veiculos' => (int) $pdo->query("SELECT COUNT(*) FROM veiculos WHERE status = 'ATIVO'")->fetchColumn(),
    'entradas' => (int) $pdo->query('SELECT COUNT(*) FROM movimentacoes')->fetchColumn(),
    'saidas' => (int) $pdo->query("SELECT COUNT(*) FROM movimentacoes WHERE status = 'FINALIZADA'")->fetchColumn(),
    'presentes' => (int) $pdo->query("SELECT COUNT(*) FROM movimentacoes WHERE status = 'ABERTA'")->fetchColumn(),
];
$recentes = $pdo->query("SELECT m.*, v.placa, v.modelo, c.nome AS condutor, vg.codigo AS vaga
    FROM movimentacoes m
    JOIN veiculos v ON v.id_veiculo = m.id_veiculo
    JOIN condutores c ON c.id_condutor = m.id_condutor
    JOIN vagas vg ON vg.id_vaga = m.id_vaga
    ORDER BY m.data_hora_entrada DESC LIMIT 5")->fetchAll();

$pageTitle = 'Página principal';
require __DIR__ . '/includes/header.php';
?>
<div class="page-heading">
    <div><h1>Sistema de Entrada e Saída de Veículos</h1><p>Olá, <?= e($_SESSION['usuario']['nome']) ?>. Acompanhe a movimentação do local.</p></div>
</div>
<section class="stats-grid" aria-label="Resumo">
    <article class="stat"><span>Veículos ativos</span><strong><?= $resumo['veiculos'] ?></strong></article>
    <article class="stat"><span>Entradas registradas</span><strong><?= $resumo['entradas'] ?></strong></article>
    <article class="stat"><span>Saídas registradas</span><strong><?= $resumo['saidas'] ?></strong></article>
    <article class="stat highlight"><span>Veículos presentes</span><strong><?= $resumo['presentes'] ?></strong></article>
</section>
<section>
    <h2>Ações principais</h2>
    <div class="action-row">
        <a class="button" href="<?= e(url('movimentacoes/entrada.php')) ?>">Registrar entrada</a>
        <a class="button button-secondary" href="<?= e(url('movimentacoes/index.php')) ?>">Registrar saída</a>
        <a class="button button-light" href="<?= e(url('veiculos/form.php')) ?>">Cadastrar veículo</a>
    </div>
</section>
<section>
    <h2>Movimentações recentes</h2>
    <?php if (!$recentes): ?><p class="empty-state">Nenhuma movimentação registrada.</p><?php else: ?>
    <div class="table-wrap"><table><thead><tr><th>Placa</th><th>Veículo</th><th>Condutor</th><th>Vaga</th><th>Entrada</th><th>Status</th></tr></thead><tbody>
    <?php foreach ($recentes as $item): ?><tr><td><?= e($item['placa']) ?></td><td><?= e($item['modelo']) ?></td><td><?= e($item['condutor']) ?></td><td><?= e($item['vaga']) ?></td><td><?= e(date('d/m/Y H:i', strtotime($item['data_hora_entrada']))) ?></td><td><span class="badge badge-<?= strtolower($item['status']) ?>"><?= e($item['status']) ?></span></td></tr><?php endforeach; ?>
    </tbody></table></div><?php endif; ?>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
