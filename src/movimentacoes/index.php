<?php
declare(strict_types=1);
require_once __DIR__.'/../includes/auth.php';require_login();require_once __DIR__.'/../config/database.php';
$movimentacoes=db()->query("SELECT m.*,v.placa,v.modelo,c.nome AS condutor,vg.codigo AS vaga FROM movimentacoes m JOIN veiculos v ON v.id_veiculo=m.id_veiculo JOIN condutores c ON c.id_condutor=m.id_condutor JOIN vagas vg ON vg.id_vaga=m.id_vaga ORDER BY m.data_hora_entrada DESC LIMIT 100")->fetchAll();
$pageTitle='Movimentações';require __DIR__.'/../includes/header.php';
?>
<div class="page-heading"><div><h1>Entradas e saídas</h1><p>Registre e acompanhe a permanência dos veículos.</p></div><a class="button" href="entrada.php">Registrar entrada</a></div>
<?php if(!$movimentacoes):?><p class="empty-state">Nenhuma movimentação registrada.</p><?php else:?><div class="table-wrap"><table><thead><tr><th>Placa</th><th>Condutor</th><th>Vaga</th><th>Entrada</th><th>Saída</th><th>Status</th><th>Ação</th></tr></thead><tbody><?php foreach($movimentacoes as $m):?><tr><td><strong><?=e($m['placa'])?></strong><br><small><?=e($m['modelo'])?></small></td><td><?=e($m['condutor'])?></td><td><?=e($m['vaga'])?></td><td class="nowrap"><?=e(date('d/m/Y H:i',strtotime($m['data_hora_entrada'])))?></td><td class="nowrap"><?=e($m['data_hora_saida']?date('d/m/Y H:i',strtotime($m['data_hora_saida'])):'—')?></td><td><span class="badge badge-<?=strtolower($m['status'])?>"><?=e($m['status'])?></span></td><td><?php if($m['status']==='ABERTA'):?><a class="button button-small button-secondary" href="saida.php?id=<?=(int)$m['id_movimentacao']?>">Registrar saída</a><?php else:?>—<?php endif;?></td></tr><?php endforeach;?></tbody></table></div><?php endif;?>
<?php require __DIR__.'/../includes/footer.php';?>
