<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="dist/css/index1.css">
    
    <title>Página Inicial</title>
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
                <h2>Horas Complementares</h2>
                <div class="filter-container">
                    <div class="custom-select" style="width:200px;">
                        <ul><p>Selecione o filtro:</p></ul> 
                        <select>
                            <option value="0">Opções:</option>
                            <option value="1">Nome do Aluno</option>
                            <option value="2">Módulo 1</option>
                            <option value="3">Módulo 2</option>
                            <option value="4">Módulo 3</option>
                            <option value="5">Módulo 4</option>
                        </select>
                    </div>
                    <form class="example" action="action_page.php">
                        <p>Digite sua pesquisa:</p>   
                        <input type="text" placeholder="Pesquisar" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    
                </div>
            </div>
            <hr>
            <div class="bottom-content">
            <div class="cardlist">    
                <div class="card">
                    <h5 class="card-name">Gabriel Kras</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo I</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-name">Iury Buss</h5>
                    <div class="card-body">
                      <h5 class="card-title">Título do Certificado</h5>
                      <p class="card-module">Módulo II</p>
                      <a href="#" class="btn btn-primary">Gerenciar Certificado</a>
                    </div>
                  </div>
            </div>
            </div>
        </div>
        
    </div>
    <script src="dist/js/index1.js"></script>
</body>
</html>
