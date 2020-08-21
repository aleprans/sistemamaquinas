  function enviar(){
      
  var form_data = new FormData();
  form_data.append('id_cli', document.getElementById('id_cli').value);
  form_data.append('nome', document.getElementById('nome').value);
  form_data.append('tel', document.getElementById('tel').value);
  form_data.append('end', document.getElementById('end').value);
  form_data.append('num', document.getElementById('num').value);
  form_data.append('bar', document.getElementById('bar').value);
  form_data.append('cid', document.getElementById('cid').value);
  form_data.append('est', document.getElementById('est').value);
    
  $.ajax({
    url:'incluirCliente.php',
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
        
          $('#id_cli').val('')
          $('#nome').val('')
          $('#tel').val('')
          $('#end').val('')
          $('#num').val('')
          $('#bar').val('')
          $('#cid').val('')
          $('#est').val('')
      }else{
        
        alert(data.msg)
      }
    },
    error:function(e){
      console.log(e)
    }
  });
    
}
function validar() {
  
  var tel = document.getElementById("tel").value
  if (tel.length < 14) {
    alert ('Campo Telefone inválido')
    $('#tel').focus()
    exit
  }

  var name = document.getElementById("nome")
  if (name.value == "") {
    alert ('Campo nome inválido')
    name.focus()
    exit
  }

  
enviar()
}

// Pesquisa cliente

$(document).ready(function(){
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
  
  var id_cliente = queryString("id_cli")

  if (id_cliente) {
    var $nam = $("#nome")
    var $tel = $("#tel")
    var $end = $("#end")
    var $num = $("#num")
    var $bar = $("#bar")
    var $cid = $("#cid")
    var $est = $("#est")
    var $idc = $("#id_cli")
    $.getJSON('pesq_cliente.php', {
      id_cliente: id_cliente
    },function(json) {
      $nam.val(json.nom)
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
      $tel.attr('disabled', true)
  })}else {

  $('#tel').focus()
  $('#tel').blur(function() {
    var $nam = $("#nome")
    var $tel = $("#tel")
    var $end = $("#end")
    var $num = $("#num")
    var $bar = $("#bar")
    var $cid = $("#cid")
    var $est = $("#est")
    var $idc = $("#id_cli")
    $.getJSON('pesq_cliente.php', {
      cliente: $(this).val()
    },function(json) {
      $nam.val(json.nom)
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
    })
    disable()
    // verificar ativação

function disable(){
  if ($tel.val() != "") {
      $nam.attr('disabled', false)
      $end.attr('disabled', false)
      $num.attr('disabled', false)
      $bar.attr('disabled', false)
      $cid.attr('disabled', false)
      $est.attr('disabled', false)
     $('#enviar').attr('disabled', false)
    }else {
       $nam.attr('disabled', true)
      $end.attr('disabled', true)
      $num.attr('disabled', true)
      $bar.attr('disabled', true)
      $cid.attr('disabled', true)
      $est.attr('disabled', true)
     $('#enviar').attr('disabled', true)
    }
}
  })}


  // Textos em maiusculos

  $('#nome').blur(function() {
    var tx = $('#nome').val()
    $('#nome').val(tx.toUpperCase())
  })

  $('#end').blur(function() {
    var tx = $('#end').val()
    $('#end').val(tx.toUpperCase())
  })
  
    $('#num').blur(function() {
    var tx = $('#num').val()
    $('#num').val(tx.toUpperCase())
  })

    $('#bar').blur(function() {
    var tx = $('#bar').val()
    $('#bar').val(tx.toUpperCase())
  })
  
    $('#cid').blur(function() {
    var tx = $('#cid').val()
    $('#cid').val(tx.toUpperCase())
  })
  
  $('#est').blur(function() {
    var tx = $('#est').val()
    $('#est').val(tx.toUpperCase())
  })
})
  
  //Limpa campos

  function limpar(){
   
    $('#id_cli').val('')
    var $tel = $('#tel')
    $tel.attr('disabled', false)
    $tel.on('change', function() {
      //$('#id_cli').val('')
      $('#nome').val('')
      $('#end').val('')
      $('#num').val('')
      $('#bar').val('')
      $('#cid').val('')
      $('#est').val('')
    })
    if ($tel.val() == "") {
      window.location = 'listaClientes.php'
    }else {
    window.location ='clientes.php'
    //$tel.focus()
    }
  }
