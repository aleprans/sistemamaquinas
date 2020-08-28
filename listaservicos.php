<?php

include_once('connect.php');

$sql = "select a.cliente, b.* from servicos as b, clientes as a where a.id_cliente = b.id_cliente order by a.cliente";

$resultado = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Control Maquinas</title>
    
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
 
    <!-- Bootstrap -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">
    
  <style>
    td#tdnull {
      text-align: center;
      font-size: 20px;
    }

  </style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <br>
            <div class="navbar nav_title" style="border:0;">
            <img class="" src="imagens/logo.jpg" style="height: 80px; margin-left: 70px; background-size: contain; background-repeat: no-repeat;background-position: center;">
            </div>

            <div class="clearfix"></div>
            
            <!--
            <div class="profile clearfix">
              <div class="profile_pic">
                 <img src="bootstrap/gentelella-master/production/images/img.jpg" class="img-circle profile_img" alt="..."> 
              </div>
              <div class="profile_info">
                <span>Bem-Vindo,</span>
                <h2>Walter </h2>
              </div>
            </div>
            -->
                       

            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Pagina Inicial </a></li>
                  <li><a><i class="fa fa-edit"></i> Menu do sistema <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listaClientes.php">Cliente</a></li>
                      <li><a href="listaservicos.php">Serviços</a></li>
                      <li><a href="financeiro.php">Financeiro</a></li>
                      <li><a href="listaAgenda.php">Agenda</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
 
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            
          </div>
        </div>

        <div class="right_col" role="main">
        <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>


          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">EXCLUIR ......</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja EXCLUIR definitivamente esse Serviço?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Excluir</button>
                </div>
              </div>
            </div>
          </div>

          <h3>Lista de Serviços</h3>
          <div class="clearfix"></div>

          <!--img src="imagens/rolling.gif" id="loading-indicator" style="display:none;"/-->
          <div class="content">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <!--div class="card-body col-sm-12 col-xs-12"-->
                    <div class = "table-responsive">
                      <table id="id_table_usuario" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar" data-search="true"  data-show-toggle="true"  data-pagination="true">
                        <thead>
                          <tr>
                            <th data-sortable="true" data-field="id" >Cliente</th>
                            <th >Equipamento</th>
                            <th >Serviço</th>
                            <th >Peças</th>
                            <th >Custo Peças</th>
                            <th >Valor Peças</th>
                            <th >Valor total</th> 
                            <th >Data execução</th>
                            <th >Finalizado</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $row = mysqli_num_rows($resultado);
                          if ($row > 0) {
                            while ($dados = $resultado->fetch_array()) {?>
                              
                              <tr>
                                <td><?php echo $dados['cliente']; ?></td>
                                <td><?php echo $dados['equipamento']; ?></td>
                                <td><?php echo $dados['descricao']; ?></td>
                                <td><?php echo $dados['pecas']; ?></td>
                                <td><?php echo $dados['vcust_peca']; ?></td>
                                <td><?php echo $dados['valor_pecas']; ?></td>
                                <td><?php echo $dados['valor_total']; ?></td>
                                <td><?php echo $dados['dat_exec']; ?></td>
                                <td><?php 
                                if ($dados['fim'] == 0) {
                                  echo 'NÂO';
                                }else {
                                  echo 'SIM'; }?></td>
                                <td><button class="btn btn-primary btn-sm" onclick="editar(<?php echo $dados['id_servico'];?>)"><i class="fa fa-pencil"></i></button></td>
                                <td><button id="mod" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" onClick="excluir(<?php echo $dados['id_servico'];?>)"><i class="fa fa-trash"></i></button></td>
                              </tr><?php 
                            }}else {?>
                              <td id="tdnull"colspan="8">Nenhum serviço Cadastrado</td><?php
                            }?>
                          </tbody>
                    </table>
                    <button onclick="window.location = 'servicos.php'" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="theModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
    
    <footer>
    </footer>
    
  </body>
</html>
<!-- jQuery -->
<script src="bootstrap/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="bootstrap/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bootstrap/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="bootstrap/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="bootstrap/gentelella-master/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="bootstrap/gentelella-master/vendors/moment/min/moment.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="bootstrap/gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="bootstrap/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="bootstrap/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="bootstrap/gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="bootstrap/gentelella-master/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="bootstrap/gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="bootstrap/gentelella-master/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="bootstrap/gentelella-master/build/js/custom.min.js"></script>    
<!-- jQuery format Money -->
<script src="//raw.github.com/plentz/jquery-maskmoney/master/jquery.maskMoney.js" type="text/javascript"></script>
<script src="/script/listaServicos.js"></script>