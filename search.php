<?php
require_once 'classes/class_session.php';
require_once 'classes/class_certificado.php';

Session::Start();

// Parâmetros da requisição
$table = $_POST['selectTable'];
$value = $_POST['selectValue'];

// echo $value;

if ($_SESSION['obj_user']->tipo == 'aluno') 
{
  if ($table == 'modulo')
  {

    // Chamando o método listarCertificados com os parâmetros
    $certificado  = new Certificado();
    $list_certificates = $certificado->ListAllCertificateAluno('M', 'nome_modulo', $value);
  }
  // Gerando o HTML dos certificados
  $htmlCertificados = $certificado->gerarHtmlCertificados($list_certificates);

  // Retornando o HTML
  echo $htmlCertificados;
}