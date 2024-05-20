<?php
class ConexaoPDO {

    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'horas_complementares';
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err) {
            die("Erro de conexao com o banco de dados!" . $err -> getMessage());
        }
    }

    public function getConexao() {
        return $this -> conexao;
    }

    public function fecharConexao() {
        $this -> conexao = null;
    }

}

// Exemplo de uso da classe de conexão PDO
// $conexaoPDO = new ConexaoPDO();
// $conn = $conexaoPDO->getConexao();

// Utilize a variável $conn para realizar operações no banco de dados

// Não esqueça de fechar a conexão quando não for mais necessária
// $conexaoPDO->fecharConexao();