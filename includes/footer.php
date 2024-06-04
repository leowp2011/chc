</section>

    <a href="#" id="destroySession">SAIR</a>

<script src="dist/js/index.js"></script>
<script>
    // Função para lidar com o clique do link
    $("#destroySession").click(function(e) {
        e.preventDefault(); // Evita que o navegador siga o link normalmente
        
        // Enviar uma requisição Ajax para o arquivo PHP que contém a função da classe SessionHandler para destruir a sessão
        $.ajax({
            url: "Database/destroy_session.php",
            type: "POST",
            data: { action: "destroySession" }, // Passa o nome da ação desejada
            success: function(response) {
                // Lidar com a resposta do servidor
                alert(response); // Exibir resposta em um alerta (opcional)
                // Redirecionar o usuário após a destruição da sessão, se desejar
                window.location.href = "login.php";
            }
        });
    });
</script>
</body>
</html>