<?php

require_once '../classes/class_conexao.php';
require_once '../classes/class_session.php';
require_once '../classes/class_login.php';

if (isset($_SESSION['logado'])) 
{
	Session::Destroy();
	exit;
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$ra 		= $_POST['ra'];
    $password 	= md5(md5($_POST['senha']));

	/*CRIA CONEXAO COM O BANCO */
	$conexao = new ConexaoPDO();
	$conn = $conexao->getConexao();	

    // Instancia a classe Login
    $login = new Login($conn);

	// /*VERIFICA LOGIN NO BANCO */
	$obj_user = $login->Autenticar($ra, $password);

    // // Chama o método authenticate para verificar as credenciais
    if ($obj_user <> false) 
	{
		Session::Start();
		
		// var_dump($obj_user);
		$_SESSION['obj_user'] 	= $obj_user;
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