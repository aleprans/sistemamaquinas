<?php
session_start();

include_once('autentica.php');
include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo/usuario.css">
	  
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

  <body>
        <?php
        include_once('menu.php');
        ?>
        <div class="right_col" role="main">
        <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center" ></div>
          <h1>Usuarios</h1>
          <input type="hidden" name="nivlog" id="nivlog" value="<?php echo $_SESSION['usuario']['niv']?>">
          <input type="hidden" name="usulog" id="usulog" value="<?php echo $_SESSION['usuario']['usu']?>">
        <div id="central" name="central">
          <form action="" method="post" id="form">
            
            <div class="form-group col-md-4" id="usu">
                <input type="hidden" name="id_usu" id="id_usu">
                <label for="usu">Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" autocomplete="off" maxlength="8">
            </div>
            
            <div class="form-group col-md-5">
              <label for="nome">nome:</label>
              <input type="text" id="nome" name="nome" class="form-control" autocomplete="off" disabled="true" maxlength="45">
            </div>
            
            <div class="form-group col-md-3">
              <label for="nivel">Nivel de acesso:</label>
              <select name="nivel" id="nivel" class="form-control" disabled="true">
                <option value="0">Usuário</option>
                <option value="1">Administrador</option>
                </select>
            </div>
         
            <div class="form-group col-md-4">
              <label for="sen">Senha:</label>
              <input type="password" id="sen" name="sen" class="form-control" autocomplete="off" disabled="true" maxlength="8">
            </div>
          
            <div class="form-group col-md-4">
              <label for="csen">Confirmação de senha:</label>
              <input type="password" id="csen" name="csen" class="form-control" autocomplete="off" disabled="true" maxlength="8">
            </div>
          
          
          <div class="col-sm-5 col-md-5">
          <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled="true"></button>
          <input id="excluir" name="excluir" value="excluir" type="button" class="btn btn-danger btn-lg" onClick="deletar()" disabled="true"></button>
          <button id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="desabilitar()" >Cancelar</button>
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

<script src="script/usuario.js"></script>
