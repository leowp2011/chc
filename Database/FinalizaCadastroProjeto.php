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
		
		/*VERIFICA SE O TITULO EXISTE*/
		$SQL_verifyProjeto = 'SELECT titulo FROM projetos WHERE titulo = :titulo';
		$result_projeto = $conexao -> prepare($SQL_verifyProjeto);
		$result_projeto -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
		$result_projeto -> execute();

		if ($result_projeto -> rowCount() == 0)
		{
			// $row_projeto = $result_projeto -> fetch(PDO::FETCH_ASSOC);

			/*INSERE NOVO TIPO DE CARACTERIZAÇÃO NA TABLE*/
			if (isset($_POST['NEW_caracterizacao']) AND !empty($_POST['NEW_caracterizacao']))
			{
				$SQL_tableCaracterizacao = 'INSERT INTO tipos_caracterizacoes 
								(caracteristica)

							VALUES (:caracteristica)';

				$prepare = $conexao -> prepare($SQL_tableCaracterizacao);
				$prepare -> bindParam(":caracteristica", $caracterizacao, PDO::PARAM_STR);
				$prepare -> execute();

				$caracterizacao = $conexao -> lastInsertId();
			}

			// /*INSERE NOVA MODALIDADE NA TABLE*/
			if (isset($_POST['NEW_modalidade']) AND !empty($_POST['NEW_modalidade']))
			{
				$SQL_tableModalidade = 'INSERT INTO modalidades 
								(nomeModalidade)

							VALUES (:modalidade)';

				$prepare = $conexao -> prepare($SQL_tableModalidade);
				$prepare -> bindParam(":modalidade", $modalidade, PDO::PARAM_STR);
				$prepare -> execute();

				$modalidade = $conexao -> lastInsertId();
			}
			// /*--------------------------------------------------------------- */

			// /*INSERE NA TABLE AREA CONHECIMENTO*/
			if (isset($_POST['NEW_areaConhecimento']) AND !empty($_POST['NEW_areaConhecimento']))
			{
				$SQL_tableAreaConhecimento = 'INSERT INTO area_conhecimentos 
								(nome_areaconhecimento)

							VALUES (:area_conhecimento)';

				$prepare = $conexao -> prepare($SQL_tableAreaConhecimento);
				$prepare -> bindParam(":area_conhecimento", $area_conhecimento, PDO::PARAM_STR);
				$prepare -> execute();

				$area_conhecimento = $conexao -> lastInsertId();
			}
			/*--------------------------------------------------------------- */

			/*INSERE NA TABLE AREA CONHECIMENTO*/
			if (!empty($_POST['anexo']))
			{
				$SQL_tableAnexo = 'INSERT INTO anexos 
								(anexo)

							VALUES (:anexo)';

				$prepare = $conexao -> prepare($SQL_tableAnexo);
				$prepare -> bindParam(":anexo", $anexo, PDO::PARAM_STR);
				$prepare -> execute();

				$anexo = $conexao -> lastInsertId();
			}
			else {
				$anexo = null;
			}
			/*--------------------------------------------------------------- */
			$SQL_tableProjeto = 'INSERT INTO projetos 
							(titulo, 
							resumo, 
							ID_caracterizacaoFK,
							OBJ_geral,
							OBJ_especifico, 
							metodologia, 
							recursos, 
							referencias, 
							ID_modalidadeFK,
							ID_areaconhecimentoFK,
							ID_anexoFK,
							ID_usuarioFK)

					VALUES (:titulo,
							:resumo,
							:caracterizacao,
							:Obj_geral,
							:Obj_especifico,
							:metodologia,
							:recursos,
							:referencias,
							:modalidade,
							:area_conhecimento,
							:anexo,
							:user)';

			$prepare = $conexao -> prepare($SQL_tableProjeto);
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
			$prepare -> bindParam(":anexo", $anexo, PDO::PARAM_STR);
			$prepare -> bindParam(":user", $_SESSION['cpf'], PDO::PARAM_STR);
			$prepare -> execute();

			$ultimoID_projetos = $conexao -> lastInsertId();

			/*--------------------------------------------------------------- */

			/*INSERE NA TABLE CRONOGRAMA*/
			$SQL_tableCronograma = 'INSERT INTO cronogramas 
							(data_cronograma, 
							atividade,
							ID_projetoFK)

					VALUES (:data_cronograma,
							:atividade,
							:ID_projetoFK)';
			
			$prepare = $conexao -> prepare($SQL_tableCronograma);
			$prepare -> bindParam(":data_cronograma", $data_cronograma, PDO::PARAM_STR);
			$prepare -> bindParam(":atividade", $atividade, PDO::PARAM_STR);
			$prepare -> bindParam(":ID_projetoFK", $ultimoID_projetos, PDO::PARAM_INT);
			$prepare -> execute();

			header("location: ../home.php");

		}
		else {
			echo "<script> 
			
			alert('Título existente, escolha outro.');
	
			</script>";
		}	
	} 
	else {
?>
		<script> 
			alert('Erro ao se cadastrar. Confira se inseriu todos os dados corretamente!');

			window.location.replace('../CadastroProjeto.php'); 
		</script>
		
<?php	
	}
?> 