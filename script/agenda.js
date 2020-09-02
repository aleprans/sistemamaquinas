$(document).ready(function(){
    $('#cliente').select2()
})

function editar(id_agenda) {
    var passarvalor = function(valor){
     window.location = "clientes.php?id_age="+valor
    }
    passarvalor(id_agenda)
}

// variaveis comuns
var $id_age = queryString("id_age")
var $id_cli = queryString("id_cli")
var $cliente = $('#cliente')
var $data = $('#dtage')
var $hora = $('#hrage')
var $visit = $('#vis')
var $btnSalvar = $('#enviar')

$data.on('change', function(){
    $data.attr('style', 'border-color: gren')
})

$hora.on('change', function(){
    $hora.attr('style', 'border-color: gren')
})

$('#cliente').on('change', function(){
    if ($(this).val() == 0) {
        $data.attr('disabled', true)
        $hora.attr('disabled', true)
        $visit.attr('disabled', true)
        $btnSalvar.attr('disabled', true)
    }else {
        $data.attr('disabled', false)
        $hora.attr('disabled', false)
        $visit.attr('disabled', false)
        $btnSalvar.attr('disabled', false)
    }
})

// Pesquisa ID na url
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
        return '0'
    }
}



// Pesquisa por id do cliente

if ($id_cli) {
    $cliente.val($id_cli).trigger('change')
}
//Pesquisa por id do agendamento 
if ($id_age) {
    $btnSalvar.attr('disabled', false)
    $.getJSON('pesqagen.php',{
        id_agenda: $id_age
    },function(data){

        $cliente.val(data.cliente).trigger('change')
        $data.val(data.ag_data)
        $hora.val(data.ag_hora)
        if(data.conc == 0){
            $visit.attr('checked', false)
        }else {
            $visit.attr('checked', true)
        }
    })
}

function limpar(){
    if ($cliente.val() == 0) {
        window.location ='listaAgenda.php'
    }else {
        $cliente.val(0).trigger('change')
        $data.val("")
        $hora.val("")
        $visit.attr(':checked', false)
        window.location = 'agenda.php'
    }
}

function validar(){
    $cliente.attr('style', 'border-color:gren')
    $data.attr('style', 'border-color:gren')
    $hora.attr('style', 'border-color:gren')

    var msg = "Campo inválido!"

    if ($data.val() == 0) {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text(msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
      }, 3000)
        $data.focus()
        $data.attr('style', 'border-color:red')
        exit
    }
    if ($hora.val() == 0) {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text(msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
      }, 3000)
        $hora.focus()
        $hora.attr('style', 'border-color:red')
        exit
    }
    enviar()
}

function enviar(){

    var form_data = new FormData()

    form_data.append('id_age', $id_age)
    form_data.append('id_cliente', $cliente.val())
    form_data.append('data', $data.val())
    form_data.append('hora', $hora.val())
    form_data.append('conc', $visit.is(':checked'))

    $.ajax({
        url: 'incluirAgendamento.php',
        type: 'post',
        dataType: 'json',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: form_data,
        success: function(data){
            
            if (data.status == true) {
                $('#msg').attr('style', 'opacity:1; transition: opacity 2s')
                $('#msg').attr('class', 'alert alert-success')
                $('#msg').text(data.msg)
                setInterval(function(){
                    $('#msg').attr('style', 'opacity:0; transition: opacity 2s')
                    window.location = 'listaAgenda.php'
                }, 3000)
            }else {
                 $('#msg').attr('style', 'opacity:1; transition: opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text(data.msg)
                setInterval(function(){
                    $('#msg').attr('style', 'opacity:0; transition: opacity 2s')
                }, 3000)
            }
        }
    })
}

