<?php
require_once 'class_usuario.php';
class Certificado extends Usuario 
{
    private $id_certificado;
    private $nome;
    private $caminho;
    private $status;
    private $horas;
    private $conn;
    
    public function __construct($conn) 
    {
    //     $this -> id_certificado = $id_certificado;
    //     $this -> nome           = $nome;
    //     $this -> caminho        = $caminho;
    //     $this -> status         = $status;
    //     $this -> horas          = $horas;
        $this -> conn          = $conn;
    }
        
    
    // public function __construct(Usuario $usuario, $caminhoDocumento, $tipo) {
    //     $this->usuario = $usuario;
    //     $this->nomeUsuario = $usuario->getDados()['nome'];
    //     $this->caminhoDocumento = $caminhoDocumento;
    //     $this->tipo = $tipo;
    // }

    public function ListarCertificado($filtro_valor)
    // $filtro_valor) {
    {
        // Prepara a consulta SQL
        $SQL_certificado = "SELECT * FROM certificado as CER 
                            INNER JOIN usuario as USER 
                            ON (CER.id_usuarioFK = USER.id_usuario)
                            INNER JOIN tipodocumento as TD 
                            ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)
                            INNER JOIN modulo as M 
                            ON (TD.id_moduloFK = M.id_modulo)";
    
        $result_certificado = $this->conn -> prepare($SQL_certificado);
        // $result_certificado->bindParam(':filtro', $filtro_valor, PDO::PARAM_STR);
        $result_certificado->execute();

            while ($row = $result_certificado->fetch(PDO::FETCH_OBJ)) {

                echo '
                    <div class="cardlist">    
                        <div class="card">
                            <h5 class="card-name">' . 
                            htmlspecialchars($row->nome) 
                            .'</h5>
                            <div class="card-body">
                                <h5 class="card-title">' .
                                htmlspecialchars($row->titulo)    
                                . '</h5>
                                <p class="card-module">' .
                                htmlspecialchars($row->nome_modulo)
                                . '</p>
                                <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                            </div>
                        </div>
                    </div>';
            }
    }

}