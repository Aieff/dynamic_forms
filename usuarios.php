<?php
//Inclui a conexão com o banco de dados
include '../../config.php';

$form = $_GET['form'];
$dados=$_GET;
if($form==''){
    $form = $_POST['form'];
    $dados=$_POST;
}

$arrayDados = mysqli_fetch_array($dados);
var_dump($arrayDados);
