<?php

include_once('connect.php');

function retorna($dtini, $dtfin, $conc, $connect) {
    
    if ($dtini == "") {
        $dtini = "1900-01-01";
    }

    if ($dtfin == "" && $conc == 2) {
        $sql =  "select a.*,  b.* from agenda as a inner join clientes as b on b.id_cliente = a.id_cliente where ag_data > '$dtini' order by ag_data;";
    }else if($dtfin == "" && $conc != 2) {
        $sql =  "select a.*,  b.* from agenda as a inner join clientes as b on b.id_cliente = a.id_cliente where conc = '$conc' and ag_data > '$dtini' order by ag_data;";
    }else if ($dtfin != "" && $conc == 2) {
        $sql =  "select a.*,  b.* from agenda as a inner join clientes as b on b.id_cliente = a.id_cliente where ag_data between '$dtini' and '$dtfin' order by ag_data;";
    }else if ($dtfin != "" && $conc != 2) {
        $sql =  "select a.*,  b.* from agenda as a inner join clientes as b on b.id_cliente = a.id_cliente where ag_data between '$dtini' and '$dtfin' and conc = '$conc' order by ag_data;";
    }

    $resultado = mysqli_query($connect, $sql);
    foreach ($resultado as $key => $row_agenda) {
        $dados[$key]['id_agenda'] = $row_agenda['id_agenda'];
        $dados[$key]['ag_data'] = $row_agenda['ag_data'];
        $dados[$key]['ag_hora'] = $row_agenda['ag_hora'];
        $dados[$key]['conc'] = $row_agenda['conc'];
        $dados[$key]['cliente'] = $row_agenda['cliente'];
        $dados[$key]['endereco'] = $row_agenda['endereco'];
        $dados[$key]['num'] = $row_agenda['num'];
        $dados[$key]['bar'] = $row_agenda['bairro'];
        $dados[$key]['cel'] = $row_agenda['celular'];
        if(strtotime($dados[$key]['ag_data']) < strtotime(date('Y-m-d')) && $dados[$key]['conc'] == 0 ){
           $dados[$key]['bgdanger'] = 'danger';
        }
        if(strtotime($dados[$key]['ag_data']) == strtotime(date('Y-m-d')) && $dados[$key]['conc'] == 0 ){
            $dados[$key]['bgdanger'] = 'success';
         }
        
    }
    return json_encode($dados);
}

function retorna2($id_age, $connect){
    $sql = "SELECT * FROM agenda WHERE id_agenda = '$id_age';";
    $resultado = mysqli_query($connect, $sql);
    $row_agenda = mysqli_fetch_assoc($resultado);
    $dados['cliente'] = $row_agenda['id_cliente'];
    $dados['ag_data'] = $row_agenda['ag_data'];
    $dados['ag_hora'] = $row_agenda['ag_hora'];
    $dados['conc'] = $row_agenda['conc'];

    return json_encode($dados);

}

if (isset($_GET['dtini'])) {
    echo retorna($_GET['dtini'], $_GET['dtfin'], $_GET['conc'], $connect);
}

if (isset($_GET['id_agenda'])) {
    echo retorna2($_GET['id_agenda'], $connect);
}
?>