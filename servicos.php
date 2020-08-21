<?php

include_once('connect.php');

$sql = "SELECT id_cliente, cliente, celular FROM clientes";
$resultado = mysqli_query($connect, $sql);

?>

<style>

textarea#desc {
  margin-bottom: 20px;
 
}

textarea#pec {
  margin-bottom: 20px;
  margin-right: 0px;
 
}

input#equip {
  margin-bottom: 10px;
}

input#fim {
  margin: 30px 0px 10px 0px;
}

label#lfim {
  margin-bottom: 50px;
}

select#cliente {
  margin-bottom: 20px;
}

div#central {
 margin: 50px  0px 0px 200px;
}

button#enviar {
  margin: 10px 10px 0px 0px;
}

button#cancelar {
  margin: 10px 1px 0px 10px;
}

</style>


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

        <!--
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Teste 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuracao</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i>  Deslogar</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        -->
        <div class="right_col" role="main">
          <h3>Serviços</h3>
          
        <div id="central" name="central">
          <form id="form" name="form">
          <div class="col-sm-6 col-md-6">
            <label for="nome">Cliente: </label>
            <select name="cliente" id="cliente" class="form-control">
              <option value="0">Selecione um cliente</option>
              <?php while($dados = $resultado->fetch_array()) {?>
                         
                <option value="<?php echo $dados['id_cliente']; ?>" ><?php echo $dados['cliente']; ?> - <?php echo $dados['celular']; ?></option>
              
              <?php }?>
            </select>
            
            </div>
            <div class="col-sm-6 col-md-3">
            <label for="equip">Equipamento: </label>
            <input type="text" name="equip" id="equip" class="form-control" placeholder="Equipamento do cliente" autocomplete="off" maxlength="30" disabled="true"><br>
          </div>
          <div class="col-sm-6 col-md-4">
            <label for="desc">Descrição: </label>
            <textarea name="desc" id="desc" cols="70" rows="4" maxlength="350" placeholder="Descrição do serviço executado" autocomplete="off" disabled="true"></textarea><br>
          </div>
          <div class="col-sm-6 col-md-4">
            <label for="pec">Peças: </label>
            <textarea name="pec" id="pec" cols="70" rows="4" maxlength="350" placeholder="Peças que foram trocadas" autocomplete="off" disabled="true"></textarea>
          </div>
          <div class="col-sm-6 col-md-2">
            <input type="checkbox" name="fim" id="fim" disabled="true"></textarea><br>
            <input type="hidden" name="fim2" id="fim2">
            <label for="fim" id="lfim">Finalizado: </label>
          </div>  
          <div class="col-sm-6 col-md-3">
            <label for="val_pec">Valor peças:  </label>
            <input type="number" name="val_pec" id="val_pec" class="form-control" placeholder="Valor das peças" maxlength="5" disabled="true"><br>
          </div>
          <div class="col-sm-6 col-md-3">
            <label for="val">Valor Total:  </label>
            <input type="decimal" name="val" id="val" class="form-control" placeholder="Valor Total do serviço" disabled="true"><br>
          </div>
          <div class="col-sm-6 col-md-3">
            <label for="dat">Data de execusão:  </label>
            <input type="date" name="dat" id="dat" class="form-control" disabled="true"><br>
          </div>
          
          <div class="col-sm-6 col-md-4">
          <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled= "true"></button>
          <button id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="limpar()" >Cancelar</button>
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
<!--Mascaras-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="/script/listaservicos.js"></script>

