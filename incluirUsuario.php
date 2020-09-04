<?php
include_once('connect.php');

$usuario = mysqli_escape_string($connect, $_POST['usuario']);
$nome = mysqli_escape_string($connect, $_POST['nome']);
$senha = mysqli_escape_string($connect, $_POST['senha']);

if ($usuario > 0) {
    $sql = "UPDATE clientes SET cliente = '$nome', endereco = '$end', num = '$num', bairro = '$bairro', cidade = '$cidade', uf = '$estado', celular = '$telefone' WHERE  id_cliente = '$id_cliente'";
    $resultado = mysqli_query($connect, $sql);
} else {
    $sql = "INSERT INTO clientes(cliente,  endereco, num, bairro, cidade, uf, celular) VALUES ('$nome', '$end', '$num', '$bairro', '$cidade', '$estado', '$telefone')";
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