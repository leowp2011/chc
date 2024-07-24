<?php
require_once 'classes/class_session.php';
require_once 'classes/class_certificado.php';

Session::Start();

$certificado  = new Certificado();


if ($_SESSION['obj_user']->tipo == 'professor') 
{
  if (!empty($_POST['selectTable']) && !empty($_POST['selectValue'])) 
            {
                $table      = $_POST['selectTable'];
                $conteudo   = $_POST['selectValue'];

                if ($_POST['selectTable'] == 'modulo')
                {   
                    // Chame a função para buscar os certificados com os parâmetros
                    $listaCertificados = $certificado->ListarAllCertificado('M', 'nome_modulo', $conteudo);
                    
                }
                else 
                {
                    // Chame a função para buscar os certificados com os parâmetros
                    $listaCertificados = $certificado->ListarAllCertificado('CER', 'status', $conteudo);
                }
            } 
            /**LISTA TODOS OS CERTIFICADOS */
            elseif (isset($_POST['selectTable']) && !empty($_POST['selectTable']))
            {
                if ($_POST['selectTable'] == 'todos')
                {
                    $listaCertificados = $certificado->ListarAllCertificate();
                }
                else 
                {
                    if (isset($_POST['search']) && !empty($_POST['search'])) 
                    {
                        $listaCertificados = $certificado->ListarAllCertificado('USER', 'nome', $_POST['search']);
                    } 
                    else 
                    {
                        echo 
                        "<script> 
                            alert('Favor, digite o nome do aluno que deseja buscar!');
                        </script>";
                    }
                }

            }

            //CASO NÃO TIVER SELECT ATIVO, BUSCA TODOS OS PENDENTES
            else 
            {
                $listaCertificados  = $certificado->ListarAllCertificado('CER', 'status','pendente');
            }

            
            /**EXIBE OS CERTIFICADOS BUSCADOS NO BANCO */
            if (!empty($listaCertificados)):
                echo $certificado->gerarHtmlCertificados($listaCertificados, $_SESSION['obj_user']->tipo);
            else: 
                echo "<p>Nenhum resultado encontrado.</p>";
            endif;
}