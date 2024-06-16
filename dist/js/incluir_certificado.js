document.getElementById('selectModulo').addEventListener('change', function() 
{
    var value = this.value;
    var containerTipoDocs = document.querySelectorAll('[id^=containerTipoDoc]');

    // Oculta todos os containers secundários
    containerTipoDocs.forEach(function(container) {
        container.classList.add('hidden');
    });

    // Mostra o container secundário apropriado
    if (value) {
        document.getElementById('containerTipoDoc' + value.slice(-1)).classList.remove('hidden');
    }
});