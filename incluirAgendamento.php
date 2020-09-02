<?php
include_once('connect.php');

$id_age = mysqli_escape_string($connect, $_POST['id_age']);
$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente']);
$ag_data = mysqli_escape_string($connect, $_POST['data']);
$ag_hora = mysqli_escape_string($connect, $_POST['hora']);
$conc = mysqli_escape_string($connect, $_POST['conc']);

if ($id_age > 0) {
    $sql = "UPDATE agenda SET id_cliente = '$id_cliente', ag_data = '$ag_data', ag_hora = '$ag_hora', conc = $conc WHERE id_agenda = '$id_age';";
    $resultado = mysqli_query($connect, $sql);
}else {
    $sql = "INSERT INTO agenda (id_cliente, ag_data, ag_hora, conc) VALUES ('$id_cliente', '$ag_data', '$ag_hora', $conc);";
    $resultado = mysqli_query($connect, $sql);
}

if ($resultado) {
    echo json_encode(['status'=> true, 'msg'=> 'Solicitação realizada com sucesso!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=> false, 'msg'=> 'Conexão falhou!']);
    mysqli_close($connect);
}


?>