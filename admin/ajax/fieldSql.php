<?php
function addFieldToSql($campoId, $tipoSql, $conexao) {

    if($tipoSql == "text") {
        $tipoSql = 'VARCHAR(250)';
    }
    if($tipoSql == "password") {
        $tipoSql = 'VARCHAR(250)';
    }
    if($tipoSql == "date") {
        $tipoSql = 'DATE';
    }

    if ($tipoSql != '' && $tipoSql != null) {

            $sql = "ALTER TABLE usuarios ADD $campoId $tipoSql NOT NULL";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                echo "Coluna $campoId adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar coluna: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro na consulta SQL: " . mysqli_error($conexao);
    }
}

function removeFieldToSql($campoId, $conexao) {

        $sql = "ALTER TABLE usuarios DROP $campoId";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "Coluna $campoId removida com sucesso!";
        } else {
            echo "Erro ao remover coluna: " . mysqli_error($conexao);
        }
    }