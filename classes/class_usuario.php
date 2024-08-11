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

    public function ListNomeAlunosAprovados($curso)
    {
        try 
        {
            
            $SQL_alunoAprovados = 
            "SELECT 
                u.nome,
                u.id_usuario,
                GROUP_CONCAT(m.id_modulo ORDER BY m.id_modulo ASC SEPARATOR ', ') AS id_modulos,
                GROUP_CONCAT(m.nome_modulo ORDER BY m.id_modulo ASC SEPARATOR ', ') AS nome_modulos,
                GROUP_CONCAT(um.porcentagem ORDER BY m.id_modulo ASC SEPARATOR ', ') AS porcentagens

            FROM 
                usuario as u   
                            
            INNER JOIN usuario_curso as uc 
                ON uc.id_usuarioFK = u.id_usuario  

            INNER JOIN curso as c 
                ON uc.id_cursoFK = c.id_curso

            INNER JOIN usuario_modulo as um 
                ON u.id_usuario = um.id_usuarioFK

            INNER JOIN modulo as m 
                ON um.id_moduloFK = m.id_modulo

            WHERE 
                c.id_curso = $curso 
            AND
                uc.qtd_modulo = 3
            
            GROUP BY u.nome, u.id_usuario
            ORDER BY u.nome";
        
            $result = $this->conn->getConexao() -> prepare($SQL_alunoAprovados);
            $result->execute();
            
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $err) {
            die("Erro ao listar certificado do aluno!" . $err -> getMessage());
        }
    }
}