<?php
require_once 'classes/class_login.php';
require_once 'classes/class_usuario.php';

$login      = new Login();

$login->VerificarLogin();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Página inicial </title>

    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="dist/css/index.css">

    <link rel="stylesheet" href="dist/css/incluir_certificado.css">

</head>
<body>

<div class="top-bar">
    <img src="https://home.unicruz.edu.br/wp-content/uploads/2022/04/logo-horizontal-PNG.png" alt="Logo" class="top-logo">
    <div class="top-bar-buttons">
        <button class="top-button"><i class="fas fa-dollar-sign fa-lg" style="padding-bottom: 4px;"></i><br>Financeiro</button>
        <button class="top-button"><i class="fas fa-user-graduate fa-lg" style="padding-bottom: 4px;"></i><br>Matrícula Online</button>
        <button class="top-button btn-user"><i class="fas fa-user fa-lg" style="padding-bottom: 4px;"></i><br>
            <?php ECHO $_SESSION['obj_user']->nome;?>
        </button>
    </div>
</div>

<section class="container">
    <div id="sidebar" class="sidebar">
        <button id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="side-data">
            <li>
                <button><i class="fas fa-bullhorn"></i> Mural</button></li>
            <li>
                <button><i class="fas fa-clipboard-list"></i> Grade Curricular</button></li>
            <li>
                <button><i class="fas fa-clock"></i> Quadro de Horários</button></li>
            <li>
                <button><i class="fas fa-user-graduate"></i> Matrícula Online</button></li>
            <li>
                <button id="central-aluno-btn"><i class="fas fa-user"></i> Central do Aluno <i class="fas fa-chevron-right arrow-icon"></i></button>
                
                <ul id="central-aluno-submenu" class="submenu hidden">
                    <li><button>Faltas</button></li>
                    <li><button>Notas</button></li>
                    <li><button>Horas Complementares</button></li>
                </ul>
            </li>
            <li>
                <button><i class="fas fa-user-secret"></i> Secretaria</button></li>
            <li>
                <button><i class="fas fa-folder-open"></i> Arquivos</button></li>
            <li>
                <button><i class="fas fa-file-invoice-dollar"></i> Financeiro</button></li>
            <li>
                <button><i class="fas fa-chart-line"></i> Avaliação Institucional</button></li>
            <li>
                <button><i class="fas fa-external-link-alt"></i> Sites Externos</button></li>
            <li>
                <button><i class="fas fa-file-alt"></i> Relatórios</button></li>
        </ul>
    </div>