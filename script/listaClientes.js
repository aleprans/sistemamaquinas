function editar(id_cliente) {
    var passarvalor = function(valor){
     window.location = "clientes.php?id_cli="+valor
    }
    passarvalor(id_cliente)
}


function excluir(id_cliente) {
    var res = confirm("Deseja escluir esse Cliente?")
    if (res == true) {
        $.getJSON('excluirCliente.php',{
            id_cliente: id_cliente
        },function(data) {
            if (data.status == true) {
                alert(data.msg)
                window.location = "listaClientes.php"
            }else {
                alert(data.msg)
            }
        }
    )}
    
}

  