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

    public function ListarAllCertificado($atributo, $conteudo)
    {
        // Prepara a consulta SQL
        $SQL_certificado = "SELECT * FROM certificado as CER 
                    INNER JOIN usuario as USER 
                        ON (CER.id_usuarioFK = USER.id_usuario)
                    INNER JOIN tipodocumento as TD 
                        ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)
                    INNER JOIN modulo as M 
                        ON (TD.id_moduloFK = M.id_modulo)
                    WHERE 
                        CER.:atributo LIKE :conteudo";
    
        $result_certificado = $this->conn->getConexao() -> prepare($SQL_certificado);
        $result_certificado->bindParam(':atributo', $atributo, PDO::PARAM_STR);
        $result_certificado->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
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
                            <a href="analisar certificado.php?certificado='. htmlspecialchars($row->id_certificado) .'" class="btn btn-primary">Gerenciar Certificado </a>
                        </div>
                    </div>
                </div>';
        }
    }

    public function getCertificate($id_certificado)
    {
        $SQL_listcertificate = "SELECT 
                CER.*, 
                USER.nome, USER.sobrenome,
                TD.*,
                M.* 
                    FROM certificado as CER 
                INNER JOIN usuario as USER 
                    ON (CER.id_usuarioFK = USER.id_usuario)
                INNER JOIN tipodocumento as TD 
                    ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)
                INNER JOIN modulo as M 
                    ON (TD.id_moduloFK = M.id_modulo)
                WHERE 
                    CER.id_certificado = :id_certificado";

        $result = $this->conn->getConexao() -> prepare($SQL_listcertificate);
        $result->bindParam(':id_certificado', $id_certificado, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function AprovarCertificado($id_certificado)
    {
        $SQL_update ="UPDATE certificado 
                set 
                    status = 'aprovado'
                where 
                    id_certificado = :id_certificado";

        $SQL_update = $this->conn->getConexao() -> prepare($SQL_update);
        $SQL_update->bindParam(':id_certificado', $id_certificado, PDO::PARAM_INT);
        $SQL_update->execute();

        header("location: ../index.php");
    }

    public function ReprovarCertificado($id_certificado, $obs)
    {
        $SQL_update ="UPDATE certificado 
                set 
                    status      = 'reprovado',
                    observacao  = :obs 
                where 
                    id_certificado = :id_certificado";

        $SQL_update = $this->conn->getConexao() -> prepare($SQL_update);
        $SQL_update->bindParam(':id_certificado', $id_certificado, PDO::PARAM_INT);
        $SQL_update->bindParam(':obs', $obs, PDO::PARAM_STR);
        $SQL_update->execute();

        header("location: ../index.php");
    }

}