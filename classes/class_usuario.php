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

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setRa($ra) {
        $this->ra = $ra;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function getDados($id_usuario)
    {
        try 
        {
            $SQL_user = "SELECT * FROM usuario 
            WHERE id_usuario = :id_usuario";
            
            $result_user = $this->conn->getConexao()->prepare($SQL_user);
            $result_user->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result_user->execute();
        
            return $result_user -> fetch(PDO::FETCH_OBJ);
            
        }
        catch(PDOException $err) {
            die("Erro de conexao com o banco de dados!" . $err -> getMessage());
        }
    }
}