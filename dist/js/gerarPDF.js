function GerarPDF(ID_modalidade) {
        // Defina o conteúdo do documento PDF
        var conteudo = 'Olá, mundo!' + ID_modalidade;

        // Crie o objeto do documento PDF
        var documento = {
        content: [
            { text: conteudo }
        ]
        };

        // Gere o PDF
        pdfMake.createPdf(documento).open();
    }