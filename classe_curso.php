<?php

class Curso {
    private $ID_curso;
    private $nome;
    //private $ra;

    // Construtor da classe
    public function __construct($ID_curso, $nome) {
        $this -> ID_curso = $ID_curso;
        $this -> nome   = $nome;
        //$this -> tipo = $tipo;
    }

    public function getNome() {
        return $this -> nome;
    }

}

?>