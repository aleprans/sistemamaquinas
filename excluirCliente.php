<?php
include_once('connect.php');

if (isset($_GET['id_cliente'], $connect)) {
    echo retorna($_GET['id_cliente'], $connect);

}

function retorna($cliente, $connect){

    $sql = "SELECT id_cliente from servicos where id_cliente = '$cliente' ;";
    $verif = mysqli_query($connect, $sql);
    $rows = mysqli_num_rows($verif);

    if ($rows <= 0) {
        $sql = "DELETE FROM clientes WHERE id_cliente = '$cliente'";
        $resultado = mysqli_query($connect, $sql);

        if ($resultado) {
            echo json_encode(['status'=>true, 'msg'=>'Dados Excluidos com Sucesso!']);
            mysqli_close($connect);
        }else {
            echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
            mysqli_close($connect);
        }
    }else {
        echo json_encode(['status'=>false, 'msg'=>'Cliente não pode ser excluido! Há serviços vinculados a ele.']);
        mysqli_close($connect);
    }
}
?>