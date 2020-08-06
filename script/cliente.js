function validar() {
    var msg = "Campo inválido!"
    if (document.form.nome.value=="") {
      alert (msg)
      document.forms.nome.focus()
      return false
    }
  }

$(document).ready(function(){

  $('#nome').blur(function() {
    if ($(this).val() == 0) {
      $('#form').each(function(){
        this.reset()
      })
    }
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
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
    })
    
  })
  $('#est').blur(function() {
    var tx = $('#est').val()
    document.getElementById('est').value = tx.toUpperCase()
  })

  
})