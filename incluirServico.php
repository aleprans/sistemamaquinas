<?php

include_once('connect.php');

$cli = mysqli_escape_string($connect, $_POST['id_cliente']);
$equi = mysqli_escape_string($connect, $_POST['equi']);
$desc = mysqli_escape_string($connect, $_POST['desc']);
$peca = mysqli_escape_string($connect, $_POST['peca']);
$fim = mysqli_escape_string($connect, $_POST['final']);
$vpeca = mysqli_escape_string($connect, $_POST['vpeca']);
$val = mysqli_escape_string($connect, $_POST['val']);
$data = mysqli_escape_string($connect, $_POST['data']);

if (!empty($cli)) {
  
    $sql = "INSERT INTO servicos(cliente, equipamento, descricao, pecas, fim, valor_pecas, valor_total, dat_exec) VALUES ('$cli', '$equi', '$desc', '$peca', '$fim', '$vpeca', '$val', '$data')";
    $resultado = mysqli_query($connect, $sql);
}

if (!$resultado) {
    echo json_encode(['status'=>false, 'msg'=>'Conexão falhou!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=>true, 'msg'=>'Dados inseridos com sucesso!']);
    mysqli_close($connect);
}

?>