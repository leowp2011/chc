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
// document.addEventListener("DOMContentLoaded", focusout_cpf);
// document.addEventListener("DOMContentLoaded", focusout_senha);

const cpf 			= document.querySelector('.input-cpf');
var label_cpf    	= document.querySelector('.label-cpf');
const senha        	= document.querySelector(".input-senha");
var label_senha	   	= document.querySelector('.label-senha');
var input_senha    	= document.querySelector('[name="senha"]');
var submit_eye    	= document.querySelector('.submit-eye i');
var invalid_login  	= document.getElementById("invalid-login"); 
var invalid_senha  	= document.getElementById("invalid-senha");

// function event_focus(nameInput) {
// 	if (nameInput === "cpf") {
// 		label_cpf.style.top      = "-20px";
// 		label_cpf.style.color    = "#03a9f4";
// 		label_cpf.style.fontSize = "15px";
// 	}
// 	else {
// 		label_senha.style.top      = "-20px";
// 		label_senha.style.color    = "#03a9f4";
// 		label_senha.style.fontSize = "15px";
// 	}
// }	

// cpf.addEventListener('focusout', focusout_cpf);
// function focusout_cpf() {
// 	if (cpf.value.length > 0){
// 		label_cpf.style.top      = "-20px";
// 		label_cpf.style.color    = "#03a9f4";
// 		label_cpf.style.fontSize = "15px";
// 	}
// 	else {
// 		label_cpf.style.color    = "#FFF";
// 		label_cpf.style.top      = "0px";
// 		label_cpf.style.fontSize = "16px";
// 	}	
// }
// senha.addEventListener('focusout', focusout_senha);
// function focusout_senha() {
// 	if (senha.value.length > 0){
// 		label_senha.style.top      = "-20px";
// 		label_senha.style.color    = "#03a9f4";
// 		label_senha.style.fontSize = "15px";
// 	}
// 	else {
// 		label_senha.style.top      = "0px";
// 		label_senha.style.color    = "#FFF";
// 		label_senha.style.fontSize = "16px";
// 	}	
// }		

// submit_eye.addEventListener('click', () => {
// 	(input_senha.type == "password") ? input_senha.type = "text" : input_senha.type = "password";	

// 	if (submit_eye.classList.contains("bi-eye-fill")) {//se tem olho aberto 
// 		submit_eye.classList.remove("bi-eye-fill"); //remove classe olho aberto
// 		submit_eye.classList.add("bi-eye-slash-fill"); //coloca classe olho fechado
// 	} 
// 	else { 
// 		submit_eye.classList.remove("bi-eye-slash-fill"); 
// 		submit_eye.classList.add("bi-eye-fill"); 
// 	}
// });

function verificaInput(Name) {
	
	// invalid_login.style.color = "#08b908";
	// invalid_login.innerHTML   = "<small> E-mail válido. </small>";
	// 	}
	// 	else {
	// 		invalid_login.style.color = "#ff2c2c";
	// 	}
	// }
	// else { //senha
	// 	var senha_dig = senha.value;

	// 	if (senha_dig.length >= 6) { 
	// 		invalid_senha.innerHTML   = "<small> Senha válida. </small>";
	// 		invalid_senha.style.color = "#08b908";
	// 	}
	// 	else {
	// 		invalid_senha.style.color = "#ff2c2c";
	// 	}
	// }	
}

function return_form() {
	// var container_form = document.getElementById("formlogin");

	// var erro = false;

	// if (email.value.length <= 0 || senha.value.length <= 0) {
	// 	erro = !erro;

	// 	if (email.value.length <= 0) {
	// 		invalid_login.style.color = "#ff2c2c";
	// 	}	
	// 	if (senha.value.length <= 0) {
	// 		invalid_senha.style.color = "#ff2c2c";
	// 	}

	// 	container_form.classList.toggle("validate-error");
	// }
	// else { container_form.classList.remove("validate-error"); }
	
	// if (erro) { return false; } else { return true; }
}

/*PADRONIZA O CPF */
cpf.addEventListener('keypress', () => {
    let inputlength_CPF = cpf.value.length

    if ((inputlength_CPF === 3) || (inputlength_CPF === 7)) {
        cpf.value += '.'
    }
    else if (inputlength_CPF === 11) { 
        cpf.value += '-'
    }
    
})

	
