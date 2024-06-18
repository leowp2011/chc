<?php
include 'includes/header.php';

require_once 'classes/class_modulo.php';
require_once 'classes/class_tipoDocumento.php';

$modulo = new Modulo();
$tipoDocumento = new Tipo_Documento();

$listmodulo = $modulo->ListModulo_Curso();
$listTipoDoc = $tipoDocumento->ListTipoDocumento_Modulo();

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
    <div class="bottom-content" id="certificadosContainer" style="padding-top: 0;">
    <div class="split-container">
        <div class="documento">
            <h2>Incluir Certificado</h2>
            <div class="pdf-managing-container">
                <div class="pdf-managing">
                    <div class="entrada-dados">
                        <form action="database/valida_certificado.php" method="POST" id="certificadoForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="myfile">Selecione o Certificado em PDF:</label>

                                <input type="file" id="myfile" name="file" accept=".pdf" required>        
                            </div>
                    
                            <div class="form-group">
                                <label for="fileName">Título do certificado:</label>

                                <input type="text" id="titulo" name="titulo" required>
                            </div>
                            
                            <div class="option-modulo">
                                <label for="modulo">Módulo:</label>

                                <!-- modulos -->
                                <select id="selectModulo" name="modulo" required>
                                    <option value="">Escolha o módulo</option>
                                <!-- LISTA TODOS OS MÓDULO DO CURSO -->
                                    <?php foreach ($selecModulo as $id_modulo => $label): ?>
                                        <option value="<?php echo htmlspecialchars($id_modulo); ?>">
                                            <?php echo htmlspecialchars($label); ?>
                                        </option>
                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                            
                            <div class="tipo-documento">
                            
                                <?php foreach ($selecTipoDoc_modulo as $id_modulo => $optionsTipoDoc): ?>
                                    <div class="form-group hidden" id="containerTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>">
                                    <!-- tipodoc -->
                                        <label for="tipoDocumento<?php echo htmlspecialchars(substr($id_modulo, -1)); ?> ">Tipo de Documento:</label>

                                        <select id="selecTipoDoc<?php echo substr($id_modulo, -1); ?>" name="tipoDocumento">
                                            <option value="">Selecione o Tipo
                                            de Documento</option>
                                            
                                            <?php foreach ($optionsTipoDoc as $valueTipo => $label): ?>
                                                <option value="<?php echo $valueTipo; ?>">
                                                    <?php echo $label; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <div class="form-group">
                                <label for="horascertificado">
                                    <b>Horas equivalentes ao certificado:</b>
                                </label>
                                
                                <input type="number" id="horascertificado" name="horas" required min="1">
                            </div>

                            <div class="enviar-buttons">
                                <input type="submit" class="btn-inserir registerbtn" value="Adicionar Certificado">
                            </div>

                        </form>
                    </div>
                </div>
                <div id="pdf-preview">
                    <p>Nenhum PDF selecionado</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php 
include 'includes/footer.php';