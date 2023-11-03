$(document).ready(function () {
    listarCampo();
});

var modal = new bootstrap.Modal(document.getElementById('modalCampo'));
var modalDeletar = new bootstrap.Modal(document.getElementById('modalDeletar'));

function exibirModalCadastrarCampo() {

    //alterar título para "Cadastrar Campo"
    $("#modalTituloCampo").html("Cadastrar Campos");
    //Zera o alerta
    $("#modalAlert").html("");
    //zerar os campos
    $("#modalCampoTexto").val("");
    $("#modalCampoTipo").val("");
    //adicionar o botão de cadastrar
    $("#modalCampoFooter").html('<button type="button" class="btn btn-primary" id="btnSalvarCampo" onclick="cadastrarCampo()">Salvar</button>');
    $("#campoIdModal").hide();

    modal.show();

}

function cadastrarCampo() {

    // Recebe os dados vindos do formulario
    var dados = {
        acao: "cadastrarNovoCampo",
        texto: $("#modalCampoTexto").val(),
        tipo: $("#modalCampoTipo").val(),
    };

    if (dados.texto != '' && (dados.tipo != '' || dados.tipo != null)) {
console.log(dados)
    $.ajax({
        method: "POST",
        url: "../admin/ajax/ajax.php",
        dataType: 'json',
        data: dados,
        success: function(data) {
            console.log(data)
            if (data['error']) {
                //alert(data['error'])
                } else {
                    //alert(data['error'])
                modal.hide();
                listarCampo();
                }
            },
            error: function (data) {
                modal.hide();
                listarCampo();
            }

        });
    } else {
        //Exibe alerta campos obrigatórios
        $("#modalAlert").html('<div class="alert alert-danger" role="alert">' +
            'Preencha os campos obrigatórios' +
            '</div>');
    }
}

function listarCampo() {

    var dados = {
        acao: "listarCampo"
    };

    $.ajax({
        method: "POST",
        url: "../admin/ajax/ajax.php",
        dataType: 'json',
        data: dados,
        success: function(data) {
            console.log(data)
            if (data['error']) {
                //alert(data['error'])
                } else {
                        var html = '';
                        var campos = data.dados;
                        if (campos.length > 0) {
                            campos.forEach(function (elem) {
                                var html = '';
                                var campos = data.dados;
                                if (campos.length > 0) {
                                    campos.forEach(function (elem) {
                                        html += "<tr>" +
                                            "<td>" + elem.id + "</td>" +
                                            "<td>" + elem.texto + "</td>" +
                                            "<td>" + elem.tipo + "</td> " +
                                            "<td>" + "<button type='button' class='btn btn-success' onclick='exibirModalEditarCampo(" + elem.id + ")'>Editar</button> <button type='button' class='btn btn-danger' onclick='exibirModalDeletarCampo(" + elem.id + ")'>Deletar</button>" +"</td> " +
                                            "</tr>";
                                    });
                                    $("#listarDadosCampos").html(html);
                                }
                            });
                        }
                    }

                }
            });
        }


function exibirModalEditarCampo(id) {


    $("#modalTituloCampo").html("Editar Campos");
    $("#modalCampoTexto").val("");
    $("#modalCampoTipo").val("");
    $("#modalCampoFooter").html('<button type="button" class="btn btn-primary" id="btnEditarCampo" onclick="editarCampo()">Editar</button>');
    $("#campoIdModal").show();


    var dados = {
        acao: 'buscaIdCampoEditar',
        id: id
    };

    $.ajax({
        method: "POST",
        url: "../admin/ajax/ajax.php",
        dataType: 'json',
        data: dados,
        success: function (data) {
            console.log(data)
            if (data['error']) {
                //console.log(data);
            } else {

                $("#modalCampoId").val(data.id);
                $("#modalCampoTexto").val(data.texto);
                $("#modalCampoTipo").val(data.tipo);

                modal.show();
            }

        },
        error: function (data) {
            alert("error");
        }
    });
}


function editarCampo() {

    // Recebe os dados vindos do formulario
    var dados = {
        acao: "editarCampo",
        id: $("#modalCampoId").val(),
        texto: $("#modalCampoTexto").val(),
        tipo: $("#modalCampoTipo").val(),

    };

    if (dados.texto != '' || dados.tipo != '') {

        $.ajax({
            method: "POST",
            url: "../admin/ajax/ajax.php",
            dataType: 'json',
            data: dados,
            success: function (data) {
                console.log(data)
                if (data['error']) {
                    //alert(data['error'])
                } else {
                    //alert(data['error'])
                    modal.hide();
                    listarCampo();
                }
            },
            error: function (data) {
                //Exibe alerta error
                $("#modalAlert").html('<div class="alert alert-danger" role="alert">' +
                    'Ocorreu um problema tente novamente' +
                    '</div>');
            }

        });
    } else
        {
            //Exibe alerta campos obrigatórios
            $("#modalAlert").html('<div class="alert alert-danger" role="alert">' +
                'Preencha os campos obrigatórios' +
                '</div>');
        }
    }



    function exibirModalDeletarCampo(id) {

        $("#modalTituloDeletar").html("Deletar Campo");
        $("#alertaMensagem").html("Realmente deseja deletar o Campo ?");
        $("#modalCampoFooterDeletar").html('<button type="button" class="btn btn-danger" id="btnDeletarCampo" onclick="deletarCampo()">Deletar</button>');
    

        var dados = {
            acao: "buscaDadosDeletar",
            id: id
        }

        $.ajax({
            method: "POST",
            url: "../admin/ajax/ajax.php",
            dataType: 'json',
            data: dados,
            success: function (data) {
                console.log(data)
                if (data['error']) {
                    //alert(data['error'])
                } else {
                    //alert(data['error'])
                    
                $("#modalCampoIdDeletar").val(data.id);
                $("#modalCampoTextoDeletar").val(data.texto);
                $("#modalCampoTipoDeletar").val(data.tipo);
                $("#modalCampoChaveDeletar").val(data.chave);

                    modalDeletar.show();
                    listarCampo();
                }
            },
            error: function (data) {
                //Exibe alerta error
                $("#modalAlert").html('<div class="alert alert-danger" role="alert">' +
                    'Ocorreu um problema tente novamente' +
                    '</div>');
            }

        });
    
    }  



function deletarCampo() {

    // Recebe os dados vindos do formulario
    var dados = {
        acao: "deletarCampo",
        id: $("#modalCampoIdDeletar").val(),
        campoId: $("#modalCampoChaveDeletar").val(),
    };

        $.ajax({
            method: "POST",
            url: "../admin/ajax/ajax.php",
            dataType: 'json',
            data: dados,
            success: function (data) {
                console.log(data)
                if (data['error']) {
                    //alert(data['error'])
                } else {
                    //alert(data['error'])
                    modalDeletar.hide();
                    listarCampo();
                }
            },
            error: function (data) {
                //Exibe alerta error
                modalDeletar.hide();
                listarCampo();
            }

        });
    }