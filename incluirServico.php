<?php

include_once('connect.php');

$nome = mysqli_escape_string($connect, $_POST['nome']);
$end = mysqli_escape_string($connect, $_POST['end']);
$num = mysqli_escape_string($connect, $_POST['num']);
$bairro = mysqli_escape_string($connect, $_POST['bar']);
$cidade = mysqli_escape_string($connect, $_POST['cid']);
$estado = mysqli_escape_string($connect, $_POST['est']);
$telefone = mysqli_escape_string($connect, $_POST['tel']);

if (!empty($nome)) {
    
$sql = "INSERT INTO clientes(cliente,  endereco, num, bairro, cidade, uf, celular) VALUES ('$nome', '$end', '$num', '$bairro', '$cidade', '$estado', '$telefone')";
$resultado = mysqli_query($connect, $sql);
header('Location: clientes.php');
}
echo ('teste');

?>