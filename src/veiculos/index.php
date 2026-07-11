<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/auth.php';
require_login();
require_once __DIR__ . '/../config/database.php';

$busca = trim((string) ($_GET['busca'] ?? ''));
$sql = "SELECT v.*, c.nome AS condutor FROM veiculos v JOIN condutores c ON c.id_condutor = v.id_condutor";
$params = [];
if ($busca !== '') {
    $sql .= ' WHERE v.placa LIKE :busca OR v.modelo LIKE :busca OR c.nome LIKE :busca';
    $params['busca'] = '%' . $busca . '%';
}
$sql .= ' ORDER BY v.placa';
$stmt = db()->prepare($sql);
$stmt->execute($params);
$veiculos = $stmt->fetchAll();

$pageTitle = 'Veículos';
require __DIR__ . '/../includes/header.php';
?>
<div class="page-heading"><div><h1>Veículos</h1><p>Cadastro completo dos veículos controlados pelo sistema.</p></div><a class="button" href="form.php">Cadastrar veículo</a></div>
<form class="filters" method="get"><div class="form-grid"><label>Pesquisar<input name="busca" value="<?= e($busca) ?>" placeholder="Placa, modelo ou condutor"></label></div><div class="action-row"><button class="button" type="submit">Pesquisar</button><a class="button button-light" href="index.php">Limpar</a></div></form>
<?php if (!$veiculos): ?><p class="empty-state">Nenhum veículo encontrado.</p><?php else: ?>
<div class="table-wrap"><table><thead><tr><th>Placa</th><th>Marca/modelo</th><th>Condutor</th><th>Tipo</th><th>Status</th><th>Ações</th></tr></thead><tbody>
<?php foreach ($veiculos as $v): ?><tr><td class="nowrap"><strong><?= e($v['placa']) ?></strong></td><td><?= e($v['marca'] . ' ' . $v['modelo']) ?></td><td><?= e($v['condutor']) ?></td><td><?= e($v['tipo_veiculo']) ?></td><td><span class="badge badge-<?= strtolower($v['status']) ?>"><?= e($v['status']) ?></span></td><td><div class="table-actions"><a class="button button-small button-light" href="visualizar.php?id=<?= (int)$v['id_veiculo'] ?>">Ver</a><a class="button button-small" href="form.php?id=<?= (int)$v['id_veiculo'] ?>">Editar</a><form class="inline-form" method="post" action="excluir.php" data-confirm="Deseja excluir este veículo?"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><input type="hidden" name="id" value="<?= (int)$v['id_veiculo'] ?>"><button class="button button-small button-danger" type="submit">Excluir</button></form></div></td></tr><?php endforeach; ?>
</tbody></table></div><?php endif; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
