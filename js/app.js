$(document).foundation();

$(document).ready(function(){
    CarregaCombos();
    CarregaCombosAtividade();
    var table =  $('#myTable').DataTable({
        "bFilter": false,

    });

    $('#myTable').find('tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#myTable').find('tbody').on( 'dblclick', 'tr', function () {
        if ( !$(this).hasClass('selected') ) {
            $(this).addClass('selected');
        }
        var id = $(this).attr('id');
        CarregaTarefa(id);
    } );
    setTimeout(function() {
        CarregaDatabase();
    }, 5);

});
$.ajax('painel/creatActivity')
    .done(function(resp){
        $("#atividade").html(resp);
    });

$.ajax('painel/createUser')
    .done(function(resp){
        $("#programador").html(resp);
    });
$.ajax('painel/createProgramas')
    .done(function(resp){
        $("#programas").html(resp);
    });
$.ajax('painel/createStatus')
    .done(function(resp){
        $("#status").html(resp);
    });

$(document).on('closed.zf.reveal','[data-reveal]',function () {
    $("#erros").html('').innerHTML="";
    $("#errosa").html('').innerHTML="";
    $("#erross").html('').innerHTML="";
    $("#errossa").html('').innerHTML="";

    LimpaCampos();
});


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
            if(!data.success) {
                $("#erros").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            else {
                $("#erros").html('').append("<div class='callout success'>Programador  adicionado com succeso</div>");
                LimpaCampos();
                CarregaCombos();
            }
            // here we will handle errors and validation messages
        });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

}

function LimpaCampos() {
    Limpa(document.getElementsByTagName('input'));
    Limpa(document.getElementsByTagName('textarea'));
    var select = document.getElementById("dprazo_todolist");//id
    select.valueAsDate = new Date();
    select = document.getElementById("dtlancamtodolist");//id
    select.valueAsDate = new Date();
}

function Limpa(input) {
    var length =  input.length;
    for(var i=0;i<length;i++){
            input[i].value="";
    }
}


function removeCampos(select) {
    var length =  select[0].options.length;
    for(var i=length;i>= 0;i--){
        select[0].remove(i);
    }
}

function adiciona(data,select) {
    length = data.length;
    for(var i=0;i< length;i++){
        var option = document.createElement("option");
        option.text =data[i][1];
        option.value = data[i][0];
        select[0].options.add(option);
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

            if(!data.success) {
                $("#errosa").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            else {
                $("#errosa").html('').append("<div class='callout success'>Programa adicionado com succeso</div>");
                LimpaCampos();
                CarregaCombos();
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
            if(!data.success) {
                $("#erross").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            else {
                $("#erross").html('').append("<div class='callout success'>Status adicionado com succeso</div>");
                LimpaCampos();
                CarregaCombos();
            }
            // here we will handle errors and validation messages
        });
}

function salvaAtividade() {

    var usuario = $("[name='nid____programador']").val();
    var programas = $("[name='nid____programa']").val();
    var situacao = $("[name='nstate_todolist']").val();
    var datetime = $("#dprazo_todolist").val();
    var titulo = $("#vtitulotodolist").val();
    var descricao = $("#vdescritodolist").val();
    var id = $("[name='id']").val();
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'painel/salvaAtividade', // the url where we want to POST
        dataType    : 'json', // what type of data do we expect back from the server
        data: {
            nid____programador:usuario,
            nid____programa:programas,
            nstate_todolist:situacao,
            dprazo_todolist:datetime,
            vtitulotodolist:titulo,
            vdescritodolist:descricao,
            nid____todolist:id
        },
        encode      : true
    })
    // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            if (data.success) {
                $("#errossa").html('').append("<div class='callout success'>Atividade adicionada com succeso</div>");
                LimpaCampos();
                var table = $('#myTable').DataTable();
                table.clear().draw();
                var tableRef = document.getElementById('myTable').getElementsByTagName('tbody')[0];
                // Insert a row in the table at the last row

                var length = data.message.length;
                alert(length);
                for (var i = 0; i < length; i++) {

                    table.row.add(data.message[i]).draw(false);

                }
            } else {
                $("#errossa").html('').append("<div class='alert callout'>" + data.message + "</div>");
            }
            // here we will handle errors and validation messages
        });
}

function CarregaDatabase() {
    var programador = $("[name='programador']").val();
    var programas = $("[name='programas']").val();
    var situacao = $("[name='situacao']").val();
    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: 'painel/CarregaDatabase', // the url where we want to POST
        dataType: 'json', // what type of data do we expect back from the server
        data: {nid____programador: programador,nid____programa: programas,nstate_todolist: situacao},
        encode: true
    })
    // using the done promise callback
        .done(function (data) {
            var table = $('#myTable').DataTable();
            table.clear().draw();
            var length = data.message.length;
            for (var i = 0; i < length; i++) {
                //var row = table.row.add(data.message[i].slice(1,data.message[0].length)).draw(false);
                var row = $('#myTable').dataTable().fnAddData(data.message[i].slice(1,data.message[0].length));
                //var row = table.fnAddData(data.message[i].slice(1,data.message[0].length)).draw(false);
                var theNode = $('#myTable').dataTable().fnSettings().aoData[row[0]].nTr;
                theNode.setAttribute('id',data.message[i][0]);

            }
            // here we will handle errors and validation messages
        });
}


function CarregaAtividade() {
    CarregaCombosAtividade();
    $('#atividade').foundation('open');
}

function CarregaCombosAtividade() {
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'painel/Carredados', // the url where we want to POST
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
    // using the done promise callback
        .done(function(data) {
            console.log(data);
            var select = document.getElementsByName("nid____programador");
            removeCampos(select);
            adiciona(data.programador,select);
            var select = document.getElementsByName("nid____programa");
            removeCampos(select);
            adiciona(data.programa,select);
            var select = document.getElementsByName("nstate_todolist");
            removeCampos(select);
            adiciona(data.situacao,select);
        });

}

function CarregaTarefa(id) {
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'painel/CarregaTarefa', // the url where we want to POST
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true,
        data        : {nid____todolist:id}
    })
    // using the done promise callback
        .done(function(data) {
            console.log(data);
            var select = document.getElementsByName("nid____programador")[0];
            select.value=data.message[0][1];
            select = document.getElementsByName("nid____programa")[0];
            select.value=data.message[0][2];
            select = document.getElementsByName("nstate_todolist")[0];
            select.value=data.message[0][6];
            select = document.getElementById("dprazo_todolist");//id
            select.valueAsDate = new Date(data.message[0][7]);
            select = document.getElementById("vtitulotodolist");//id
            select.value=data.message[0][3];
            select = document.getElementById("vdescritodolist");//id
            select.value=data.message[0][4];
            select = document.getElementById("dtlancamtodolist");//id
            select.valueAsDate=data.message[0][7];
            select = document.getElementsByName("id")[0];//id
            if(select.value=data.message[0][0] != null)
            {
                
                
            }
            
            $('#atividade').foundation('open');
        });
}


function CarregaCombos() {
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'painel/Carredados', // the url where we want to POST
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
    // using the done promise callback
        .done(function(data) {
            console.log(data);
            var select = document.getElementsByName("programador");
            removeCampos(select);
            adiciona(data.programador,select);
            var select = document.getElementsByName("programas");
            removeCampos(select);
            adiciona(data.programa,select);
            var select = document.getElementsByName("situacao");
            removeCampos(select);
            adiciona(data.situacao,select);
        });
}