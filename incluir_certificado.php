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

<div class="container-add-certificate">
    <div>
        <h2>Tela de incluir certificado</h2>
    </div>    
    <div>
        <form action="database/inserir_certificado.php" method="POST" id="certificadoForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Arquivo do Certificado:</label>

                <input type="file" id="file" name="file" required>
            </div>
            
            <div class="form-group">
                <label for="fileName">Nome do Arquivo:</label>

                <input type="text" id="fileName" name="fileName" required>
            </div>

            <div class="form-group">
                <label for="modulo">Módulo:</label>

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

            <?php foreach ($selecTipoDoc_modulo as $id_modulo => $optionsTipoDoc): ?>
                <div class="form-group hidden" id="containerTipoDoc<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>">

                    <label for="tipoDocumento<?php echo htmlspecialchars(substr($id_modulo, -1)); ?>">Tipo de Documento:</label>

                    <select id="selecTipoDoc<?php echo substr($id_modulo, -1); ?>" name="tipoDocumento" required>
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
            
            <div class="form-group">
                <label for="horas">Horas:</label>

                <input type="number" id="horas" name="horas" required min="1" max="2">
            </div>
            
                <input type="submit" class="btn-inserir" value="Inserir Certificado">
        </form>
    </div>
</div>

<?php 
include 'includes/footer.php';