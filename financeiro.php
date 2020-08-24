<?php

/*include('rotinas/conexao.php');
*/
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
          <h3>Controle Financeiro</h3>
        <div class="clearfix"></div>

          <div class="x_content">
            <form id="cadastroForm" name="cadform" method="POST" action="insert_info_jr.php" enctype="multipart/form-data" >
              <div class="row">
                <input type="hidden" id="requerente"  name="requerente" class="form-control" value="7" />
                <!-- LOCALIZAÇÃO  -->
                <div class=" col-sm-6 col-md-6 col-lg-6">
                  <label for="localizacao">Selecione a cidade que seja suporte</label>
                  <select id="localizacao" name="localizacao" class="form-control" required> </select>                            
                </div>
                <!-- CATEGORIA -->
                <div class="col-sm-6 col-md-6 ">
                  <label for="categoria">Selecione o modulo do sistema</label>
                  <select id="categoria" name="categoria" class="form-control" required ></select>                            
                </div>    
              </div>         
              <br>
              <!-- TITULO -->
              <label for="assunto">Assunto:</label>
              <input type="text" id="assunto" class="form-control" name="assunto"  autocomplete="off" required  />
              <br>
              <!-- MENSAGEM -->
              <div id="msg" class="alert alert-success" role="alert"style="display:none; text-align: center">
                Enviado com sucesso!
              </div>
              <label for="mensagem">Mensagem</label>
              <textarea id="content" name="content" rows="15"  class="form-control" data-parsley-trigger="keyup" required></textarea>
              <br/>
              <!-- ARQUIVOS-->
              
              <div id="fileupload" class="container"style="display: inline-flex">
                <input style="display:none" type="file" onchange="updateList()" name="arquivos[]" id="arquivos" multiple="multiple">
                <label style="padding-top:12px" class="btn btn-primary" for="arquivos">Selecionar arquivos</label>
                <!--div class="col-md-9 col-sm-9 col-xs-2 "-->
                <button type="button" style="display:flex" onclick="enviar()" class="btn btn-success btn-lg" >Enviar</button>
                  <!--input type="submit" name="enviar" id="enviar" onclick="enviar()" class="btn btn-success btn-lg" /-->
              </div> 
                <div id="exibe"></div>
              <!--/div-->
              </div>
              <br/> 
              <br/> 
              <br/>  

              <div class="row" >
                          
              </div>

            </form>
           
            
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
   
<script type="text/javascript">

//   $('#localizacao').select2({
//               ajax:{
//                  url: 'buscar_select_loc.php',
//                  dataType: 'json',
//                  delay: 250,
//                  type: 'POST',
//                  data: function (params) {
//                     return { term: params.term, page_limit: 50 };
//                  },
//                  processResults: function (data) {
//                     return { results: data };
//                  },
                 
//                  cache: true
//               },

//               escapeMarkup: function (markup) { return markup; },
//               placeholder: {id: '-1', text: 'Selecione a Cidade'},
//               width: '100%',
//               language: 'pt-BR'
//            });

//   $('#categoria').select2({
//               ajax: {
//                  url: 'buscar_select_cat.php',
//                  dataType: 'json',
//                  delay: 250,
//                  type: 'POST',
//                  data: function (params) {
//                     return { term: params.term, page_limit: 50 };
//                  },
//                  processResults: function (data) {
//                     return { results: data };
//                  },
//                  cache: true
//               },

//               escapeMarkup: function (markup) { return markup; },
//               placeholder: {id: '-1', text: 'Selecione a Categoria'},
//               width: '100%',
//               language: 'pt-BR'
//            });
          
</script>

