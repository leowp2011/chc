<?php
//leonardo
class Curso {
    private $ID_curso;
    private $nome;
    private $conn;

    // Construtor da classe
    public function __construct() 
    {
        $this->conn     = new ConexaoPDO();
    }

    public function getNome() {
        return $this -> nome;
    }

}

?>