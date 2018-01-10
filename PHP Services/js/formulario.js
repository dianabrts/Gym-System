(function(){
	var formulario = document.formulario_registro,
		elementos = formulario.elements;

	//Funciones

	var validarInputs = function(){
		for (var i = 0; i < elementos.length; i++){
			if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
				if (elementos[i].value == 0){
					console.log('El campo ' + elementos[i].name + ' esta incompleto');
					elementos[i].className = elementos[i].className + " error";
					return false;
				} else {
					elementos[i].className = elementos[i].className.replace("error", "");
				}
			}
		}

		if (elementos.pass.value !== elementos.pass2.value) {
			elementos.pass.value = "";
			elementos.pass2.value = "";
			elementos.pass.className = elementos.pass.className +  " error";
			elementos.pass2.className = elementos.pass2.className +  " error";
		} else {
			elementos.pass.className = elementos.pass.className.replace("error", "");
			elementos.pass2.className = elementos.pass2.className.replace("error", "");
		}

		return true;
	};

	

	var enviar =function(e){
		if (!validarInputs()) {
			console.log('Falto Validar los Inputs');
			e.preventDefault();
		} else{ 			 		
			console.log('Envia Correctamente');
			// e.preventDefault();
		}
		
	};

	// Funciones Blur y Focus
	var focusInput = function(){
		this.parentElement.children[1].className = "label active";
		this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
	};

	var blurInput = function(){
		if (this.value <= 0) {
			this.parentElement.children[1].className = "label";
			this.parentElement.children[0].className = this.parentElement.children[0].className + " error";
		}
	};

	
	// Eventos
	formulario.addEventListener("submit", enviar);

	for (var i = 0; i < elementos.length; i++){
		if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
			elementos[i].addEventListener("focus", focusInput);
			elementos[i].addEventListener("blur", blurInput);
		}
	}
}())