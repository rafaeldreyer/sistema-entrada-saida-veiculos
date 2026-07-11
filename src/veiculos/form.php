<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/auth.php';
require_login();
require_once __DIR__ . '/../config/database.php';

$pdo = db();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
$veiculo = ['id_condutor'=>'','placa'=>'','marca'=>'','modelo'=>'','cor'=>'','ano_modelo'=>'','tipo_veiculo'=>'CARRO','observacao'=>'','status'=>'ATIVO'];
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM veiculos WHERE id_veiculo = ?');
    $stmt->execute([$id]);
    $veiculo = $stmt->fetch() ?: $veiculo;
    if (empty($veiculo['id_veiculo'])) { flash('erro', 'Veículo não encontrado.'); redirect('veiculos/index.php'); }
}
$condutores = $pdo->query("SELECT id_condutor, nome FROM condutores WHERE status='ATIVO' ORDER BY nome")->fetchAll();
$erros = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validate_csrf();
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?: 0;
    foreach ($veiculo as $campo => $valor) { if (array_key_exists($campo, $_POST)) $veiculo[$campo] = trim((string) $_POST[$campo]); }
    $veiculo['placa'] = normalize_plate($veiculo['placa']);
    if (!(int)$veiculo['id_condutor']) $erros[] = 'Selecione o condutor responsável.';
    if (!valid_plate($veiculo['placa'])) $erros[] = 'Informe uma placa válida no padrão antigo ou Mercosul.';
    foreach (['marca'=>'marca','modelo'=>'modelo','cor'=>'cor'] as $campo=>$rotulo) if ($veiculo[$campo] === '') $erros[] = 'Informe ' . $rotulo . '.';
    $ano = $veiculo['ano_modelo'] === '' ? null : (int)$veiculo['ano_modelo'];
    if ($ano !== null && ($ano < 1900 || $ano > (int)date('Y') + 1)) $erros[] = 'Informe um ano de modelo válido.';
    if (!$erros) {
        try {
            $params = [$veiculo['id_condutor'],$veiculo['placa'],$veiculo['marca'],$veiculo['modelo'],$veiculo['cor'],$ano,$veiculo['tipo_veiculo'],$veiculo['observacao'] ?: null,$veiculo['status']];
            if ($id) {
                $params[] = $id;
                $stmt = $pdo->prepare('UPDATE veiculos SET id_condutor=?, placa=?, marca=?, modelo=?, cor=?, ano_modelo=?, tipo_veiculo=?, observacao=?, status=? WHERE id_veiculo=?');
            } else {
                $stmt = $pdo->prepare('INSERT INTO veiculos (id_condutor,placa,marca,modelo,cor,ano_modelo,tipo_veiculo,observacao,status) VALUES (?,?,?,?,?,?,?,?,?)');
            }
            $stmt->execute($params);
            flash('sucesso', $id ? 'Veículo atualizado.' : 'Veículo cadastrado.');
            redirect('veiculos/index.php');
        } catch (PDOException $e) {
            $erros[] = $e->getCode() === '23000' ? 'A placa informada já está cadastrada.' : 'Não foi possível salvar o veículo.';
        }
    }
}
$pageTitle = $id ? 'Editar veículo' : 'Cadastrar veículo';
require __DIR__ . '/../includes/header.php';
?>
<section class="form-panel"><h1><?= $id ? 'Editar veículo' : 'Cadastrar veículo' ?></h1>
<?php if ($erros): ?><ul class="error-list"><?php foreach ($erros as $erro): ?><li><?= e($erro) ?></li><?php endforeach; ?></ul><?php endif; ?>
<?php if (!$condutores): ?><div class="alert alert-erro">Cadastre um condutor ativo antes de cadastrar o veículo.</div><?php endif; ?>
<form method="post"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><input type="hidden" name="id" value="<?= $id ?>">
<label>Condutor responsável<select name="id_condutor" required><option value="">Selecione</option><?php foreach ($condutores as $c): ?><option value="<?= (int)$c['id_condutor'] ?>" <?= (int)$veiculo['id_condutor']===(int)$c['id_condutor']?'selected':'' ?>><?= e($c['nome']) ?></option><?php endforeach; ?></select></label>
<div class="form-grid"><label>Placa<input name="placa" maxlength="8" required value="<?= e($veiculo['placa']) ?>" placeholder="ABC1D23"></label><label>Tipo<select name="tipo_veiculo"><?php foreach(['CARRO','MOTO','UTILITARIO','OUTRO'] as $tipo): ?><option <?= $veiculo['tipo_veiculo']===$tipo?'selected':'' ?>><?= $tipo ?></option><?php endforeach; ?></select></label><label>Marca<input name="marca" maxlength="50" required value="<?= e($veiculo['marca']) ?>"></label><label>Modelo<input name="modelo" maxlength="80" required value="<?= e($veiculo['modelo']) ?>"></label><label>Cor<input name="cor" maxlength="40" required value="<?= e($veiculo['cor']) ?>"></label><label>Ano/modelo<input type="number" name="ano_modelo" min="1900" max="<?= date('Y')+1 ?>" value="<?= e((string)$veiculo['ano_modelo']) ?>"></label><label>Status<select name="status"><option <?= $veiculo['status']==='ATIVO'?'selected':'' ?>>ATIVO</option><option <?= $veiculo['status']==='INATIVO'?'selected':'' ?>>INATIVO</option></select></label></div>
<label>Observação<textarea name="observacao" maxlength="255"><?= e($veiculo['observacao']) ?></textarea></label><div class="form-actions"><button class="button" type="submit" <?= !$condutores?'disabled':'' ?>>Salvar</button><a class="button button-light" href="index.php">Cancelar</a></div></form></section>
<?php require __DIR__ . '/../includes/footer.php'; ?>
