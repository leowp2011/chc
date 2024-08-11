<?php
require_once 'class_conexao.php';
require_once 'class_curso.php';

class Modulo
{
    private $id_modulo;
    private $nome_modulo;
    private $limite_horas_modulo;
    
    private $conn;
    private $curso;
    
    public function __construct() 
    {
        $this->conn     = new ConexaoPDO();
        $this->curso    = new Curso();
    }

    public function ListAllModulo()
    {
        
        // Prepara a consulta SQL
        $SQL_modulo = "SELECT * FROM modulo";
                        
        $result = $this->conn->getConexao() -> prepare($SQL_modulo);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListModulo_Curso($curso)
    {
        try 
        {
            $SQL_modulo = 
                "SELECT 
                    m.id_modulo, m.nome_modulo 
                FROM 
                    modulo as m 
                            
                INNER JOIN 
                    curso as c
                ON 
                    (m.id_cursoFK = c.id_curso)
                    
                WHERE
                    c.id_curso = :curso
                    
                ORDER BY m.nome_modulo";
                            
            $result = $this->conn->getConexao() -> prepare($SQL_modulo);
            $result->bindParam(':curso', $curso, PDO::PARAM_INT);
            $result->execute();

            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $err) {
            die("Erro na listagem dos modulos!" . $err -> getMessage());
        }
    }
}