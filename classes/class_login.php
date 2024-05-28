<?php
require_once 'class_conexao.php';
require_once 'class_session.php';
require_once 'class_usuario.php';

Session::Start();

// Classe para manipulação do login
class Login
{
    private $ra;
    private $password;

	private $conn;
    private $usuario;
	// Método para verificar as credenciais do usuário
	public function __construct()
	{
		$this->usuario = new Usuario();
		// $this->conn = new ConexaoPDO();
	}
	public function Autenticar($ra, $password) 
	{
		$this->ra 		= $ra;
		$this->password = $password;

		$obj_sql = $this->usuario->getDadosLogin($ra, $password);
		
		try 
		{
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