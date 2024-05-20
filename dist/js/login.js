	// var colors = [
	// 	'#c8eb02',
	// 	'#FF0000',
	// 	'#080101',
	// 	'#1d1c1c',
	// 	'#110d0d',
	// 	'#140000',
	// 	'#00000099',
	// 	'#808080'
	// ];	
	
	// function createSquare() {
	// 	const section = document.querySelector("section");
	// 	const square  = document.createElement("span");

	// 	var size = Math.random() * 50;

	// 	square.style.width  = 20 + size + 'px';
	// 	square.style.height = 20 + size + 'px';

	// 	square.style.top    = Math.random() * innerHeight + 'px';
	// 	square.style.left   = Math.random() * innerWidth + 'px';

	// 	square.style.background = colors[Math.floor(Math.random() * colors.length)];

	// 	section.appendChild(square);

	// 	setTimeout(() => { 
	// 		square.remove();
	// 	}, 4000);
	// }
	// setInterval(createSquare, 60);
	document.addEventListener("DOMContentLoaded", focusout_RA);
	document.addEventListener("DOMContentLoaded", focusout_senha);

	var RA          	= document.querySelector(".input-RA");
	var label_RA    	= document.querySelector('.label-RA');
	var senha          	= document.querySelector(".input-senha");
	var label_senha	   	= document.querySelector('.label-senha');
	var submit_eye     	= document.querySelector('.submit-eye i');
	var invalid_RA  	= document.getElementById("invalid-RA"); 
	var invalid_senha  	= document.getElementById("invalid-senha");

	function event_focus(nameBtn) {
		if (nameBtn === "ra") {
			label_RA.style.top      = "-20px";
			label_RA.style.color    = "#03a9f4";
			label_RA.style.fontSize = "15px";
		}
		else {
			label_senha.style.top      = "-20px";
			label_senha.style.color    = "#03a9f4";
			label_senha.style.fontSize = "15px";
		}
	}	
	/*MOVE O LABEL PARA CIMA DO INPUT QUANDO FOR SELECIONADO */
	RA.addEventListener('focusout', focusout_RA);
	function focusout_RA() {
		if (RA.value.length > 0){
			label_RA.style.top      = "-20px";
			label_RA.style.color    = "#03a9f4";
			label_RA.style.fontSize = "15px";
		}
		else {
			label_RA.style.top      = "0px";
			label_RA.style.color    = "#FFF";
			label_RA.style.fontSize = "16px";
		}	
	}
	senha.addEventListener('focusout', focusout_senha);
	function focusout_senha() {
		if (senha.value.length > 0){
			label_senha.style.top      = "-20px";
			label_senha.style.color    = "#03a9f4";
			label_senha.style.fontSize = "15px";
		}
		else {
			label_senha.style.top      = "0px";
			label_senha.style.color    = "#FFF";
			label_senha.style.fontSize = "16px";
		}	
	}		
/**-------------------------------------------------------- */


/**EXIBE E ESCONDE A SENHA */
	submit_eye.addEventListener('click', () => {
		(senha.type == "password") ? senha.type = "text" : senha.type = "password";	

		if (submit_eye.classList.contains("fa-eye")) {//se tem olho aberto 
		  submit_eye.classList.remove("fa-eye"); //remove classe olho aberto
		  submit_eye.classList.add("fa-eye-slash"); //coloca classe olho fechado
		} 
		else { 
		  submit_eye.classList.remove("fa-eye-slash"); 
          submit_eye.classList.add("fa-eye"); 
		}
	});
/**------------------------------ */

	function verificaInput(name) {
		if (name == "senha") { //senha
			var senha_dig = senha.value;

			if (senha_dig.length >= 6) { 
				invalid_senha.innerHTML   = "<small> Senha válida. </small>";
				invalid_senha.style.color = "#08b908";
			}
			else {
				invalid_senha.style.color = "#ff2c2c";
			}
		} 
		else //if (name == "RA") 
		{ //senha
			var RA_dig = RA.value;

			if (RA_dig.length == 6) { 
				invalid_RA.innerHTML   = "<small> RA válida. </small>";
				invalid_RA.style.color = "#08b908";
			}
			else {
				invalid_RA.style.color = "#ff2c2c";
			}
		}	
	}

	function return_form() {
		var container_form = document.getElementById("formlogin");

		var erro = false;

		if (RA.value.length <= 0 || senha.value.length <= 0) {
			erro = !erro;

			if (RA.value.length <= 0) {
				invalid_RA.style.color = "#ff2c2c";
			}	
			if (senha.value.length <= 0) {
				invalid_senha.style.color = "#ff2c2c";
			}

			container_form.classList.toggle("validate-error");
		}
		else { container_form.classList.remove("validate-error"); }
		
		if (erro) { return false; } else { return true; }
	}
