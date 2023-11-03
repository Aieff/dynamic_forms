$("#salvar").click(function (e) {
    e.preventDefault();
    var formData = {};

    $('#forms input').each(function() {
        formData[this.name] = $(this).val();
    });

    console.log(formData); // Verifica se os dados foram corretamente capturados

    // Envie os dados via AJAX
    $.ajax({
        method: "POST",
        url: "../usuarios.php",
        dataType: 'json',
        data: formData,
        success: function(data) {
            console.log(data);
            // Faça o que for necessário com a resposta do servidor
        },
        error: function (error) {
            console.log("Erro ao enviar os dados: " + error);
        }
    });
});