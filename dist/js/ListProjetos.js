
function VerifyCampo(campo) {
    
    const formResumo = document.querySelector('.form-resumo');
    
    if (campo.length <= 0) {
        formResumo.style.display = 'none';
    }
}