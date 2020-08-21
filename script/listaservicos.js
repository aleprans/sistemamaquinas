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

var id_servico = queryString("id_serv")
var $desc = $('#desc')
var $equip = $('#equip')
var $pec = $('#pec')
var $vpec = $('#val_pec')
var $vtot = $('#val')
var $dte = $('#dat')
var $fim = $('#fim')
var $id_cli = $('#cliente')
var $env = $('#enviar')

$('#cliente').on('change',function() {
  if ($(this).val() == 0) {
    $desc.attr('disabled', true)
    $equip.attr('disabled', true)
    $pec.attr('disabled', true)
    $vpec.attr('disabled', true)
    $vtot.attr('disabled', true)
    $dte.attr('disabled', true)
    $fim.attr('disabled', true)
    $env.attr('disabled', true)
    $('#form').each(function(){
      this.reset()
    })
  } else {
      $desc.attr('disabled', false)
      $equip.attr('disabled', false)
      $pec.attr('disabled', false)
      $vpec.attr('disabled', false)
      $vtot.attr('disabled', false)
      $dte.attr('disabled', false)
      $fim.attr('disabled', false)
      $env.attr('disabled', false)
  } 
})

if (id_servico) {
  
   $.getJSON('pesq_servico.php', {
    servico: id_servico
  },function(json) {
    $equip.val(json.equip)
    $desc.val(json.desc)
    $pec.val(json.pec)
    $vpec.val(json.vpec)
    $vtot.val(json.vto)
    $dte.val(json.dex)
    if (json.fim == 0) {
        $fim.attr('checked', false)
    }else {
        $fim.attr('checked', true)
    }
    $id_cli.val(json.idc)

    $desc.attr('disabled', false)
        $equip.attr('disabled', false)
        $pec.attr('disabled', false)
        $vpec.attr('disabled', false)
        $vtot.attr('disabled', false)
        $dte.attr('disabled', false)
        $fim.attr('disabled', false)
        $env.attr('disabled', false)
  })
}
$('#val').mask('#.##0,00', {reverse: true});

function limpar(){
  if ($('#cliente').val() == 0){
    window.location = 'listaservicos.php'
  }else {
  window.location ='servicos.php'
  }
}

function validar() {
  var msg = "Campo inválido!"
  if ($equip.val().length < 1) {
    alert(msg)
    $equip.focus()
    exit
  }

  if ($desc.val().length < 1) {
    alert(msg)
    $desc.focus()
    exit
  }

  if ($vtot.val() <= 0){
    
  }
}

// Textos em maiusculo

$('#equip').blur(function() {
  var tx = $('#equip').val()
  $('#equip').val(tx.toUpperCase())
})