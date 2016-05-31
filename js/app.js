$(document).foundation();

$(document).ready(function(){
    $('#myTable').DataTable();
});

$.ajax('painel/createUser')
    .done(function(resp){
        $("#programador").html(resp);
        $('#saveprog').onclick= function(){
            alert('oi');
        }
    });
$.ajax('painel/createProgramas')
    .done(function(resp){
        $("#programas").html(resp);
    });
$.ajax('painel/createStatus')
    .done(function(resp){
        $("#status").html(resp);
    });

function clear() {
    alert('oi');
    $("#erros").html('').innerHTML="";
}

$(document).on('closed.zf.reveal','[data-reveal]',function () {
    $("#erros").html('').innerHTML="";
    $("#errosa").html('').innerHTML="";
    $("#erross").html('').innerHTML="";
    var inputs = document.getElementsByTagName('input');
    for(var i=0; i<inputs.length; i++){
        if(inputs[i].getAttribute('type')=='text' || inputs[i].getAttribute('type')=='password'){
            inputs[i].value = '';
        }
    }
})


function salvaProgramador() {

    var nome = $("#vnome__programador").val();
    var login = $("#vlogin_programador").val();
    var senha = $("#vsenha_programador").val();
    var repitasenha = $("#vsenha_programador1").val();
    $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'painel/salvaProgramador', // the url where we want to POST
            dataType    : 'json', // what type of data do we expect back from the server
            data: {vnome__programador:nome,vlogin_programador:login,vsenha_programador:senha,vsenha_programador1:repitasenha},
            encode          : true,
        })
        // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            console.log(data);
            if(!data.success) {
                $("#erros").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            else {
                $("#erros").html('').append("<div class='callout success'>Programador  adicionado com succeso</div>");
                var select = document.getElementsByName("usuario");
                var option = document.createElement("option");
                option.text =data.message[1];
                option.value = data.message[0];
                select[0].options.add(option);
                console.log("adicionado com sucesso");
                LimpaCampos();
            }
            // here we will handle errors and validation messages
        });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

}

function LimpaCampos() {
    var input=  document.getElementsByTagName('input');
    var length =  input.length;
    for(i=0;i<length;i++){
        if(input[i].type=="text")
        {
            input[i].value="";
        }
    }
}

function salvaPrograma() {
    //$("#erros").html('').innerHTML="";
    var nome = $("#vnome____programa").val();
    $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'painel/salvaPrograma', // the url where we want to POST
            dataType    : 'json', // what type of data do we expect back from the server
            data: {vnome____programa:nome},
            encode      : true
        })
        // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            console.log(data);
            if(!data.success) {
                console.log("passou aqui");
                $("#errosa").html('').append("<div class='alert callout'>" + data.message + "</div>");
                console.log("passou aqui tbm");
            }
            else {
                $("#errosa").html('').append("<div class='callout success'>Programa adicionado com succeso</div>");
                LimpaCampos();
                var select = document.getElementsByName("programas");
                var length =  select[0].options.length;
                for(i=length;i>= 0;i--){
                    select[0].remove(i);
                }
                length = data.message.length;
                for(i=0;i< length;i++){
                    var option = document.createElement("option");
                    option.text =data.message[i];
                    option.value = data.message[i];
                    select[0].options.add(option);
                }
                console.log("adicionado com sucesso");
            }
            // here we will handle errors and validation messages
        });
    // stop the form from submitting the normal way and refreshing the page
    //event.preventDefault();
}

function salvaStatus() {

    var nome = $("#vdescristatus").val();
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'painel/salvaStatus', // the url where we want to POST
        dataType    : 'json', // what type of data do we expect back from the server
        data: {vdescristatus:nome},
        encode      : true
    })
    // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            console.log(data);
            if(!data.success) {
                console.log("passou aqui");
                $("#erross").html('').append("<div class='alert callout'>" + data.message + "</div>");
                console.log("passou aqui tbm");
            }
            else {
                $("#erross").html('').append("<div class='callout success'>Status adicionado com succeso</div>");
                LimpaCampos();
                var select = document.getElementsByName("situacao");
                var length =  select[0].options.length;
                for(i=length;i>= 0;i--){
                    select[0].remove(i);
                }
                length = data.message.length;
                for(i=0;i< length;i++){
                    var option = document.createElement("option");
                    option.text =data.message[i];
                    option.value = data.message[i];
                    select[0].options.add(option);
                }
                console.log("adicionado com sucesso");
            }
            // here we will handle errors and validation messages
        });
}
