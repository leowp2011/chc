document.addEventListener('DOMContentLoaded', function() 
{
    window.submitForm = function() 
    {
        var form = document.getElementById('certificadoForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'search.php', true);

        xhr.onload = function() 
        {
            if (xhr.status >= 200 && xhr.status < 400) {
                var container = document.getElementById('certificadosContainer');
                console.log(xhr.responseText); // Adicione esta linha para verificar a resposta
                container.innerHTML = xhr.responseText;
            } else {
                console.error('Erro ao carregar os certificados.');
            }
        };
        xhr.onerror = function() {
            console.error('Erro de rede.');
        };
        xhr.send(formData);
    };
});