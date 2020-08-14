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
        
          //$('#exibe>ul').remove()
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
  var msg = "Campo inválido!"
  var name = document.getElementById("nome")
  if (name.value == "") {
    alert (msg)
    name.focus()
    exit
  }

  var tel = document.getElementById("tel")
  if (tel.value == "") {
    alert (msg)
    tel.focus()
    exit
  }
enviar()
}

// Pesquisa cliente

$(document).ready(function(){
  $('#tel').focus()
  $('#tel').blur(function() {
    if ($(this).val() == 0) {
      $('#form').each(function(){
        this.reset()
      })
    }
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
      /*if (json.length > 1) {
        var divList = document.createElement("div")
        var itemLista = document.createElement("li")
        divList.appendChild(itemLista)
        var divAtual = document.GetElementById('list_nome')
        divAtual.appendCild(divList)
      }*/
      $nam.val(json.nom)
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
      $('#tel').focus()
    })
    
  })

  // Textos em maiusculos

  $('#tel').on('change', function() {
    $('#id_cli').val('')
    $('#nome').val('')
    //$('#tel').val('')
    $('#end').val('')
    $('#num').val('')
    $('#bar').val('')
    $('#cid').val('')
    $('#est').val('')
  })

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
