<?php
include "config.php";

$sql = "SELECT * FROM admin_campos";
$resultado = mysqli_query($conexao, $sql);
?>

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

    <form id="forms">
    <?php foreach ($resultado as $values) {
        echo '<label for="modalCampoTexto">'. $values['texto'] .'</label><span style="color: red; font-size: 10px"> * Obrigatório</span>
                  <input type="'.$values['tipo'].'" class="form-control"  name="'.$values['chave'].'" id="'.$values['chave'].'"><br>';
    }?>
        <button type="submit" class="btn btn-primary" id="salvar" ">Salvar</button>
    </form>

</div>

</body>
<script type="javascript" src="scripts/cadastrar.js"></script>
</html>