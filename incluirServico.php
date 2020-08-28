<?php

include_once('connect.php');

$serv = mysqli_escape_string($connect, $_POST['id_servico']);
$cli = mysqli_escape_string($connect, $_POST['id_cli']);
$equi = mysqli_escape_string($connect, $_POST['equip']);
$desc = mysqli_escape_string($connect, $_POST['desc']);
$peca = mysqli_escape_string($connect, $_POST['pec']);
$fim = mysqli_escape_string($connect, $_POST['fim']);
$cpeca = mysqli_escape_string($connect, $_POST['cpec']);
$vpeca = mysqli_escape_string($connect, $_POST['vpec']);
$val = mysqli_escape_string($connect, $_POST['vtot']);
$data = mysqli_escape_string($connect, $_POST['dte']);

if ($serv > 0) {
    $sql = "UPDATE servicos SET id_cliente = '$cli', equipamento = '$equi', descricao = '$desc', pecas = '$peca', vcust_peca = '$cpeca', valor_pecas = '$vpeca', valor_total = '$val', dat_exec = '$data', fim = $fim WHERE  id_servico = '$serv'";
    $resultado = mysqli_query($connect, $sql);
} else {
    $sql = "INSERT INTO servicos(id_cliente, equipamento, descricao, pecas, vcust_peca, valor_pecas, valor_total, dat_exec, fim) VALUES ('$cli', '$equi', '$desc', '$peca', '$cpeca', '$vpeca', '$val', '$data', $fim)";
    $resultado = mysqli_query($connect, $sql);
}

if (!$resultado) {
    echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=>true, 'msg'=>'Dados Inseridos com Sucesso!']);
    mysqli_close($connect);
}

?>