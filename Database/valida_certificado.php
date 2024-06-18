<?php
require_once '../classes/class_certificado.php';

$certificado = new Certificado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) 
    {
        $fileTmpPath    = $_FILES['file']['tmp_name']; // Caminho temporário do arquivo
        $fileName       = $_FILES['file']['name']; // Nome original do arquivo
        $fileSize       = $_FILES['file']['size']; // Tamanho do arquivo
        $fileType       = $_FILES['file']['type']; // Tipo MIME do arquivo
        $fileNameCmps   = explode(".", $fileName); // Divide o nome do arquivo em partes pelo ponto
        $fileExtension  = strtolower(end($fileNameCmps)); // Pega a última parte e converte para minúsculas

        // Define o diretório de destino
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        // Verifica se a extensão do arquivo é permitida
        $allowedfileExtensions = array('jpg', 'jpeg', 'pdf');
        if (in_array($fileExtension, $allowedfileExtensions)) 
        {
            // Move o arquivo para o diretório de destino
            // if (move_uploaded_file($fileTmpPath, $dest_path)) 
            if( isset($_POST['titulo']) AND 
                isset($_POST['horas'])  AND
                isset($_POST['tipodocumento']))
            {
                
                // 'modulo'    => $_POST['modulo'];
                // 'tipo_doc'  => $_POST['tipoDocumento'];
                // 'horas'     => $_POST['horas'];

                $certificado->setTitulo($_POST['titulo']);

                $certificado->Insert_Database();
                
            } else 
            {
                echo "Houve um problema ao mover o arquivo para o diretório de destino.";
            }
        } else {
            echo "Tipo de arquivo não permitido.";
        }
    } else {
        echo "Houve um erro no upload do arquivo.";
    }
}