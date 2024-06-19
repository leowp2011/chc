<?php
require_once '../classes/class_login.php';
require_once '../classes/class_usuario.php';

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$ra 		= $_POST['ra'];
    $password 	= md5(md5($_POST['senha']));

    $login = new Login();
	$OBJ_user = $login->AutenticarLogin($ra, $password);

    // Chama o método authenticate para verificar as credenciais
    if ($OBJ_user <> false) 
	{
		
		$usuario = new Usuario();

		/**SETANDO DADOS DO USUARIO LOGADO */
		$usuario->setId_usuario($OBJ_user->id_usuario);
		$usuario->setNome($OBJ_user->nome);
		$usuario->setSobrenome($OBJ_user->sobrenome);
		$usuario->setRa($OBJ_user->ra);
		$usuario->setTipo($OBJ_user->tipo);


		$_SESSION['obj_user'] 	= $OBJ_user;
		$_SESSION['logado'] 	= true;

		header("Location: ../index.php");
         
    } else {
		$_SESSION['logado'] 		= false;
        
		$_SESSION['ra_error'] 		= $ra; 
		$_SESSION['senha_error'] 	= $_POST['senha'];

		echo "
			<script> 
				alert('RA ou senha incorreto!');
			
				window.location.replace('../login.php'); 
		
			</script>";
    }
}