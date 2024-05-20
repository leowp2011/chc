<?php
	session_start(); 

	include 'conexao.php'; 

	if (isset($_POST['N_matricula']) && isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['setor']) && isset($_POST['especialidade']) && isset($_POST['conselho']) && isset($_POST['classificacao']) && isset($_POST['N_cns']) && isset($_POST['convenios']) && isset($_POST['faturamento']) && isset($_POST['atuacao']) && isset($_POST['observacao'])) 
	{

		$N_matricula 		= $_POST['N_matricula'];
		$cpf 				= $_POST['cpf'];
		$nome 				= $_POST['nome'];
		$sobrenome			= $_POST['sobrenome'];
		$setor 				= $_POST['setor'];
		$especialidade 		= $_POST['especialidade'];
		$conselho 			= $_POST['conselho'];
		$classificacao 		= $_POST['classificacao'];
		$N_cns				= $_POST['N_cns'];
		$convenios  		= $_POST['convenios'];
		$faturamento 		= $_POST['faturamento'];
		$atuacao 			= $_POST['atuacao'];
		$observacao 		= $_POST['observacao'];	

		/*VERIFICA SE O TITULO EXISTE*/
		$SQL_verifyUser = 'SELECT cpf, nome, sobrenome FROM usuarios WHERE cpf = :cpf';
		$result_user = $conexao -> prepare($SQL_verifyUser);
		$result_user -> bindParam(":cpf", $cpf, PDO::PARAM_STR);
		$result_user -> execute();

		if ($result_user -> rowCount() == 0)
		{
			/*INSERE NA TABLE AREA CONHECIMENTO*/
			if ((!empty($_POST['NEW_especialidade'])) AND ($especialidade == 'outro'))
			{
				// $SQL_tableAnexo = 'INSERT INTO anexos 
				// 				(anexo)

				// 			VALUES (:anexo)';

				// $prepare = $conexao -> prepare($SQL_tableAnexo);
				// $prepare -> bindParam(":anexo", $anexo, PDO::PARAM_STR);
				// $prepare -> execute();

				// $anexo = $conexao -> lastInsertId();
			}
			/*--------------------------------------------------------------- */
			$SQL_tableUsuario = 'INSERT INTO usuarios 
							(N_matricula,
							cpf,
							nome,
							sobrenome,
							setor,
							especialidade,
							conselho,
							classificacao,
							N_cns,
							convenios,
							faturamento,
							atuacao,
							observacao)

					VALUES (:N_matricula,
							:cpf,
							:nome,
							:sobrenome,
							:setor,
							:especialidade,
							:conselho,
							:classificacao,
							:N_cns,
							:convenios,
							:faturamento,
							:atuacao,
							:observacao)';

			$prepare = $conexao -> prepare($SQL_tableUsuario);
			$prepare -> bindParam(":N_matricula", $N_matricula, PDO::PARAM_INT);
			$prepare -> bindParam(":cpf", $cpf, PDO::PARAM_STR);
			$prepare -> bindParam(":nome", $nome, PDO::PARAM_STR);
			$prepare -> bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
			$prepare -> bindParam(":setor", $setor, PDO::PARAM_STR);
			$prepare -> bindParam(":especialidade", $especialidade, PDO::PARAM_STR);
			$prepare -> bindParam(":conselho", $conselho, PDO::PARAM_STR);
			$prepare -> bindParam(":classificacao", $classificacao, PDO::PARAM_STR);
			$prepare -> bindParam(":N_cns", $N_cns, PDO::PARAM_INT);
			$prepare -> bindParam(":convenios", $convenios, PDO::PARAM_STR);
			$prepare -> bindParam(":faturamento", $faturamento, PDO::PARAM_INT);
			$prepare -> bindParam(":atuacao", $atuacao, PDO::PARAM_STR);
			$prepare -> bindParam(":observacao", $observacao, PDO::PARAM_STR);
			$prepare -> execute();


			header("location: ../home.php");

		}
		else {
			// $_SESSION['N_matricula'] = $N_matricula;
			// $_SESSION['cpf'] = $cpf;
			// $_SESSION['nome'] = $nome; 				
			// $_SESSION['sobrenome'] = $sobrenome;			
			// $_SESSION['setor'] = $setor; 				
			// $_SESSION['conselho'] = $conselho; 			
			// $_SESSION['classificacao'] = $classificacao; 		
			// $_SESSION['N_cns'] = $N_cns;				
			// $_SESSION['convenio'] = $convenios;
			// $_SESSION['faturamento'] = $faturamento; 		
			// $_SESSION['atuacao'] = $atuacao; 			
			// $_SESSION['observacao'] = $observacao;

			echo "<script> 
				
				alert('Usuário já cadastrado!');

			
			</script>";	

			header("Location: ../CadastroUsuario.php");
		}
	}	 
	else {
?>
		<script> 
			alert('Erro ao se cadastrar. Confira se inseriu todos os dados corretamente!');

			window.location.replace('../CadastroUsuario.php'); 
		</script>
		
<?php	
	}
?> 