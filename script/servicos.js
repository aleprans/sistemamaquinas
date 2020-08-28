$(document).ready(function() {
  $('#cliente').select2()
})

// Pesquisa ID na url
function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length)
    var param_value = false
    var params = loc.split("&")
    for (i=0; i<params.length; i++) {
        param_name = params[i].substring(0,params[i].indexOf('='))
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=')+1)
        }
    }
    if (param_value) {
        return param_value
    } else {
        return undefined
    }
}

//Variaveis comuns
var id_servico = queryString("id_serv")
var $desc = $('#desc')
var $equip = $('#equip')
var $pec = $('#pec')
var $cpec = $('#valc_pec')
var $vpec = $('#val_pec')
var $vtot = $('#val')
var $dte = $('#dat')
var $fim = $('#fim')
var $id_cli = $('#cliente')
var $env = $('#enviar')
var $serv = $('#id_serv')


$('#cliente').on('change',function() {
  
  if ($(this).val() == 0) {
    $desc.attr('disabled', true)
    $equip.attr('disabled', true)
    $pec.attr('disabled', true)
    $cpec.attr('disabled', true)
    $vpec.attr('disabled', true)
    $vtot.attr('disabled', true)
    $dte.attr('disabled', true)
    $fim.attr('disabled', true)
    $env.attr('disabled', true)
    window.location = "servicos.php"

  } else {
      $desc.attr('disabled', false)
      $equip.attr('disabled', false)
      $pec.attr('disabled', false)
      $cpec.attr('disabled', false)
      $vpec.attr('disabled', false)
      $vtot.attr('disabled', false)
      $dte.attr('disabled', false)
      $fim.attr('disabled', false)
      $env.attr('disabled', false)
  } 
})

if (id_servico) {
  $serv.val(id_servico)
    $id_cli.attr('disabled', true)
   $.getJSON('pesq_servico.php', {
    servico: id_servico
  },function(json) {
    $equip.val(json.equip)
    $desc.val(json.desc)
    $pec.val(json.pec)
    $cpec.val(json.cpec)
    $vpec.val(json.vpec)
    $vtot.val(json.vto)
    $dte.val(json.dex)
    if (json.fim == 0) {
        $fim.attr('checked', false)
    }else {
        $fim.attr('checked', true)
    }
    $id_cli.val(json.idc).trigger('change')

    $desc.attr('disabled', false)
    $equip.attr('disabled', false)
    $pec.attr('disabled', false)
    $cpec.attr('disabled', false)
    $vpec.attr('disabled', false)
    $vtot.attr('disabled', false)
    $dte.attr('disabled', false)
    $fim.attr('disabled', false)
    $env.attr('disabled', false)
  })
}

//Mascara do valor
$('#val').mask('#.##0,00', {reverse: true});
$('#val_pec').mask('#.##0,00', {reverse: true})
$('#valc_pec').mask('#.##0,00', {reverse: true})

function limpar(){
  if ($('#cliente').val() == 0){
    window.location = 'listaservicos.php'
  }else {
  window.location ='servicos.php'
  }
}

//Validando campos
function validar() {
  $equip.attr('style', 'border-color:gren')
  $desc.attr('style', 'border-color:gren')
  $cpec.attr('style', 'border-color:gren')
  $vpec.attr('style', 'border-color:gren')
  $vtot.attr('style', 'border-color:gren')
  $dte.attr('style', 'border-color:gren')
  
  var msg = "Campo inválido!"
  if ($equip.val().length < 1) {

    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 5000)
    $equip.focus()
    $equip.attr('style', 'border-color:red')
    exit
  }

  if ($desc.val().length < 1) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 5000)
    $desc.focus()
    $desc.attr('style', 'border-color:red')
    exit
  }

  if ($pec.val().length > 0) {
   
    if ($cpec.val() == 0) {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    }, 5000)
      $cpec.focus()
      $cpec.attr('style', 'border-color:red')
      exit
    }
  }
  
  if ($cpec.val() > 0) {
    if ($vpec.val() == 0) {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    }, 5000)
      $vpec.focus()
      $vpec.attr('style', 'border-color:red')
      exit
    }
  }

  if ($vtot.val() <= 0 || $vtot.val() <= $vpec.val()) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s' )
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 5000)
    $vtot.focus()
    $vtot.attr('style', 'border-color:red')
    exit
  }

  if (!$dte.val()) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 5000)
    $dte.focus()
    $dte.attr('style', 'border-color:red')
    exit
  }
  enviar()
}

// Textos em maiusculo

$('#equip').blur(function() {
  var tx = $('#equip').val()
  $('#equip').val(tx.toUpperCase())
})

// Envia dados para o Banco de Dados
function enviar(){

  var $vtot2 = $vtot.val().replace(",",".")

  var form_data = new FormData()

  form_data.append('id_servico', id_servico)
  form_data.append('id_cli', $id_cli.val())
  form_data.append('equip', $equip.val())
  form_data.append('desc', $desc.val())
  form_data.append('pec', $pec.val())
  form_data.append('fim', $fim.is(':checked'))
  form_data.append('cpec', $cpec.val())
  form_data.append('vpec', $vpec.val())
  form_data.append('vtot', $vtot2)
  form_data.append('dte', $dte.val())

  $.ajax({
    url: 'incluirServico.php',
    type: 'post',
    dataType: 'json',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data: form_data,
    success:function(data){

      if(data.status == true){
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-success')
        $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        window.location = "listaservicos.php"
      }, 5000)
      
      }else{
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
      }, 5000)
      }
    },
    error:function(e){
      console.log(e)
    }
  })
}