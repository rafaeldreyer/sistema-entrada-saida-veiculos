<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/auth.php'; require_login(); require_once __DIR__ . '/../config/database.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('Método não permitido.');}validate_csrf();$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT)?:0;
try{$stmt=db()->prepare('DELETE FROM veiculos WHERE id_veiculo=?');$stmt->execute([$id]);flash('sucesso',$stmt->rowCount()?'Veículo excluído.':'Veículo não encontrado.');}catch(PDOException $e){flash('erro','O veículo possui movimentações relacionadas e não pode ser excluído. Altere o status para INATIVO.');}redirect('veiculos/index.php');
