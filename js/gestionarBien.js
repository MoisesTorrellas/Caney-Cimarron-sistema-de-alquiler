let cerrar = document.querySelectorAll(".closes")[0];
let modal = document.querySelectorAll(".modal2")[0];
let modalc = document.querySelectorAll(".modal-contenedor")[0];
let titulo = document.querySelectorAll(".titulo")[0];
let botonNav = document.querySelectorAll(".boton-nav-hijo")[2];
document.getElementById("busqueda").addEventListener("keyup", consultar);
let botonMenu = document.querySelector('.bMenu');
let menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});

if ($(titulo).text() == "Gestionar Bienes.") {
	botonNav.classList.toggle("botonNavUsuario")
}


//Funcion para el boton de cerrar el modal de formularios
$(cerrar).on("click", function () {
	cerrarModal();
});

//funcion para cerrar el modal despues de modificar y eliminar
function cerrarModal() {
	modal.classList.toggle("modal-close")
	setTimeout(function () {
		modalc.style.opacity = "0"
		modalc.style.visibility = "hidden"
	}, 300)
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModal() {
	modalc.style.opacity = "1"
	modalc.style.visibility = "visible"
	modal.classList.toggle("modal-close")
}

//funcion para consultar los datos
function consultar() {
	var datos = new FormData();
	datos.append('accion', 'consultar');
	datos.append('busqueda', $("#busqueda").val());
	enviaAjax(datos);
}



$(document).ready(function () {


	//validaciones

	consultar();

	//VALIDACION DE CEDULA
	$("#codBien").on("keypress", function (e) {
		validarkeypress(/^[0-9-\b]*$/, e);
	});

	$("#codBien").on("keyup", function () {
		validarkeyup(/^[0-9]{1,3}$/, $(this),
			$("#scodBien"), "El formato debe ser 999 ");
	});

	//VALIDACION DEL NOMBRE
	$("#nomBien").on("keypress", function (e) {
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
	});

	$("#nomBien").on("keyup", function () {
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
			$(this), $("#snomBien"), "Solo letras  entre 3 y 30 caracteres");
	});
	//VALIDACION DEL USERNAME
	$("#cantBien").on("keypress", function (e) {
		validarkeypress(/^[0-9-\b]*$/, e);
	});

	$("#cantBien").on("keyup", function () {
		validarkeyup(/^[0-9]{1,3}$/, $(this),
			$("#scantBien"), "el formato debe ser 999");
	});

	//CONTROL DE BOTONES 
	$("#proceso").on("click", function () {

		//CONTROL DE BOTON REGISTRAR Trabajador
		if ($(this).text() == "Registrar Bien") {
			if (validarenvio()) {
				var datos = new FormData();
				datos.append('accion', 'incluir');
				datos.append('codBien', $("#codBien").val());
				datos.append('nomBien', $("#nomBien").val());
				datos.append('cantBien', $("#cantBien").val());
				enviaAjax(datos);
			}
		}
		//CONTROL DE BOTON MODIFICAR Trabajador
		else if ($(this).text() == "Modificar Bien") {
			if (validarenvio()) {
				var datos = new FormData();
				datos.append('accion', 'modificar');
				datos.append('codBien', $("#codBien").val());
				datos.append('nomBien', $("#nomBien").val());
				datos.append('cantBien', $("#cantBien").val());
				enviaAjax(datos);
			}
		}
		//CONTROL DE BOTON ELIMINAR Trabajador
		if ($(this).text() == "Eliminar Bien") {
			if (validarkeyup(/^[0-9]{1,3}$/, $("#codBien"),
				$("#scodBien"), "El formato debe ser nuemrico") == 0) {
				muestraMensaje("El numero de Bien debe coincidir con el formato <br/>" +
					"numeros");

			}
			else {
				var datos = new FormData();
				datos.append('accion', 'eliminar');
				datos.append('codBien', $("#codBien").val());
				enviaAjax(datos);
			}
		}
	});

	// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
	$("#incluir").on("click", function () {
		limpia();
		$("#proceso").text("Registrar Bien");
		$("#titleModal").text("");
		$("#titleModal").append("Registrar Bien<span>.</span>");
		abrirModal();
	});





});

//VALIDACIONES DEL ENVIO
function validarenvio() {

	if (validarkeyup(/^[0-9]{1,3}$/, $("#codBien"),
		$("#scodBien"), "El formato debe ser 999") == 0) {
		muestraMensaje("El numero de bien debe coincidir con el formato <br/>" +
			"999");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nomBien"), $("#snomBien"), "Solo letras  entre 3 y 30 caracteres") == 0) {
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if (validarkeyup(/^[0-9]{1,3}$/,
		$("#cantBien"), $("#scantBien"), "El formato debe ser 999") == 0) {
		muestraMensaje("El numero de bien debe coincidir con el formato <br/>" +
			"999");
		return false;
	}

	return true;
}

//FUNCION PARA MOSTRAR EL MODAL CON EL MENSAJE DE LA ACCION
function muestraMensaje(mensaje) {

	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function () {
		$("#mostrarmodal").modal("hide");
	}, 2000);

}

function validarkeypress(er, e) {

	key = e.keyCode;

	/* console.log(e.text); */
	tecla = String.fromCharCode(key);


	a = er.test(tecla);

	if (!a) {

		e.preventDefault();
	}


}

function validarkeyup(er, etiqueta, etiquetamensaje,
	mensaje) {
	a = er.test(etiqueta.val());
	if (a) {
		etiquetamensaje.text("");
		return 1;
	}
	else {
		etiquetamensaje.text(mensaje);
		return 0;
	}
}
// ACCION DE CLICK AL PULSAR LOS BOTONES ELIMINAR Y MODIFICAR
function pone(pos, accion) {

	linea = $(pos).closest('tr');

	if (accion == 0) {
		//$("#icon").classList('fi fi-br-user-add iconB');
		$("#proceso").text("Modificar Bien");
		$("#titleModal").text("");
		$("#titleModal").append("Modificar Bien<span>.</span>");
	}
	else {
		$("#proceso").text("Eliminar Bien");
		$("#titleModal").text("");
		$("#titleModal").append("Modificar Bien<span>.</span>");
	}
	$("#codBien").val($(linea).find("td:eq(0)").text());
	$("#nomBien").val($(linea).find("td:eq(1)").text());
	$("#cantBien").val($(linea).find("td:eq(2)").text());

	abrirModal()

}

//ENVIO POR AJAX

function enviaAjax(datos) {
	$.ajax({
		async: true,
		url: "",
		type: "POST",
		contentType: false,
		data: datos,
		processData: false,
		cache: false,
		beforeSend: function () { },
		timeout: 10000,
		success: function (respuesta) {
			try {
				var lee = JSON.parse(respuesta);

				if (lee.resultado == "consultar") {
					$("#resultadoconsulta").html(lee.mensaje);
				}
				/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "INCLUIR" 
				Y EL MENSAJE ES "TRABAJADOR REGISTRADO" CUNSULTA Y LIMPIA EL FORMULARIO*/
				else if (lee.resultado == "incluir") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Bienes Registrados') {
						consultar();
						limpia();
					}
				}
				/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "MODIFICAR" 
				Y EL MENSAJE ES "TRABAJADOR MODIFICADO" CUNSULTA Y CIERRA EL MODAL*/
				else if (lee.resultado == "modificar") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Bienes Modificados') {
						consultar();
						cerrarModal();
					}
				}
				/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "ELIMINAR" 
				Y EL MENSAJE ES "TRABAJADOR ELIMINADO" CUNSULTA Y CIERRA EL MODAL*/
				else if (lee.resultado == "eliminar") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Bienes Eliminados') {
						consultar();
						cerrarModal();
					}
				}
				else if (lee.resultado == "error") {
					muestraMensaje(lee.mensaje);
				}
			} catch (e) {
				alert("Error en JSON " + e.name);
			}
		},
		error: function (request, status, err) {

			if (status == "timeout") {
				muestraMensaje("Servidor ocupado, intente de nuevo");
			} else {
				muestraMensaje("ERROR: <br/>" + request + status + err);
			}
		},
		complete: function () { },
	});
}

//FUNCION PARA LIMPIAR EL MODAL
function limpia() {
	$("#codBien").val("");
	$("#nomBien").val("");
	$("#cantBien").val("");

}