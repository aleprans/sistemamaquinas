  var $dtini = $('#dtini')
  var $dtfin = $('#dtfim')
  var $con = $('#con')
  var $hoje = new Date().toDateString()
  var msg = "Campo inválido!"
$(document).ready(function(){
  filtrar()
})
// passar ID pelo url
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
              }, 3000)
            }else {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
              }, 3000)
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

        $bgdanger = data[key].bgdanger
        var $rows = $tabela.insertRow()
        $rows.innerHTML ="<td class="+$bgdanger+">"+tratardata(data[key].ag_data)+
        "</td><td class="+$bgdanger+">"+data[key].ag_hora+
        "</td><td class="+$bgdanger+">"+data[key].cliente+
        "</td><td class="+$bgdanger+">"+data[key].endereco+", "+data[key].num+" - "+data[key].bar+
        "</td><td class="+$bgdanger+">"+$visit+
        "</td><td class="+$bgdanger+">"+"<button class='btn btn-primary btn-sm' onclick='editar("+data[key].id_agenda+
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
function tratardata(dt){
   return dt.split('-')[2]+'/'+dt.split('-')[1]+'/'+dt.split('-')[0]
}
