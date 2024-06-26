<?php
require_once 'classes/class_certificado.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="dist/css/analisar certificado.css">
    
    <title>Gerenciar Certificado</title>
</head>
<body>
    <div class="top-bar">
        <img src="https://home.unicruz.edu.br/wp-content/uploads/2022/04/logo-horizontal-PNG.png" alt="Logo" class="top-logo">
        <div class="top-bar-buttons">
            <button class="top-button"><i class="fas fa-dollar-sign fa-lg"></i><br>Financeiro</button>
            <button class="top-button"><i class="fas fa-user-graduate fa-lg"></i><br>Matrícula Online</button>
            <button class="top-button"><i class="fas fa-user fa-lg"></i><br>Central do Aluno</button>
        </div>
    </div>

    <div class="container">
        <div id="sidebar" class="sidebar">
            <button id="toggle-sidebar"><i class="fas fa-bars"></i></button>
            <ul class="side-data">
                <li><button><i class="fas fa-bullhorn"></i> Mural</button></li>
                <li><button><i class="fas fa-clipboard-list"></i> Grade Curricular</button></li>
                <li><button><i class="fas fa-clock"></i> Quadro de Horários</button></li>
                <li><button><i class="fas fa-user-graduate"></i> Matrícula Online</button></li>
                <li>
                    <button id="central-aluno-btn"><i class="fas fa-user"></i> Central do Aluno <i class="fas fa-chevron-right arrow-icon"></i></button>
                    <ul id="central-aluno-submenu" class="submenu hidden">
                        <li><button>Faltas</button></li>
                        <li><button>Notas</button></li>
                        <li><button>Horas Complementares</button></li>
                    </ul>
                </li>
                <li><button><i class="fas fa-user-secret"></i> Secretaria</button></li>
                <li><button><i class="fas fa-folder-open"></i> Arquivos</button></li>
                <li><button><i class="fas fa-file-invoice-dollar"></i> Financeiro</button></li>
                <li><button><i class="fas fa-chart-line"></i> Avaliação Institucional</button></li>
                <li><button><i class="fas fa-external-link-alt"></i> Sites Externos</button></li>
                <li><button><i class="fas fa-file-alt"></i> Relatórios</button></li>
            </ul>
        </div>
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
                                    
                                    <textarea name="observacao" class="form-control" style="width: 300px; height: 200px;" placeholder="Digite o motivo da causa do reprovamento do documento." required></textarea>
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
    </div>

    
<script src="dist/js/analisar certificado.js"></script>
</body>
</html>
