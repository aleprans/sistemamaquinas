<?php
include_once('connect.php');

$id_age = mysqli_escape_string($connect, $_POST['id_age']);
$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente']);
$ag_data = mysqli_escape_string($connect, $_POST['data']);
$ag_hora = mysqli_escape_string($connect, $_POST['hora']);
$conc = mysqli_escape_string($connect, $_POST['conc']);
$hoje = date("Y-m-d");



   
if ($id_age > 0) {
    $sql = "UPDATE agenda SET id_cliente = '$id_cliente', ag_data = '$ag_data', ag_hora = '$ag_hora', conc = $conc WHERE id_agenda = '$id_age';";
    $resultado = mysqli_query($connect, $sql);
}else {
    $sql = "SELECT id_agenda from agenda where id_cliente = '$id_cliente' and conc = 0;";
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows <= 0) {
        $sql = "INSERT INTO agenda (id_cliente, ag_data, ag_hora, conc) VALUES ('$id_cliente', '$ag_data', '$ag_hora', $conc);";
        $resultado = mysqli_query($connect, $sql);
    }else {
        echo json_encode(['status'=>false, 'msg'=>'Já existe agendamento em aberto para esse Cliente!']);
        mysqli_close($connect);
        exit;
    }
}


if ($resultado) {
    echo json_encode(['status'=> true, 'msg'=> 'Solicitação realizada com sucesso!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=> false, 'msg'=> 'Conexão falhou!']);
    mysqli_close($connect);
}

?>