<?php
	session_start(); 

	include 'conexao.php'; 

	if (isset($_POST['titulo']) && isset($_POST['resumo']) && isset($_POST['caracterizacao']) && isset($_POST['Obj_geral']) && isset($_POST['Obj_especifico']) && isset($_POST['metodologia']) && isset($_POST['recursos']) && isset($_POST['referencias']) && isset($_POST['modalidade']) && isset($_POST['area_conhecimento']) && isset($_POST['data_cronograma']) && isset($_POST['atividade']) && isset($_POST['anexo'])) 
	{
		$titulo 				= $_POST['titulo'];
		$resumo 				= $_POST['resumo'];
		$caracterizacao 		= $_POST['caracterizacao'];
		$Obj_geral				= $_POST['Obj_geral'];
		$Obj_especifico 		= $_POST['Obj_especifico'];
		$metodologia 			= $_POST['metodologia'];
		$recursos 				= $_POST['recursos'];
		$referencias 			= $_POST['referencias'];
		$modalidade				= $_POST['modalidade'];
		$area_conhecimento  	= $_POST['area_conhecimento'];
		$data_cronograma 		= $_POST['data_cronograma'];
		$atividade 				= $_POST['atividade'];
		$anexo 					= $_POST['anexo'];
		

        /*INSERE NA TABLE AREA CONHECIMENTO*/
        if (!empty($_POST['anexo']))
        {
            
            $SQL_tableAnexo = 'UPDATE anexos 
                            INNER JOIN projetos ON (projetos.ID_anexoFK = anexos.ID_anexo)
                            
                            SET
                            anexo = :anexo

                        WHERE projetos.ID_projeto = :ID_projeto';

            $prepare = $conexao -> prepare( $SQL_tableAnexo );
            $prepare -> bindParam(":anexo", $anexo, PDO::PARAM_STR);
            $prepare -> bindParam(":ID_projeto", $_GET['ID_projeto'], PDO::PARAM_INT);
            $prepare -> execute();

        }
        else {
            $anexo = null;
        }
        /*--------------------------------------------------------------- */
        $SQL_tableProjeto = 'UPDATE projetos

                        SET
                        titulo = :titulo,
                        resumo = :resumo,
                        ID_caracterizacaoFK = :caracterizacao,
                        OBJ_geral = :Obj_geral,
                        OBJ_especifico = :Obj_especifico, 
                        metodologia = :metodologia, 
                        recursos = :recursos, 
                        referencias = :referencias, 
                        ID_modalidadeFK = :modalidade,
                        ID_areaconhecimentoFK = :area_conhecimento
                        
                        WHERE ID_projeto = :ID_projeto' ;

        $prepare = $conexao -> prepare( $SQL_tableProjeto );
        $prepare -> bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $prepare -> bindParam(":resumo", $resumo, PDO::PARAM_STR);
        $prepare -> bindParam(":caracterizacao", $caracterizacao, PDO::PARAM_INT);
        $prepare -> bindParam(":Obj_geral", $Obj_geral, PDO::PARAM_STR);
        $prepare -> bindParam(":Obj_especifico", $Obj_especifico, PDO::PARAM_STR);
        $prepare -> bindParam(":metodologia", $metodologia, PDO::PARAM_STR);
        $prepare -> bindParam(":recursos", $recursos, PDO::PARAM_STR);
        $prepare -> bindParam(":referencias", $referencias, PDO::PARAM_STR);
        $prepare -> bindParam(":modalidade", $modalidade, PDO::PARAM_INT);
        $prepare -> bindParam(":area_conhecimento", $area_conhecimento, PDO::PARAM_INT);
        // $prepare -> bindParam(":user", $_SESSION['cpf'], PDO::PARAM_STR);

        $prepare -> bindParam(":ID_projeto", $_GET['ID_projeto'], PDO::PARAM_INT);
        $prepare -> execute();

        /*--------------------------------------------------------------- */

        /*INSERE NA TABLE CRONOGRAMA*/
        $SQL_tableCronograma = 'UPDATE cronogramas
                        INNER JOIN projetos ON (projetos.ID_projeto = cronogramas.ID_projetoFK)

                        SET 
                        data_cronograma = :data_cronograma, 
                        atividade = :atividade
                        
                        WHERE cronogramas.ID_projetoFK = :ID_projeto';
        
        $prepare = $conexao -> prepare( $SQL_tableCronograma );
        $prepare -> bindParam(":data_cronograma", $data_cronograma, PDO::PARAM_STR);
        $prepare -> bindParam(":atividade", $atividade, PDO::PARAM_STR);
        $prepare -> bindParam(":ID_projeto", $_GET['ID_projeto'], PDO::PARAM_INT);
        $prepare -> execute();

        header("location: ../home.php");
    }
    else {
        echo "<script> 
        
        alert('Título existente, escolha outro.');

        </script>";
    }	
	
?> 