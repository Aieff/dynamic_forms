<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Forms</title>
    <link rel="stylesheet" href="../styles/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Texto</th>
      <th scope="col">Tipo</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody id="listarDadosCampos">
  </tbody>
</table>

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" onclick="exibirModalCadastrarCampo()">Cadastrar</button>

    <!-- Modal -->
    <div class="modal fade" id="modalCampo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTituloCampo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalAlert"></div>
                    <div class="form-group">

                        <div id="campoIdModal">
                        <label for="modalCampoId">Id</label>
                        <input type="text" class="form-control" id="modalCampoId" disabled><br>
                        </div>

                        <label for="modalCampoTexto">Texto do campo:</label><span style="color: red; font-size: 10px"> * Obrigatório</span>
                        <textarea class="form-control" placeholder="Insira o texto que será apresentado" id="modalCampoTexto"></textarea><br>

                        <label for="modalCampoTipo">Tipo do campo:</label><span style="color: red; font-size: 10px"> * Obrigatório</span>
                        <select class="form-select" aria-label="Default select example" id="modalCampoTipo">
                        <option selected disabled value="">Selecione</option>
                        <option value="text">Texto</option>
                        <option value="password">Senha</option>
                        <option value="date">Data</option>
                        </select>

                    </div>
                </div>
                <div class="modal-footer" id="modalCampoFooter"></div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="modalDeletar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTituloDeletar"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <div id="alertaMensagem"></div><br>

                    <div id="campoIdModal">
                        <label for="modalCampoId">Id</label>
                        <input type="text" class="form-control" id="modalCampoIdDeletar" disabled><br>
                        <input type="hidden" class="form-control" id="modalCampoChaveDeletar" disabled><br>
                        </div>

                        <label for="modalCampoTexto">Texto do campo:</label>
                        <textarea class="form-control" placeholder="Insira o texto que será apresentado" id="modalCampoTextoDeletar" disabled></textarea><br>

                        <label for="modalCampoTipo">Tipo do campo:</label>
                        <select class="form-select" aria-label="Default select example" id="modalCampoTipoDeletar" disabled>
                            <option selected value="">Selecione</option>
                            <option value="text">Texto</option>
                            <option value="password">Senha</option>
                            <option value="date">Data</option>
                        </select>

                    </div>
                </div>
                <div class="modal-footer" id="modalCampoFooterDeletar"></div>
            </div>
        </div>
    </div>







</div>
    
</body>

 <script src="../scripts/admin.js"></script>
</html>