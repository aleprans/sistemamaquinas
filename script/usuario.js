// Variaveis em Comuns
var $env = $('#enviar')
var $nom = $("#nome")
var $usu = $("#usu")
var $sen = $("#sen")
var $csen = $("#csen")
var $id_usu = $('#id_usu')
// Abilitar campos
function abilitar(){
  $nom.attr('disabled', false)
  $usu.attr('disabled', false)
  $sen.attr('disabled', false)
  $csen.attr('disabled', false)
  $env.attr('disabled', false)
}

// Desabilitar campos
function desabilitar(){
  $nom.attr('disabled', true)
  $usu.attr('disabled', true)
  $sen.attr('disabled', true)
  $csen.attr('disabled', true)
  $env.attr('disabled', true)
}

// Enviar dados pro Banco de Dados
function enviar(){
    
var form_data = new FormData();
form_data.append('usuario', $usu.val())
form_data.append('nome', $non.val())
form_data.append('senha', $sen.val())
  
$.ajax({
  url:'incluirUsuario.php',
  type:'post',
  dataType:'json',
  enctype: 'multipart/form-data',
  processData: false,
  contentType: false,
  cache: false,
  data:form_data,
  success:function(data){
    
    if(data.status == true){
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-success')
      $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        window.location = "listaClientes.php"
      }, 3000)
    }else{
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(data.msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
      }, 3000)
    }
  },
  error:function(e){
    console.log(e)
  }
});

// Validação de campos obrigatórios
}
function validar() {
  var msg = "Campo Inválido!"

  $usu.attr('style', 'border-color:gren')
  $nom.attr('style', 'border-color:gren')
  $sen.attr('style', 'border-color:gren')

  if ($usu.val().length < 4) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $usu.focus()
    $usu.attr('style', 'border-color:red')
    exit
  }

  
  if ($nom.val() == "") {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  },3000)
    $nom.focus()
    $nom.attr('style', 'border-color:red')
    exit
  }
  
  if ($sen.val() < 4) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  },3000)
    $sen.focus()
    $sen.attr('style', 'border-color:red')
    exit
  }
  if ($csen.val() != $sen.val()) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text('Não confere com campo senha')
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  },3000)
    $csen.focus()
    $csen.attr('style', 'border-color:red')
    exit
  }
enviar()
}

// Pesquisa usuario por nome
$(document).ready(function(){
  $('#usu').focus()
  $('#usu').blur(function() {
    alert('teste')
  //   $.getJSON('pesq_usuario.php', {
  //     usuario: $(this).val()
  //   },function(json) {
  //     $nom.val(json.nom)
  //     $id_usu.val(json.id_usu)
  //   })
  //     $nom.val("")
  //     $sen.val("")
  //     $csen.val("")
  //     abilitar()
  //     $nom.focus()
  })
})

// Textos em maiusculos

$('#nome').blur(function() {
  var tx = $('#nome').val()
  $('#nome').val(tx.toUpperCase())
})

$('#usu').blur(function() {
  var tx = $('#usu').val()
  $('#usu').val(tx.toUpperCase())
})
  
