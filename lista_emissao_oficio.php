<link rel="stylesheet" href="dist/css/lista_emissao_oficio.css">

<?php
include 'includes/header.php';

require_once 'classes/class_usuario.php';
require_once 'classes/class_modulo.php';

$usuario = new Usuario();
$modulo  = new Modulo();


?>

<div id="main-content" class="main-content">
    <div class="top-content">
        <h2>Emição de Ofício - Lista dos alunos aprovados</h2>
    </div>

    <div class="bottom-content">
        <div class="table_component" role="region" tabindex="0">
            <table>
            <thead>
                <tr>
                    <th>Nome do Aluno<br></th>
                    
                    <?php

                        $list_modulo = $modulo->ListModulo_Curso($_SESSION['obj_user']->id_curso); 

                        $array_modulo = [];

                        foreach ($list_modulo as $modulo ) 
                        {
                            $array_modulo[] = $modulo->id_modulo;
                            
                            echo "<th>". $modulo->nome_modulo. "</th>";
                        }
                    
                    ?>
                    
                    <th>Horas Computadas<br></th>
                    <th>Horas Necessárias<br></th>
                    <th> Emitir Certificado <br></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $list_user = $usuario->ListNomeAlunosAprovados($_SESSION['obj_user']->id_curso);

                    $array_ids_modulos          = [];
                    $array_porcentagem_modulos  = [];
                    $aluno                      = [];

                    for ($i = 0; $i < count($list_user); $i++) 
                    { 
                        // Converte a string de IDs em um array
                        $array_ids_modulos[$i]          = explode(', ', $list_user[$i]->id_modulos);  
                        
                        $array_porcentagem_modulos[$i]  = explode(', ', $list_user[$i]->porcentagens);

                        $aluno[$i]['nome']              = $list_user[$i]->nome; 
                        $aluno[$i]['id_modulos']        = $array_ids_modulos[$i]; 
                        $aluno[$i]['porcent_modulos']   = $array_porcentagem_modulos[$i]; 
                    } 

                    // var_dump($aluno[0]['id_modulos']);

                    $cont = 0;
                    while ($cont < count($aluno)) 
                    {
                        echo "<tr>";
                            
                        echo "<td>". $aluno[$cont]['nome'] ."</td>";

                        $j = 0;
                        $i = 0;
                        while ($j < count($array_modulo)) 
                        { 
                            if ($i < count($aluno[$cont]['id_modulos']))
                            {
                                if ($array_modulo[$j] == $aluno[$cont]['id_modulos'][$i]) 
                                {
                                    echo "<td>". $aluno[$cont]['porcent_modulos'][$i] ."% </td>";
                                    
                                    $i++;
                                }
                                else 
                                    echo "<td>  </td>";    
                            }
                            else 
                                echo "<td>  </td>";    

                            $j++;
                        }

                        echo "<td></td>";
                        echo "<td>110</td>"; 
                        echo "<td><a href='#' download><i class='fas fa-file-pdf'></i></a></td>";

                        echo "</tr>";

                        $cont++;
                    }
                    // foreach ($list_user as $user) 
                    // {
                    //     echo "<tr>";
                            
                    //     echo "<td>". $user->nome ."</td>";

                    //     $j = 0;
                    //     for ($i = 0; $i < count($array_modulo); $i++) 
                    //     { 
                            
                    //         while ($j < count($array_ids_modulos[0]))
                    //         {
                    //             if ($array_modulo[$i] == $array_ids_modulos[$j][$i]) 
                    //             {
                    //                 echo "<td>". $array_ids_modulos[$j][$i] ."% </td>";
                    //             }
                    //             else {
                    //                 echo "<td>  </td>";    
                    //             }
                    //         }
                    //         $j++;
                    //     }
                    //     echo "<td></td>";
                    //     echo "<td>110</td>"; 
                    //     echo "<td><a href='#' download><i class='fas fa-file-pdf'></i></a></td>";

                    //     echo "</tr>";   
                    // } 

                    ?>

                
            </tbody>
            </table>
        

        <br>
        </div>
    </div>
</div>

    
<?php include 'includes/footer.php'; ?>