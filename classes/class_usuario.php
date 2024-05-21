<?php
require_once 'class_conexao.php';

class Usuario 
{
    private $id_usuario;
    private $nome;
    private $sobrenome;
    private $ra;
    private $password;
    private $tipo;

    private $conn;
    
    // // Construtor da classe
    public function __construct() 
    {
        $this->conn = new ConexaoPDO();
    }

    
    public function setDados($nome, $sobrenome, $ra, $password, $tipo)
    {
        $this->nome         = $nome;
        $this->sobrenome    = $sobrenome;
        $this->ra           = $ra;
        $this->password     = $password;
        $this->tipo         = $tipo;
    }

    public function getDados($id_usuario)
    {
        $SQL_user = "SELECT * FROM usuario 
        WHERE id_usuario = :id_usuario";
    
        $result_user = $this->conn->getConexao()->prepare($SQL_user);
        $result_user->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $result_user->execute();
    
        return $result_user -> fetch(PDO::FETCH_OBJ);
    }
    
    public function getDadosLogin($ra, $password) 
    {
        // Prepara a consulta SQL
        $SQL_user = "SELECT id_usuario, nome, ra, tipo
        FROM usuario 
        WHERE ra = :ra AND senha = :password 
        LIMIT 1";
    
        $result_user = $this->conn->getConexao()->prepare($SQL_user);
        $result_user->bindParam(':ra', $ra, PDO::PARAM_INT);
        $result_user->bindParam(':password', $password, PDO::PARAM_STR);
        $result_user->execute();
    
        return $result_user -> fetch(PDO::FETCH_OBJ);
    }
}