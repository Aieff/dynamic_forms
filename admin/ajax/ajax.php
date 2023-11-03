<?php
//Inclui a conexão com o banco de dados
include '../../config.php';
include 'fieldSql.php';

$dados = $_POST;

$acao = $dados['acao'];

if ($acao == "cadastrarNovoCampo") {

    $texto = $dados['texto'];
    $tipo = $dados['tipo'];

    $sql = "SELECT * FROM admin_campos";
    $resultado = mysqli_query($conexao, $sql);
    $nrow = mysqli_num_rows($resultado);
    $nrow += 1;
    $chave = 'formField'.$nrow;

    if($texto != '' && ($tipo != '' || $tipo != null)) {
    $sql = "INSERT INTO admin_campos (texto, tipo, chave) VALUES ('$texto', '$tipo', '$chave')";
    $resultado = mysqli_query($conexao, $sql);

    //Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "Cadastrado com sucesso!";
        addFieldToSql($chave, $tipo, $conexao);

    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível cadastrar o Campo!";
        echo mysqli_error($conexao);

    }
    echo json_encode($response);
    }
}

if ($acao == "listarCampo") {

    $sql = "SELECT * FROM admin_campos";
    $resultado = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nrow[] = $row;
    }
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "";
        $response['dados'] = $nrow;
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível listar nenhum campo!";
        echo mysqli_error($conexao);
    }
    
    echo json_encode($response);
}


if ($acao == "buscaIdCampoEditar") {

    $id = $dados['id'];

    if($id != '') {
    $sql = "SELECT * FROM admin_campos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $response=mysqli_fetch_assoc($resultado);
        $response['error'] = false;
        $response['msg'] = "Sucesso ao buscar o Campo";
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível buscar o Campo!";
        echo mysqli_error($conexao);
    }

    echo json_encode($response);
    }
}


if ($acao == "editarCampo") {

    $id = $dados['id'];
    $texto = $dados['texto'];
    $tipo = $dados['tipo'];

        $sql = "UPDATE admin_campos SET texto = '$texto', tipo = '$tipo' WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            $response['error'] = false;
            $response['msg'] = "Cadastrado com sucesso!";
        } else {
            $response['error'] = true;
            $response['msg'] = "Não foi possível cadastrar o Campo!";
            echo mysqli_error($conexao);
        }

        echo json_encode($response);
    }


    if ($acao == "buscaDadosDeletar") {


        $id = $dados['id'];
    
        $sql = "SELECT * FROM admin_campos WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);
    
        if ($resultado) {
            $response=mysqli_fetch_assoc($resultado);
            $response['error'] = false;
            $response['msg'] = "Sucesso ao buscar o campo";
        } else {
            $response['error'] = true;
            $response['msg'] = "Não foi possível buscar o campo!";
            echo mysqli_error($conexao);
        }
    
        echo json_encode($response);
    }
    

    
if ($acao == "deletarCampo") {

    $id = $dados['id'];
    $campoId = $dados['campoId'];

        $sql = "DELETE FROM admin_campos WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            $response['error'] = false;
            $response['msg'] = "Deletado com sucesso!";
            removeFieldToSql($campoId, $conexao);

        } else {
            $response['error'] = true;
            $response['msg'] = "Não foi possível cadastrar o Campo!";
            echo mysqli_error($conexao);
        }

        echo json_encode($response);
    }