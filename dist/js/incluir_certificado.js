
/**MOSTRA O SEGUNDO SELECT COM A LISTA DOS TIPOS DE DOCS */
document.getElementById('selectModulo').addEventListener('change', function() 
{
    var value = this.value;
    var containerTipoDocs = document.querySelectorAll('[id^=containerTipoDoc]');

    // Oculta todos os containers secundários
    containerTipoDocs.forEach(function(container) 
    {
        container.classList.add('hidden');
    });
    
    containerTipoDocs.forEach(function(container) 
    {
        let select = container.querySelector('select')
        select.disabled = true
    })

    // Mostra o container secundário apropriado
    if (value) 
    {
        var containerTipoDoc = 'containerTipoDoc' + value.slice(-1);
        var selectTipoDoc = 'selecTipoDoc' + value.slice(-1);

        document.getElementById(containerTipoDoc).classList.remove('hidden');
        document.getElementById(selectTipoDoc).removeAttribute('disabled');
    }
});



/** */
document.getElementById('myfile').addEventListener('change', function(e) 
{
const file = e.target.files[0];

    if (file && file.type === 'application/pdf') 
    {
    const fileReader = new FileReader();
    fileReader.onload = function() {
        const typedarray = new Uint8Array(this.result);

        pdfjsLib.getDocument(typedarray).promise.then(function(pdf) 
        {
            // Get the first page
            pdf.getPage(1).then(function(page) {
                const viewport = page.getViewport({ scale: 1 });
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');

                // Calculate the scale to fit the width of the container
                const scale = document.getElementById('pdf-preview').clientWidth / viewport.width;

                // Set the maximum height
                const maxHeight = 425;
                const scaledHeight = Math.min(viewport.height * scale, maxHeight);
                const scaledViewport = page.getViewport({ scale: scaledHeight / viewport.height });

                canvas.height = scaledViewport.height;
                canvas.width = scaledViewport.width;

                // Render the page into the canvas context
                page.render({ canvasContext: context, viewport: scaledViewport }).promise.then(function() 
                {
                    // Clear the previous preview
                    const previewContainer = document.getElementById('pdf-preview');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(canvas);
                });
            });
        });
    };
    fileReader.readAsArrayBuffer(file);
} else {
    alert('Please select a valid PDF file.');
}
});