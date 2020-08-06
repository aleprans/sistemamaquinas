<?php

include_once('connect.php');

function retorna($id_cliente, $connect) {
    if ($id_cliente == 0) {
        return json_encode(null);
    }
    $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
    $resultado = mysqli_query($connect, $sql);
    $row_cliente = mysqli_fetch_assoc($resultado);
    $dados['tel'] = $row_cliente['celular'];
    $dados['end'] = $row_cliente['endereco'];
    $dados['num'] = $row_cliente['num'];
    $dados['bar'] = $row_cliente['bairro'];
    $dados['cid'] = $row_cliente['cidade'];
    $dados['est'] = $row_cliente['uf'];

    return json_encode($dados);
}

if (isset($_GET['cliente'])) {
    echo retorna($_GET['cliente'], $connect);
}

?>