<?php
    require_once '../classes/class_certificado.php';
    
    $class_certificado = new Certificado();

    $class_certificado->ReprovarCertificado($_POST['certificado'], $_POST['observacao']);


 