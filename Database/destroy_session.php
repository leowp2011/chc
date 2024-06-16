<?php
// Incluir a classe que contém o método para destruir a sessão
require_once '../classes/class_session.php';

// Verificar se a requisição é do tipo POST e se o parâmetro 'action' está presente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    // Obter o nome da ação a ser executada
    $action = $_POST["action"];

    // Verificar se a ação é 'destroySession'
    if ($action == "destroySession") {
        // Iniciar a sessão
        Session::Start();

        // Destruir a sessão
        Session::Destroy();

        // echo "Sessão destruída com sucesso!";
    } else {
        echo "Ação inválida.";
    }
} else {
    echo "Requisição inválida.";
}
