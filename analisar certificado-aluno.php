<?php
include 'includes/header.php';

require_once 'classes/class_certificado.php';
?>

<link rel="stylesheet" href="dist/css/analisar certificado.css">

<div id="main-content" class="main-content">
    <div class="top-content">
        <h2 style="text-align:center;">Gerenciar Certificado</h2>
    </div>

    <?php
    
    $certificado = new Certificado();

    $row_certificado = $certificado->getCertificate($_GET['certificado']);
    
    ?>

    <div class="bottom-content">
        <!-- <div class="split-container"> -->
        <div class="documento">

            <h2>Certificado</h2>
            
            <div class="form-group">
                <label for="usuarioNome" class="bold-label">Nome do Aluno:</label>
                <p id="usuarioNome">
                <?php 
                    echo $row_certificado->nome;
                ?>    
                </p>
            </div>
            
            <div class="form-group">
                <label for="certificadoNome" class="bold-label">Documento:</label>
                <p id="certificadoNome">
                <?php 
                    echo $row_certificado->titulo;
                ?>
                </p>
            </div>
            
            <div class="form-group">
                <label for="certificadoHoras" class="bold-label">Quantas horas equivale:</label>
                <p id="certificadoHoras">
                <?php 
                    echo $row_certificado->horas . " horas";
                ?>    
                </p>
            </div>
            
            <!-- <div class="form-group">
                <label for="certificadoStatus" class="bold-label">Status Atual do Certificado:</label>
                <p id="certificadoStatus">Aprovado</p>
            </div> -->
            
            <div class="form-group">
                <label for="idTipodocumentoFK" class="bold-label">Tipo de Documento:</label>
                <p id="idTipodocumentoFK">
                <?php 
                    echo $row_certificado->tipo_documento;
                ?>  
                </p>
            </div>
            
            <div class="form-group">
                <label for="moduloNome" class="bold-label">Módulo:</label>
                <p id="moduloNome">
                <?php 
                    echo $row_certificado->nome_modulo;
                ?>  
                </p>
            </div>
            <div class="div-alter-certificate">
                <div class="div-button">
                    <form action="database/aprovar_certificate.php" method="POST">
                        <input type="hidden" name="certificado" value="<?php echo $_GET['certificado']; ?>">

                        <input type="submit" class="btn-approve" value="Aprovar">
                    </form>

                    <button type="submit" class="btn-reject" onclick="ShowDivObservacao()">Reprovar</button>
                </div>
            
                <div class="div-add-observacao">
                    <form action="database/reprovar_certificate.php" method="POST">
                        <input type="hidden" name="certificado" value="<?php echo $_GET['certificado']; ?>">
                        
                        <div class="class-obs">
                            <label for="obs" class="bold-label">
                                Observação:
                            </label>
                            
                            <textarea name="observacao" class="form-control" style="width: 300px; height: 200px;" placeholder="Digite o motivo da causa do reprovamento do documento."></textarea>
                        </div>

                        <div class="class-btn">
                            <input type="submit" class="btn-enviar" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="info-modulos">
            <h2>Módulos</h2>
            <div class="dados-modulos">
                <h3>Módulo I</h3>
                <div class="texto">
                    <label>Horas Computadas pelo Aluno:</label>
                    <p>40 Horas</p>
                </div>
                <div class="texto">
                    <label>Percentual do Módulo do Aluno:</label>
                    <p>12%</p>
                </div>
            </div>
            <div class="dados-modulos">
                <h3>Módulo II</h3>
                <div class="texto">
                    <label>Horas Computadas pelo Aluno: </label>
                    <p>10 Horas</p>
                </div>
                <div class="texto">
                    <label>Percentual do Módulo do Aluno:</label>
                    <p>40%</p>
                </div>
            </div>
            <div class="dados-modulos">
                <h3>Módulo III</h3>
                <div class="texto">
                    <label>Horas Computadas pelo Aluno:</label>
                    <p>20 Horas</p>
                </div>
                <div class="texto">
                    <label>Percentual do Módulo do Aluno:</label>
                    <p>30%</p>
                </div>
            </div>
            <div class="dados-modulos">
                <h3>Módulo IV</h3>
                <div class="texto">
                    <label>Horas Computadas pelo Aluno:</label>
                    <p>14 Horas</p>
                </div>
                <div class="texto">
                    <label>Percentual do Módulo do Aluno:</label>
                    <p>10%</p>
                </div>
            </div>
            <div class="dados-modulos">
                <h3>Total das Horas complementares</h3>
                <h4>Objetivo: 130 Horas</h4>
                <div class="texto">
                    <label>Horas Computadas pelo Aluno:</label>
                    <p>100 Horas</p>
                </div>
                <div class="texto">
                    <label>Percentual de Horas do Aluno:</label>
                    <p>90%</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php 
include 'includes/footer.php';

