<?php
include_once('connect.php');

function retorna($id_servico, $connect) {
    
    if ($id_servico == 0) {
        return json_encode(null);
    }
    $sql = "select * from servicos where id_servico = '$id_servico'";
    $resultado = mysqli_query($connect, $sql);
    $row_servico = mysqli_fetch_assoc($resultado);
    $dados['equip'] = $row_servico['equipamento'];
    $dados['desc'] = $row_servico['descricao'];
    $dados['pec'] = $row_servico['pecas'];
    $dados['vpec'] = $row_servico['valor_pecas'];
    $dados['vto'] = $row_servico['valor_total'];
    $dados['dex'] = $row_servico['dat_exec'];
    $dados['fim'] = $row_servico['fim'];
    $dados['idc'] = $row_servico['id_cliente'];
   
    return json_encode($dados);
}

if (isset($_GET['servico'])) {
    echo retorna($_GET['servico'], $connect);
}

?>