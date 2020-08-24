<?php

/*include('rotinas/conexao.php');
*/
?>

<script>

var saveArray = []

updateList = function() {
  var input = document.getElementById('arquivos');
  var output = document.getElementById('exibe');
  var children = "";
    for (var i = 0; i < input.files.length; ++i) {
        saveArray.push(input.files.item(i))
       
    }
    for(var i = 0; i < saveArray.length; ++i){
      children += '<li id="file_'+i+'">' + saveArray[i].name + '<i  onclick="remover(file_'+i+','+i+')" style="margin-left:7px" class="fa fa-times-circle fa-lg text-danger" aria-hidden="true"></i></li>';
    }
    output.innerHTML = '<ul >'+children+' </ul>'
}

function remover(n,cont){
  var input = document.getElementById('arquivos');
  $(n).remove()
  saveArray.splice(cont, 1)
}

function enviar(){
      
  var form_data = new FormData();
  //var str = $("#cadastroForm").serialize();
  form_data.append('requerente', document.getElementById('requerente').value);
  form_data.append('localizacao', document.getElementById('localizacao').value);
  form_data.append('categoria', document.getElementById('categoria').value);
  form_data.append('assunto', document.getElementById('assunto').value);
  form_data.append('content', document.getElementById('content').value);
  
  for ( var key in saveArray ) {

      form_data.append(key, saveArray[key]);
  }
  
  $.ajax({
    url:'insert_info_jr.php',
    type:'post',
    dataType:'json',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data:form_data,
    success:function(data){
      
      if(data.status == true){
          alert(data.msg)
          $('#exibe>ul').remove()
          $('#localizacao').val('').trigger('change')
          $('#categoria').val('').trigger('change')
          $('#requerente').val('')
          $('#assunto').val('')
          $('#content').val('')
          saveArray = []
      }else{
        alert(data.msg)
      }
    },
    error:function(e){
      console.log(e)
    }
  });
    
}

</script>

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
     

        <div class="right_col" role="main">
          <h3>Formulario de suporte</h3>
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

  $('#localizacao').select2({
              ajax:{
                 url: 'buscar_select_loc.php',
                 dataType: 'json',
                 delay: 250,
                 type: 'POST',
                 data: function (params) {
                    return { term: params.term, page_limit: 50 };
                 },
                 processResults: function (data) {
                    return { results: data };
                 },
                 
                 cache: true
              },

              escapeMarkup: function (markup) { return markup; },
              placeholder: {id: '-1', text: 'Selecione a Cidade'},
              width: '100%',
              language: 'pt-BR'
           });

  $('#categoria').select2({
              ajax: {
                 url: 'buscar_select_cat.php',
                 dataType: 'json',
                 delay: 250,
                 type: 'POST',
                 data: function (params) {
                    return { term: params.term, page_limit: 50 };
                 },
                 processResults: function (data) {
                    return { results: data };
                 },
                 cache: true
              },

              escapeMarkup: function (markup) { return markup; },
              placeholder: {id: '-1', text: 'Selecione a Categoria'},
              width: '100%',
              language: 'pt-BR'
           });
          
</script>

