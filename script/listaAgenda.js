  var $dtini = $('#dtini')
  var $dtfin = $('#dtfim')
  var $con = $('#con')
  var msg = "Campo inválido!"
$(document).ready(function(){
  filtrar()
})

function editar(id_agenda) {
    var passarvalor = function(valor){
     window.location = "agenda.php?id_age="+valor
    }
    passarvalor(id_agenda)
}

function excluir(id_age) {
    var res = confirm("Deseja escluir esse Agendamento?")
    if (res == true) {
        $.getJSON('excluirAgenda.php',{
            id_age: id_age
        },function(data) {
            if (data.status == true) {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-success')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                window.location = "listaAgenda.php"
              }, 5000)
            }else {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
              }, 5000)
            }
        }
    )}
    
}

function filtrar() {
 
  $('#tab td').remove()
  $dtini.attr('style', 'border-color:gren')
  $dtfin.attr('style', 'border-color:gren')
  

  $.getJSON('pesqagen.php',{
      dtini: $dtini.val(),
      dtfin: $dtfin.val(),
      conc: $con.val()
  },function(data){
     
      var $tabela = document.getElementById('tab')
      
      for (let key = 0; key < data.length; key++) {
        if (data[key].conc == 0) {
          var $visit = "Não"
        }else {
          var $visit = "Sim"
        }

        var $rows = $tabela.insertRow()
        $rows.innerHTML = "<td>"+data[key].ag_data+
        "</td><td>"+data[key].ag_hora+
        "</td><td>"+data[key].cliente+
        "</td><td>"+data[key].endereco+", "+data[key].num+" - "+data[key].bar+
        "</td><td>"+$visit+
        "</td><td><button class='btn btn-primary btn-sm' onclick='editar("+data[key].id_agenda+
        ")'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-sm' onclick='excluir("+data[key].id_agenda+
        ")'><i class='fa fa-trash'></i></button></td>"
      }
  })
}
function Limparfiltro() {
  $dtini.val("")
  $dtfin.val("")
  $con.val(2)
  filtrar()
}