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
		$this->conn 	= new ConexaoPDO();
		$this->usuario 	= new Usuario();
	}
	public function AutenticarLogin($ra, $password) 
	{
		try 
        {
            // Prepara a consulta SQL
            $SELECT_dados_login = "SELECT id_usuario, nome, sobrenome, ra, tipo
                    FROM 
						usuario 
                    WHERE 
						ra = :ra 
					AND 
						senha = :password 
                    LIMIT 1";
        
            $result_user = $this->conn->getConexao()->prepare($SELECT_dados_login);
            $result_user->bindParam(':ra', $ra, PDO::PARAM_INT);
            $result_user->bindParam(':password', $password, PDO::PARAM_STR);
            $result_user->execute();
        
			$OBJ_login = $result_user->fetch(PDO::FETCH_OBJ);

			if (is_null($OBJ_login) || empty($OBJ_login))
				echo "Nenhum resultado encontrado na base de dados.";
			else 
				return $OBJ_login;

        }
        catch(PDOException $err) {
            die("Erro ao buscar dados no banco de dados!" . $err -> getMessage());
        }
	}
	
	public  function VerificarLogin() {
		// Verifica se existe os dados da sessão de login
		if((!isset($_SESSION['logado'])) AND ($_SESSION['logado'] == false))
		{    // Usuário não logado! Redireciona para a página de login
			header("Location: login.php");
			exit;
	
		}	
	}
}