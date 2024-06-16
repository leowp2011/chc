<?php
include 'includes/header.php';

require_once 'classes/class_login.php';
// require_once 'classes/class_usuario.php';
require_once 'classes/class_certificado.php';


$login = new Login();
$login->VerificarLogin();


$usuario = new Usuario();

if ($_SESSION['obj_user']->id_usuario == 'professor')
{
?>
    <div id="main-content" class="main-content">
        <div class="top-content">
            <h2>Horas Complementares</h2>
            <form class="certificaForm" action="search.php" method="POST" id="certificadoForm">
            <div class="filter-container flex-container">
                <a>Selecione o Filtro:</a>
                <select id="selectPrincipal" name="selectTable">
                    <option value=""></option>
                    <option value="nome">Nome do Aluno</option>
                    <option value="modulo">Módulo</option>
                    <option value="status">Status do Certificado</option>
                </select>
            
                <div style="height: 10px;"></div>
            
                <select id="selectSecundario" name="selectValue" disabled style="display: none">
                    <option value=""></option>
                </select>

                <!-- <input type="text" placeholder="Pesquisar" name="search"> -->
                <button type="submit"><i class="fa fa-search"></i></button>    
            </div>
            </form>
        </div>
        <hr>
        <div class="bottom-content" id="certificadosContainer">
            <?php

            $certificado        = new Certificado();
            $listaCertificados  = $certificado->ListarAllCertificado('CER', 'status','pendente');

            ?>
        </div>
    </div>


<?php
}
else if ($_SESSION['obj_user']->tipo == 'aluno')
{
?>

    <div id="main-content" class="main-content">
        <div class="top-content">
            <h2>Horas Complementares</h2>
            <form class="certificadoForm" id="certificadoForm">
            <div class="filter-container flex-container">
                <a>Selecione o Filtro:</a>
                <select id="selectPrincipal" name="selectTable">
                    <option value=""></option>
                    <option value="modulo">Módulo</option>
                    <option value="status">Status do Certificado</option>
                </select>
            
                <div style="height: 10px;"></div>
            
                <select id="selectSecundario" name="selectValue" disabled style="display: none;">
                    <option value=""></option>
                </select>

                <!-- <input type="text" placeholder="Pesquisar" name="search"> -->
                <!-- <button type="submit" onclick="submitForm()"><i class="fa fa-search"></i></button>     -->
                 <input type="submit" value="enviar" onclick="submitForm()">
            </div>
            </form>
        </div>
        <hr>

        <a href="incluir_certificado.php" class="btn">Incluir certificado</a>    

        <div class="bottom-content" id="certificadosContainer">
            <?php

            $certificado        = new Certificado();
            $listaCertificados  = $certificado->ListAllCertificateAluno('CER', 'status','reprovado');

            echo $certificado->gerarHtmlCertificados($listaCertificados, $_SESSION['obj_user']->tipo);    
            
            ?>
        </div>
    </div>

<?php
}
include 'includes/footer.php';