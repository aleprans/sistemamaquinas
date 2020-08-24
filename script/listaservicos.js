function editar(id_servico) {
    var passarvalor = function(valor){
     window.location = "servicos.php?id_serv="+valor
    }
    passarvalor(id_servico)
}

function excluir(id_servico) {
    var res = confirm("Deseja escluir esse serviço?")
    if (res == true) {
        $.getJSON('excluirServico.php',{
            servico: id_servico
        },function(data) {
            if (data.status == true) {
                alert(data.msg)
                window.location = "listaservicos.php"
            }else {
                alert(data.msg)
            }
        }
    )}
    
}
