<?php
    require_once '../classes/class_certificado.php';
    
    $class_certificado = new Certificado();

    $class_certificado->AprovarCertificado($_POST['certificado']);


 