<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/auth.php'; require_login(); require_once __DIR__ . '/../config/database.php';
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT) ?: 0;
$stmt=db()->prepare('SELECT v.*,c.nome AS condutor FROM veiculos v JOIN condutores c ON c.id_condutor=v.id_condutor WHERE v.id_veiculo=?');$stmt->execute([$id]);$v=$stmt->fetch();
if(!$v){flash('erro','Veículo não encontrado.');redirect('veiculos/index.php');}
$pageTitle='Visualizar veículo';require __DIR__.'/../includes/header.php';
?>
<div class="page-heading"><h1>Detalhes do veículo</h1><a class="button" href="form.php?id=<?= $id ?>">Editar</a></div><section class="details"><dl><dt>Placa</dt><dd><?= e($v['placa']) ?></dd><dt>Marca/modelo</dt><dd><?= e($v['marca'].' '.$v['modelo']) ?></dd><dt>Condutor</dt><dd><?= e($v['condutor']) ?></dd><dt>Cor</dt><dd><?= e($v['cor']) ?></dd><dt>Ano</dt><dd><?= e((string)$v['ano_modelo']) ?></dd><dt>Tipo</dt><dd><?= e($v['tipo_veiculo']) ?></dd><dt>Status</dt><dd><?= e($v['status']) ?></dd><dt>Observação</dt><dd><?= e($v['observacao'] ?: '—') ?></dd></dl></section><p><a href="index.php">Voltar à lista</a></p>
<?php require __DIR__.'/../includes/footer.php'; ?>
