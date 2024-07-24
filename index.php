<?php
include 'includes/header.php';

require_once 'classes/class_certificado.php';

$certificado        = new Certificado();


if ($_SESSION['obj_user']->tipo == 'professor')
{
?>
    <div id="main-content" class="main-content">
        <div class="top-content">
            <h2>Horas Complementares</h2>

            <form class="certificaForm" id="certificadoForm" method="post">

                <div class="filter-container flex-container">
                    <a>Selecione o Filtro:</a>
                    <select id="selectPrincipal" name="selectTable">
                        <option value=""></option>
                        <option value="aluno">Nome do Aluno</option>
                        <option value="modulo">Módulo</option>
                        <option value="certificado">Status do Certificado</option>

                        <option value="todos">Todos os certificado</option>
                    </select>
                
                    <select id="selectSecundario" name="selectValue" disabled style="display: none">
                    </select>

                    <input type="text" placeholder="Pesquisar por certificado..." name="search" id="search" style="display: none;" disabled>

                    <button type="button" onclick="submitForm()"> Buscar <i class="fa fa-search"></i> </button>
                </div>

            </form>
        </div>
        <hr>

        <a href="incluir_certificado.php" class="btn-add-certificado"><i class="fa fa-plus"></i> Emitir Ofício</a>

        <div class="bottom-content" id="certificadosContainer">
            <?php
                $listaCertificados  = $certificado->ListarAllCertificado('CER', 'status','pendente');

                echo $certificado->gerarHtmlCertificados($listaCertificados, $_SESSION['obj_user']->tipo);

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

        <div class="bottom-content" id="certificadosContainer">
            <?php

            $certificado        = new Certificado();
            $listaCertificados  = $certificado->ListAllCertificateAluno('CER', 'status','todos', $_SESSION['obj_user']->id_usuario);

            echo $certificado->gerarHtmlCertificados($listaCertificados, $_SESSION['obj_user']->tipo);    
            
            ?>
        </div>
    </div>

<?php
}
include 'includes/footer.php';