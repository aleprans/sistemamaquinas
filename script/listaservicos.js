$(document).ready(function(){

})

function editar(id_servico) {
    var passarvalor = function(valor){
     window.location = "servicos.php?id_serv="+valor
    }
    passarvalor(id_servico)
}

function excluir(id_servico) {
  
  var res = confirm('Deseja realmente EXCLUIR esse Serviço?')
  if (res == true) {
    $.getJSON('excluirServico.php',{
        servico: id_servico
    },function(data) {
        if (data.status == true) {
            $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
            $('#msg').attr('class', 'alert alert-error')
            $('#msg').text(data.msg)
          setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
            window.location = "listaservicos.php"
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
    )
  }  
}
    
function tratardata(dt){
  return dt.split('-')[2]+'/'+dt.split('-')[1]+'/'+dt.split('-')[0]
}
