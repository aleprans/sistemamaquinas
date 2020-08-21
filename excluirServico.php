<?php
include_once('connect.php');

if (isset($_GET['servico'], $connect)) {
    echo retorna($_GET['servico'], $connect);

}

function retorna($servico, $connect){
    $sql = "DELETE FROM servicos WHERE id_servico = '$servico'";
    $resultado = mysqli_query($connect, $sql);

if ($resultado) {
    echo json_encode(['status'=>true, 'msg'=>'Dados Excluidos com Sucesso!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
    mysqli_close($connect);
}
}
?>