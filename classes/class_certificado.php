<?php
require_once 'class_usuario.php';
class Certificado
{
    private $id_certificado;
    private $nome;
    private $caminho;
    private $status;
    private $horas;

    private $conn;
    private $usuario;
    
    public function __construct() 
    {
        $this->conn       = new ConexaoPDO();
        $this->usuario    = new Usuario();
    }
    
    // public function __construct(Usuario $usuario, $caminhoDocumento, $tipo) {
    //     $this->usuario = $usuario;
    //     $this->nomeUsuario = $usuario->getDados()['nome'];
    //     $this->caminhoDocumento = $caminhoDocumento;
    //     $this->tipo = $tipo;
    // }

    public function ListarCertificado($filtro_valor)
    {
        // Prepara a consulta SQL
        $SQL_certificado = "SELECT * FROM certificado as CER 
                            INNER JOIN usuario as USER 
                            ON (CER.id_usuarioFK = USER.id_usuario)
                            INNER JOIN tipodocumento as TD 
                            ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)
                            INNER JOIN modulo as M 
                            ON (TD.id_moduloFK = M.id_modulo)
                            WHERE CER.status LIKE :filtro";
    
        $result_certificado = $this->conn->getConexao() -> prepare($SQL_certificado);
        $result_certificado->bindParam(':filtro', $filtro_valor, PDO::PARAM_STR);
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
                                <a href="analisar certificado.php?certificado="'. $row->id_certificado .' class="btn btn-primary">Gerenciar Certificado</a>
                            </div>
                        </div>
                    </div>';
            }
    }

    public function AprovarCertificado($id_certificado)
    {
        $SQL_update ="UPDATE certificado 
                set 
                    status = 'pendente'
                where 
                    id_certificado = :id_certificado";

        $SQL_update = $this->conn->getConexao() -> prepare($SQL_update);
        $SQL_update->bindParam(':id_certificado', $id_certificado, PDO::PARAM_INT);
        $SQL_update->execute();
    }

}