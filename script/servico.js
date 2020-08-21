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
                window.location = "index.php"
            }else {
                alert(data.msg)
            }
        }
    )}
    
}


function validar() {
    /*Data
    var data = new Date()
    var dia = data.getDate()
    var mes = data.getMonth()+1
    var ano = data.getFullYear()
    var hoje = ano +"-"+mes+"-"+dia
    */
    var cli = $('#cliente')
    var equi = $('#equip')
    var desc = $('#desc')
    var pec = $('#pec')
    var fim = $('#fim')
    var vpec = $('#val_pec')
    var vtot = $('#val')
    var dat = $('#dat')
    var msg = 'Campo Inválido'
    
    
    
    if (cli.val() == 0) {
        alert('Obrigatório selecionar um Cliente!')
        exit
    
    }else if (!equi.val()) {
        alert(msg)
        equi.focus()
        exit

    }else if (!desc.val()) {
        alert(msg)
        desc.focus()
        exit

    }else if (vtot.val() == 0) {
        alert(msg)
        vtot.focus()
        exit
    }/*else if (!dat.val()) {
        alert(msg)
        dat.focus()
        exit
    }*/
    enviar()
}

function enviar() {

    var form_data = new FormData()
    form_data.append('id_cliente', document.getElementById('cliente').value)
    form_data.append('equi', document.getElementById('equip').value)
    form_data.append('desc', document.getElementById('desc').value)
    form_data.append('peca', document.getElementById('pec').value)
    form_data.append('final', document.getElementById('fim').checked)
    form_data.append('vpeca', document.getElementById('val_pec').value)
    form_data.append('val', document.getElementById('val').value)
    form_data.append('data', document.getElementById('dat').value)
    
    $.ajax({
        url: 'incluirServico.php',
        type: 'post',
        dataType: 'json',
        encType: 'muiltpart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data:form_data,
        success:function(data) {
            
            if (data.status == true) {
                alert(data.msg)

                //limpar campos
                $('#cliente').val(0)
                $('#equip').val("")
                $('#desc').val("")
                $('#pec').val("")
                $('#lfim').val(false)
                $('#val_pec').val("")
                $('#val').val("")
                $('#dat').val("")
            }else {
                alert(data.msg)
            }
        }
    })

}