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
    alert('nome:'+ nome + ' login:'+login + ' senha: ' +senha +' repita: '+repitasenha);
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
            }
            // here we will handle errors and validation messages
        });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

}

function salvaPrograma() {
    //$("#erros").html('').innerHTML="";
    $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'painel/salvaPrograma', // the url where we want to POST
            dataType    : 'json', // what type of data do we expect back from the server
            //data: "vnome____programa="+nome,
            encode      : true
        })
        // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            alert('oi');
            console.log(data);
            if(!data.success) {
                $("#errosa").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            else{
                $("#errosa").html('').append("<div class='alert callout'>sucesso</div>");
            }
            // here we will handle errors and validation messages
        });

    // stop the form from submitting the normal way and refreshing the page
    //event.preventDefault();

}
