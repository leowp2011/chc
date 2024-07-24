<?php
require_once 'class_conexao.php';
require_once 'class_usuario.php';

class Certificado
{
    private $table = 'certificado';
    private $id_certificado;
    private $titulo;
    private $caminho;
    private $status;
    private $id_tipodocumentoFK;
    private $horas;

    private $id_usuarioFK;


    private $usuario;
    private $conn;
    
    public function __construct() 
    {
        $this->conn       = new ConexaoPDO();
        $this->usuario    = new Usuario();
    }

    public function getIdCertificado() {
        return $this->id_certificado;
    }

    public function setIdCertificado($id_certificado) {
        $this->id_certificado = $id_certificado;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setCaminho($caminho) {
        $this->caminho = $caminho;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTipoDocumento($tipodocumento) {
        $this->id_tipodocumentoFK = $tipodocumento;
    }

    public function setHoras($horas) {
        $this->horas = $horas;
    }

    public function setAluno($id_usuario) {
        $this->id_usuarioFK = $id_usuario;
    }

    public function getCertificate($id_certificado)
    {
        $SQL_listcertificate = "SELECT 
                CER.*, 
                USER.nome, USER.sobrenome, USER.tipo,
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

    public function InsertCertificate()
    {
        try 
        {
            $table = $this->table;

            // Prepara a consulta SQL
            $INSERT_certificado = "INSERT INTO $table
                            (titulo, caminho, status, horas, id_usuarioFK, id_tipodocumentoFK, observacao)
                        VALUES 
                            (:titulo, :caminho, 'pendente', :horas, :id_usuarioFK, :id_tipodocumentoFK, '')";
                            
            $result = $this->conn->getConexao() -> prepare($INSERT_certificado);
            // $result->bindParam(':table', $this->table, PDO::PARAM_STR);
            $result->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
            $result->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
            $result->bindParam(':horas', $this->horas, PDO::PARAM_INT);
            $result->bindParam(':id_usuarioFK', $this->id_usuarioFK, PDO::PARAM_INT);
            $result->bindParam(':id_tipodocumentoFK', $this->id_tipodocumentoFK, PDO::PARAM_INT);

            return $result->execute();

        }
        catch(PDOException $err) {
            die("Erro ao listar certificado do aluno!" . $err -> getMessage());
        }
    }

    public function UpdateCertificate()
    {
        try 
        {
            $table = $this->table;

            // echo "tipo doc no metodo = " . $this->id_tipodocumentoFK;
            // Prepara a consulta SQL
            $UPDATE_certificado = "UPDATE $table
                        SET 
                            titulo              = :titulo,
                            -- caminho             = :caminho,
                            horas               = :horas,  
                            id_tipodocumentoFK  = :id_tipodocumentoFK
                        WHERE 
                            id_certificado = :id_certificado";

            $result = $this->conn->getConexao() -> prepare($UPDATE_certificado);
            $result->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
            // $result->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
            $result->bindParam(':horas', $this->horas, PDO::PARAM_INT);
            $result->bindParam(':id_tipodocumentoFK', $this->id_tipodocumentoFK, PDO::PARAM_INT);
            $result->bindParam(':id_certificado', $this->id_certificado, PDO::PARAM_INT);
            
            return $result->execute();

        }
        catch(PDOException $err) {
            die("Erro ao atulizar dados do certificado do aluno!" . $err -> getMessage());
        }
    }
    
    public function ListarAllCertificate()
    {
        try 
        {
            
            $SQL_certificado = 
            "SELECT * FROM 
                certificado as CER  
            INNER JOIN usuario as USER   
                ON (CER.id_usuarioFK = USER.id_usuario)

            INNER JOIN usuario_curso as UC 
                ON (UC.id_usuarioFK = USER.id_usuario)  
    
            INNER JOIN curso as C 
                ON (UC.id_cursoFK = C.id_curso)

            INNER JOIN tipodocumento as TD 
                ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)

            INNER JOIN modulo as M 
                ON (TD.id_moduloFK = M.id_modulo)
                
            ORDER BY M.nome_modulo";
        
            $result_certificado = $this->conn->getConexao() -> prepare($SQL_certificado);
            $result_certificado->execute();
            
            return $result_certificado->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $err) {
            die("Erro ao listar certificado do aluno!" . $err -> getMessage());
        }
    }

    public function ListarAllCertificado($table, $atributo, $conteudo)
    {
        try 
        {
            if ($table <> 'USER')
            {
                $SQL_certificado = 
                    "SELECT * FROM 
                        certificado as CER  
                    INNER JOIN usuario as USER   
                        ON (CER.id_usuarioFK = USER.id_usuario)

                    INNER JOIN usuario_curso as UC 
                        ON (UC.id_usuarioFK = USER.id_usuario)  
            
                    INNER JOIN curso as C 
                        ON (UC.id_cursoFK = C.id_curso)

                    INNER JOIN tipodocumento as TD 
                        ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)

                    INNER JOIN modulo as M 
                        ON (TD.id_moduloFK = M.id_modulo)
                    
                    WHERE ".
                        $table.".$atributo LIKE :conteudo";
                
                $result_certificado = $this->conn->getConexao() -> prepare($SQL_certificado);
                $result_certificado->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);

                $result_certificado->execute();
            }
            else 
            {
                $SQL_certificado = 
                    "SELECT * FROM 
                        certificado as CER  
                    INNER JOIN usuario as USER   
                        ON (CER.id_usuarioFK = USER.id_usuario)

                    INNER JOIN usuario_curso as UC 
                        ON (UC.id_usuarioFK = USER.id_usuario)  

                    INNER JOIN curso as C 
                        ON (UC.id_cursoFK = C.id_curso)

                    INNER JOIN tipodocumento as TD 
                        ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)

                    INNER JOIN modulo as M 
                        ON (TD.id_moduloFK = M.id_modulo)
                    
                    WHERE ".
                        $table.".$atributo LIKE '%". $conteudo ."%'";
                
                $result_certificado = $this->conn->getConexao() -> prepare($SQL_certificado);

                $result_certificado->execute();
            }
            
            return $result_certificado->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $err) {
            die("Erro ao listar certificado do aluno!" . $err -> getMessage());
        }
    }

    public function ListAllCertificateAluno($table, $atributo, $conteudo, $id_usuario)
    {
        try 
        {
            if ($conteudo <> 'todos')
            {
                $SELECT_cert_aluno = 
                    "SELECT * FROM 
                        certificado as CER  
                    INNER JOIN usuario as USER   
                        ON (CER.id_usuarioFK = USER.id_usuario)

                    INNER JOIN usuario_curso as UC 
                        ON (UC.id_usuarioFK = USER.id_usuario)  

                    INNER JOIN curso as C 
                        ON (UC.id_cursoFK = C.id_curso)

                    INNER JOIN tipodocumento as TD 
                        ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)

                    INNER JOIN modulo as M 
                        ON (TD.id_moduloFK = M.id_modulo)
                    
                    WHERE ".
                        $table.".$atributo LIKE :conteudo
                    AND 
                        USER.id_usuario =" . $id_usuario;                              
            }                
            else {
                $SELECT_cert_aluno = 
                    "SELECT * FROM 
                        certificado as CER  

                    INNER JOIN usuario as USER   
                        ON (CER.id_usuarioFK = USER.id_usuario)

                    INNER JOIN usuario_curso as UC 
                        ON (UC.id_usuarioFK = USER.id_usuario)  

                    INNER JOIN curso as C 
                        ON (UC.id_cursoFK = C.id_curso)

                    INNER JOIN tipodocumento as TD 
                        ON (CER.id_tipodocumentoFK = TD.id_tipodocumento)

                    INNER JOIN modulo as M 
                        ON (TD.id_moduloFK = M.id_modulo)
                    
                    WHERE 
                        USER.id_usuario =" . $id_usuario;   
            }
            
            $result = $this->conn->getConexao() -> prepare($SELECT_cert_aluno);
            $result->execute();

            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $err) {
            die("Erro ao listar certificado do aluno!" . $err -> getMessage());
        }
    }

    public function gerarHtmlCertificados($certificados, $tipo_user)
    {
        $html = '';
        foreach ($certificados as $cert) 
        {
            $html .= '<div class="cardlist">';
            $html .= '<div class="card">';

            if ($cert->status == 'aprovado')
            {
                $html .= '<span class="card-badge aprovado"></span>';
            }
            elseif ($cert->status == 'pendente')
            {
                $html .= '<span class="card-badge pendente"></span>';
            }    
            else
            {
                $html .= '<span class="card-badge reprovado"></span>';     
            }    

            $html .= '<h4 class="card-name">'; 
            $html .= htmlspecialchars($cert->nome);
            $html .= '</h4>';
            $html .= '<h5 class="card-curso">';
            $html .= htmlspecialchars($cert->nome_curso);
            $html .= '</h5><br>';
            $html .= '<h5 class="card-title">'; 
            $html .= htmlspecialchars($cert->titulo);
            $html .= '</h5>';
            $html .= '<p class="card-module">';
            $html .= htmlspecialchars($cert->nome_modulo);
            $html .= '</p>';
            
            if ($tipo_user == 'aluno') 
            {
                if (($cert->status == 'pendente') || ($cert->status == 'reprovado')) 
                {
                    $html .= '<a href="editar_certificado-aluno.php?certificado='. htmlspecialchars($cert->id_certificado) .'" class="btn btn-primary">Editar Certificado </a>';
                }
            
            } else 
            {
                $html .= '<a href="analisar certificado.php?certificado='. htmlspecialchars($cert->id_certificado) .'" class="btn btn-primary">Gerenciar Certificado </a>';
            }
            
            $html .= '</div>';
            $html .= '</div>';
        }
        return $html;
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