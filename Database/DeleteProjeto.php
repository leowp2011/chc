<?php 
    include 'conexao.php';
        
    echo $_GET['ID_projeto'];

    $SQL_DeletaProjeto = 'DELETE FROM projetos 
                        WHERE ID_projeto = :ID_projeto';

    $result_delete = $conexao -> prepare($SQL_DeletaProjeto);
    $result_delete -> bindParam(":ID_projeto", $_GET['ID_projeto'], PDO::PARAM_INT);
    $result_delete -> execute();
    
    $row_afetadas = $result_delete -> rowCount();

    if ($row_afetadas <> 0) {
        header('location: ../home.php');
    }
    else {
        echo "ERRO ao tentar deletar projeto.";
    }
    