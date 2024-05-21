<?php
require_once 'class_usuario.php';
require_once 'class_session.php';

Session::Start();

// Classe para manipulação do login
class Login
{
	private $conn;
    private $ra;
    private $password;
    private $usuario;
	// Método para verificar as credenciais do usuário
	public function __construct($conn)
	{
		$this->usuario = new Usuario();
		$this->conn = $conn;
	}
	public function Autenticar($ra, $password) 
	{
		$this->ra 		= $ra;
		$this->password = $password;

		$obj_sql = $this->usuario->getDadosLogin($ra, $password, $this->conn);
		
		try 
		{
			// var_dump($obj_sql);

            // Verifica se há resultados
            if ($obj_sql <> NULL) 
                return $obj_sql; // Credenciais válidas
            else 
                return false; // Credenciais inválidas
            
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
		
	}

	public  function VerificarLogin() {
		// Verifica se existe os dados da sessão de login
		if((!isset($_SESSION['logado'])) AND ($_SESSION['logado'] == false))
		{    // Usuário não logado! Redireciona para a página de login
			header("Location: ../login.php");
			exit;
	
		}	
	}
}