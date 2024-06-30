
const StartModulo = document.getElementById('selectModulo').value

document.getElementById('selectModulo').addEventListener('change', function() 
{
    var SelectModulo = this.value;
    const containerTipoDocs = document.querySelectorAll('[id^=containerTipoDoc]');

    // Oculta todos os containers secundários
    containerTipoDocs.forEach(function(container) 
    {   
        if (container.id == ('containerTipoDoc' + StartModulo)) 
        {
            let select = container.querySelector('select')
                
            if (select)
            {  
                let optionToSelect = select.querySelector('option[value="'+ select.value +'"]');
                
                if (optionToSelect) 
                {
                    optionToSelect.removeAttribute('selected')
                }
            }
        }

        container.classList.add('hidden');
    })

    containerTipoDocs.forEach(function(container) 
    {
        let select = container.querySelector('select')
        select.disabled = true
    })

    // Mostra o container secundário apropriado
    if (SelectModulo) 
    {
        var containerTipoDoc    = 'containerTipoDoc' + SelectModulo.slice(-1);
        var selectTipoDoc       = 'selectTipoDoc' + SelectModulo.slice(-1);
        
        document.getElementById(containerTipoDoc).classList.remove('hidden')
        document.getElementById(selectTipoDoc).removeAttribute('disabled')

    }
});


