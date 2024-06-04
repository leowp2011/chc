<?php
require_once 'class_conexao.php';

  $pesquisar = $_POST['search'];

  $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$pesquisar%'";
  $dados = mysqli_query($conectado, $sql);

  if (mysqli_num_rows($dados) <= 0) {
    echo "<h4><b> Nenhum registro encontrado! </b></h4>";
  } else { 
      while ($registro = mysqli_fetch_assoc($dados)) {
  ?>
        <div class="card">
          <div class="nome-produto" style="background-color: #A4A4A4;">
            <?php echo $registro['nome_produto'];?>
          </div>
            <div class="card-body">
            <?php 
              echo '<img class="imgproduto" src="imagensLoja/' . $registro['imagemProduto'].'" />';
              echo '<p class="preco"> Preço: R$ '.number_format($registro['preco_barril'], 2, ',', '.').'</p>';
            ?>
             <?php echo '<a href="carrinho.php?acao=add&idproduto='.$registro['idproduto'].'" class="btn btn-outline-primary btn-add"> Adicionar ao carrinho </a>'; ?> 
          </div>
        </div>
  <?php  
      }  
    }
  ?>      
    </div>
  </div>
</div>

</body>
</html>