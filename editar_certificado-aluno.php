<link rel="stylesheet" href="dist/css/analisar certificado.css">
<link rel="stylesheet" href="dist/css/incluir_certificado.css">

<?php
include 'includes/header.php';

require_once 'classes/class_certificado.php';
require_once 'classes/class_modulo.php';
require_once 'classes/class_tipoDocumento.php';

$certificado = new Certificado();
$modulo = new Modulo();
$tipoDocumento = new Tipo_Documento();

$row_certificado = $certificado->getCertificate($_GET['certificado']);

$listmodulo = $modulo->ListModulo_Curso();

$listTipoDoc = $tipoDocumento->ListTipoDocumento_Modulo();

/**----------------------------------------------------------------------- */

$selecModulo = [];
$selecTipoDoc_modulo = [];

foreach ($listmodulo as $modulo)
    $selecModulo[$modulo->id_modulo] = $modulo->nome_modulo;

foreach ($listTipoDoc as $tipoDoc)
{ 
    $mainOptionKey  = $tipoDoc->id_moduloFK;
    $subOptionKey   = $tipoDoc->id_tipodocumento;

    $selecTipoDoc_modulo[$mainOptionKey][$subOptionKey] = $tipoDoc->tipo_documento;
}
?>



<div id="main-content" class="main-content">
    <div class="bottom-content">
        <!-- <div class="split-container"> -->
        <div class="documento">
            <form action="database/valida_update.php" method="POST">
                <h2>Editação de certificado</h2>
                <br>

                <div class="form-group">
                    <label for="myfile">Arquivo do certificado:</label>

                    <input type="file" id="myfile" name="file" accept=".pdf" >        
                </div>
                
                <div class="form-group">
                    <label for="certificadoNome" class="bold-label">Título:</label>
                    
                    <input type="text" id="certificadoNome" name="titulo" value="<?php echo $row_certificado->titulo; ?>" required>
                </div>
                
                <div class="option-modulo">
                    <label for="moduloNome" class="bold-label">Módulo:</label>

                    <select id="selectModulo" name="modulo" required>

                        <?php foreach ($selecModulo as $id_modulo => $label): 
                            if ($row_certificado->id_moduloFK == $id_modulo) {
                        ?>
                            <option value="<?php echo htmlspecialchars($id_modulo); ?>" selected>
                                <?php echo htmlspecialchars($label); ?>
                            </option>
                        <?php 
                            }
                            else {
                        ?>
                            <option value="<?php echo htmlspecialchars($id_modulo); ?>">
                                <?php echo htmlspecialchars($label); ?>
                            </option>
                        <?php
                            }
                        endforeach; 
                        ?>
                        
                    </select>
                </div>

                <div class="tipo-documento">
                                
                    <?php foreach ($selecTipoDoc_modulo as $id_modulo => $optionsTipoDoc): 
                        if ($row_certificado->id_moduloFK == $id_modulo)    
                        {    
                    ?>
                            <div class="form-group" id="containerTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>">

                                <label for="tipoDocumento<?php echo htmlspecialchars(substr($id_modulo, -1)); ?> " class="bold-label">
                                    Tipo de Documento:
                                </label>

                                <select id="selectTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>" name="tipoDocumento">
                                    <?php 
                                    foreach ($optionsTipoDoc as $valueTipo => $label): 
                                        if ($row_certificado->id_tipodocumento == $valueTipo) 
                                        {   
                                    ?>
                                        <option value="<?php echo $valueTipo; ?>" selected>
                                            <?php echo $label; ?>   
                                        </option>
                                    
                                    <?php 
                                        } 
                                        else {
                                    ?>
                                            <option value="<?php echo $valueTipo; ?>">
                                                <?php echo $label; ?>   
                                            </option>
                                            
                                    <?php
                                        }
                                    endforeach; 
                                    ?>

                                </select>
                            </div>

                        <?php
                        }
                        else {
                        ?>     
                            <div class="form-group hidden" id="containerTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>">
                                
                                <label for="tipoDocumento<?php echo htmlspecialchars(substr($id_modulo, -1)); ?> ">
                                    Tipo de Documento:
                                </label>

                                <select id="selectTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>" name="tipoDocumento" disabled>
                                    <option value="">Selecione o Tipo
                                    de Documento</option> 
                                    
                                    <?php foreach ($optionsTipoDoc as $valueTipo => $label): ?>
                                        <option value="<?php echo $valueTipo; ?>">
                                            <?php echo $label; ?>   
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div> 
                    <?php 
                        }
                    endforeach; 
                    ?> 
                    
                </div>
                
                <div class="form-group">
                    <label for="certificadoHoras" class="bold-label">
                        Horas equivale:
                    </label>

                    <input type="number" id="certificadoHoras" name="horas" value="<?php echo $row_certificado->horas; ?>" required>
                </div>

                <div class="div-alter-certificate">
                    <div class="div-button">
                        <input type="hidden" name="id_certificado" value="<?php echo $_GET['certificado']; ?>">

                        <input type="submit" class="btn-approve" value="Salvar">
                    </div>
                </div>
            
            </form>
        </div>

        <?php if ($row_certificado->status == 'reprovado'): ?>
            <div class="form-observacao">
                <h4>Observação do professor:</h4>
                
                <div class="observao">
                    <p>
                        <?php echo $row_certificado->observacao; ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
    
<!-- <script src="dist/js/incluir_certificado.js"></script> -->

<script src="dist/js/editar_certificado.js"></script>

<?php 
include 'includes/footer.php';?>


