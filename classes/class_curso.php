<?php
//leonardo
class Curso {
    private $id_curso;
    private $nome;
    private $conn;

    // Construtor da classe
    public function __construct() 
    {
        $this->conn     = new ConexaoPDO();
    }

    public function setCurso($id) {
        $this->id_curso = $id;
    }

    public function getIdCurso() {
        return $this -> id_curso;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this -> nome;
    }
}

?>