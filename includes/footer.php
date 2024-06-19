</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="dist/js/index.js"></script> 
<script src="dist/js/search.js"></script>
<script src="dist/js/analisar_certificado.js"></script>
<script src="dist/js/incluir_certificado.js"></script>

<script>
// Função para lidar com o clique do link
$(".btn-user").click(function(e) {
  e.preventDefault(); // Evita que o navegador siga o link normalmente
  
  // Enviar uma requisição Ajax para o arquivo PHP que contém a função da classe SessionHandler para destruir a sessão
  $.ajax({
      url: "Database/destroy_session.php",
      type: "POST",
      data: { action: "destroySession" }, // Passa o nome da ação desejada
      success: function(response) {
          // Lidar com a resposta do servidor
          // alert(response); // Exibir resposta em um alerta (opcional)
          // Redirecionar o usuário após a destruição da sessão, se desejar
          window.location.href = "login.php";
      }
  });
});
</script>

</body>
</html>