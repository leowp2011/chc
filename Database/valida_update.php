<?php
require_once '../classes/class_certificado.php';

$certificado = new Certificado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (!empty($_POST['titulo']) AND !empty($_POST['horas']) AND !empty($_POST['tipoDocumento'])) 
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
            if (in_array($fileExtension, $allowedfileExtensions)):
                $certificado->setCaminho($dest_path);
            endif;
            
        }
        
        // echo $_POST['id_certificado'] . "<br>";
        // echo $_POST['titulo']. "<br>";
        // echo $_POST['horas']. "<br>";
        // echo "tipo doc enviado = " . $_POST['tipoDocumento'] . " <br>";

        $certificado->setIdCertificado($_POST['id_certificado']);
        $certificado->setTitulo($_POST['titulo']);
        $certificado->setHoras($_POST['horas']);
        $certificado->setTipoDocumento($_POST['tipoDocumento']);
        
        $certificado->UpdateCertificate();
        
        // var_dump($certificado);
    
        header("Location: ../index.php");
    }
    else 
    {
        echo "tipo doc enviado = " . $_POST['tipoDocumento'] . " <br>";

        echo "Campos não preenchido!";
    }
}