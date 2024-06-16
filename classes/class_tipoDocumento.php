<?php
require_once 'class_modulo.php';

class Tipo_Documento
{
    private $id_tipodocumento;
    private $nome_tipo;
    private $limite_horas;
    
    private $conn;
    private $modulo;
    
    public function __construct() 
    {
        $this->conn     = new ConexaoPDO();
        $this->modulo   = new Modulo();
    }

    public function ListAllTipoDocumento()
    {
        $SQL_tipoDocumento = "SELECT * FROM tipodocumento";
                        
        $result = $this->conn->getConexao() -> prepare($SQL_tipoDocumento);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListTipoDocumento_Modulo()
    {   
        // Prepara a consulta SQL
        $SQL_tipoDocumento = "SELECT * FROM tipodocumento as td 
                            INNER JOIN 
                                modulo as m
                            ON 
                                (td.id_moduloFK = m.id_modulo)";
                        
        $result = $this->conn->getConexao() -> prepare($SQL_tipoDocumento);
        // $result->bindParam(':modulo', $modulo, PDO::PARAM_STR);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }
}