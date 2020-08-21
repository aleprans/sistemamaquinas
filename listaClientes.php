<?php


include_once('connect.php');

$sql = "select * from clientes";

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
    <script src="/script/listaClientes.js"></script>
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
    <!-- Bootstrap -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="bootstrap/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="bootstrap/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="bootstrap/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="bootstrap/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="bootstrap/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="bootstrap/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">

    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars 
    <link rel="stylesheet" href="js/jQuery-File-Upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="js/jQuery-File-Upload/css/jquery.fileupload-ui.css">

    -->
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
                      <li><a href="agenda.php">Agenda</a></li>
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
          <h3>Lista de Clientes</h3>
          <div class="clearfix"></div>

          <div class="content">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class = "table-responsive">
                      <table id="id_table_usuario" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar" data-search="true"  data-show-toggle="true"  data-pagination="true">
                        <thead>
                          <tr>
                            <th data-sortable="true" data-field="id" >Cliente</th>
                            <th >Celular</th>
                            <th >endereço</th>
                            <th >Numero</th>
                            <th >bairro</th>
                            <th >cidade</th>
                            <th >UF</th> 
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $row = mysqli_num_rows($resultado);
                          if ($row > 0) {
                            while ($dados = $resultado->fetch_array()) {?>
                              <tr>
                                <td><?php echo $dados['cliente']; ?></td>
                                <td><?php echo $dados['celular']; ?></td>
                                <td><?php echo $dados['endereco']; ?></td>
                                <td><?php echo $dados['num']; ?></td>
                                <td><?php echo $dados['bairro']; ?></td>
                                <td><?php echo $dados['cidade']; ?></td>
                                <td><?php echo $dados['uf']; ?></td>
                                <td><button class="btn btn-primary btn-sm" onclick="editar(<?php echo $dados['id_cliente'];?>)"><i class="fa fa-pencil"></i></button></td>
                                <td><button class="btn btn-danger btn-sm" onclick="excluir(<?php echo $dados['id_cliente'];?>)"><i class="fa fa-trash"></i> </button></td>
                              </tr><?php 
                            }}else {?>
                              <td id="tdnull"colspan="7">Nenhum Cliente Cadastrado</td><?php
                            }?>
                            
                          </tbody>
                          
                    </table>
                    <button class="btn btn-success btn-lg"><i class="fa fa-user-plus" onclick="window.location = 'clientes.php'"></i> </button>
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
