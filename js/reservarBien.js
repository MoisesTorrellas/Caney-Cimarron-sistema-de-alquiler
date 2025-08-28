var cerrar = document.querySelectorAll(".closes")[0];
var modal = document.querySelectorAll(".modal2")[0];
var modalc = document.querySelectorAll(".modal-contenedor")[0];
var modalCliente = document.querySelectorAll(".modalCliente")[0];
var modalcCliente = document.querySelectorAll(".modal-contenedorCliente")[0];
var modalBien = document.querySelectorAll(".modalBien")[0];
var modalcBien = document.querySelectorAll(".modal-contenedorBien")[0];
var titulo = document.querySelectorAll(".titulo")[0];
var botonHijo = document.querySelectorAll(".boton-nav-hijo")[5];
document.getElementById("busqueda").addEventListener("keyup", consultar);
document.getElementById("busquedaCliente").addEventListener("keyup", consultaCliente);
var botonMenu = document.querySelector('.bMenu');
var menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});

if ($(titulo).text() == "Reservar Bienes.") { 
	botonHijo.classList.toggle("botonNavUsuario")
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

function abrirModal() {
	modalc.style.opacity = "1"
	modalc.style.visibility = "visible"
	modal.classList.toggle("modal-close")
}

function cerrarModalCliente() {
	modalCliente.classList.toggle("modal-close")
	setTimeout(function () {
		modalcCliente.style.opacity = "0"
		modalcCliente.style.visibility = "hidden"
	}, 300)
}

function abrirModalCliente() {
	modalcCliente.style.opacity = "1"
	modalcCliente.style.visibility = "visible"
	modalCliente.classList.toggle("modal-close")
}

function cerrarModalBien() {
	modalBien.classList.toggle("modal-close")
	setTimeout(function () {
		modalcBien.style.opacity = "0"
		modalcBien.style.visibility = "hidden"
	}, 300)
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModalBien() {
	modalcBien.style.opacity = "1"
	modalcBien.style.visibility = "visible"
	modalBien.classList.toggle("modal-close")
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModal() {
	modalc.style.opacity = "1"
	modalc.style.visibility = "visible"
	modal.classList.toggle("modal-close")
}



function consultar() {
	var datos = new FormData();
	datos.append('accion', 'consultar');
	datos.append('busqueda', $("#busqueda").val());
	enviaAjax(datos);
}

function consultaCliente() {
	var datos = new FormData();
	datos.append('accion', 'consultaCliente');
	datos.append('busquedaCliente', $("#busquedaCliente").val());
	enviaAjax(datos);
}

function consultaBien() {
	var datos = new FormData();
	datos.append('accion', 'consultaBien');
	datos.append('busqueda', $("#busqueda").val());
	enviaAjax(datos);
} 

$(document).ready(function () {

    consultaCliente();
	consultaBien();

	$("#fechaAlquiler").on("keyup",function(){
		validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$(this),$("#sfechaAlquiler"),"Ingrese una fecha valida");
	});


	$("#proceso").on("click", function () {

		if ($(this).text() == "Registrar Reservacion") {
			if (validarenvio()) {
				var datos = new FormData();
				datos.append('accion', 'incluir');
				datos.append('numReservacion', $("#numReservacion").val());
				datos.append('fechaReservacion', $("#fechaReservacion").val());
				datos.append('cantPersonaReservacion', $("#cantPersonaReservacion").val());
				datos.append('horaReservacion', $("#horaReservacion").val());
                datos.append('cedulaCliente', $("#cedulaCliente").val());
				enviaAjax(datos);
			}
				
			
		}
		
	});
	// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
	$("#incluir").on("click", function () {
		limpia();
		$("#proceso").text("Registrar Reservacion");
		$("#titleModal").text("");
		$("#titleModal").append("Registrar Reservacion<span>.</span>");
		abrirModal();
	});

    $("#closesCliente").on("click", function () {
		cerrarModalCliente();
	});

	$("#closesBien").on("click", function () {
		cerrarModalBien();
	});

    $("#modalCliente").on("click", function () {
		$("#titleModalCliente").text("");
		$("#titleModalCliente").append("Asignar Cliente<span>.</span>");
		abrirModalCliente();
	});
	$("#modalBien").on("click", function () {
		$("#titleModalBien").text("");
		$("#titleModalBien").append("Asignar Bien<span>.</span>");
		abrirModalBien();
	});

});

$("#cedulaCliente").on("keyup",function(){
	var cedula = $(this).val();
	var encontro = false;
	$("#consultaCliente tr").each(function(){
		if(cedula == $(this).find("td:eq(0)").text()){
			colocaCliente($(this));
			encontro = true;
		} 
	});
});	

function existecliente(){
	var cedula = $("#cedulaCliente").val();
	var existe = false;
	$("#consultaCliente tr").each(function(){
		
		if(cedula == $(this).find("td:eq(0)").text()){
			existe = true;
		}
	});
	
	return existe;
	
}	

function colocaCliente(linea){
	$("#nombreCliente").val($(linea).find("td:eq(1)").text());
	$("#cedulaCliente").val($(linea).find("td:eq(0)").text());

	cerrarModalCliente();
}




function validarenvio() {
	if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechaReservacion"),$("#sfechaReservacion"),"Ingrese una fecha valida")==0){
		muestraMensaje("Ingrese una fecha valida");
		return false;
	}
	return true;
}


function muestraMensaje(mensaje) {

	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function () {
		$("#mostrarmodal").modal("hide");
	}, 90000);

}

function validarkeypress(er, e) {

	key = e.keyCode;


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

                if (lee.resultado == "consultaCliente") {
					$("#consultaCliente").html(lee.mensaje);
				}
				if (lee.resultado == "consultaBien") {
					$("#consultaBien").html(lee.mensaje);
				} 

				
				else if (lee.resultado == "incluir") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Reservacion Registrada') {
						limpia();
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
	$("#numReservacion").val("");
	$("#cantPersonaReservacion").val("");
	$("#fechaReservacion").val("");
	$("#horaReservacion").val("");
    $("#cedulaCliente").val("");
    $("#nombreCliente").val("");
}