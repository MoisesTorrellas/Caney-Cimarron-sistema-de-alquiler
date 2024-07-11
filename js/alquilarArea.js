var cerrar = document.querySelectorAll(".closes")[0];
var modal = document.querySelectorAll(".modal2")[0];
var modalc = document.querySelectorAll(".modal-contenedor")[0];
var modalCliente = document.querySelectorAll(".modalCliente")[0];
var modalcCliente = document.querySelectorAll(".modal-contenedorCliente")[0];
var modalArea = document.querySelectorAll(".modalArea")[0];
var modalcArea = document.querySelectorAll(".modal-contenedorArea")[0];
var modalBien = document.querySelectorAll(".modalBien")[0];
var modalcBien = document.querySelectorAll(".modal-contenedorBien")[0];
var modalTrabajador = document.querySelectorAll(".modalTrabajador")[0];
var modalcTrabajador = document.querySelectorAll(".modal-contenedorTrabajador")[0];
var titulo = document.querySelectorAll(".titulo")[0];
var botonHijo = document.querySelectorAll(".boton-nav-hijo")[3];
document.getElementById("busquedaCliente").addEventListener("keyup", consultaCliente);
var botonMenu = document.querySelector('.bMenu');
var menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});

if ($(titulo).text() == "Alquilar Area.") { 
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

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
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

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModalCliente() {
	modalcCliente.style.opacity = "1"
	modalcCliente.style.visibility = "visible"
	modalCliente.classList.toggle("modal-close")
}

function cerrarModalArea() {
	modalArea.classList.toggle("modal-close")
	setTimeout(function () {
		modalcArea.style.opacity = "0"
		modalcArea.style.visibility = "hidden"
	}, 300)
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModalArea() {
	modalcArea.style.opacity = "1"
	modalcArea.style.visibility = "visible"
	modalArea.classList.toggle("modal-close")
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
function cerrarModalTrabajador() {
	modalTrabajador.classList.toggle("modal-close")
	setTimeout(function () {
		modalcTrabajador.style.opacity = "0"
		modalcTrabajador.style.visibility = "hidden"
	}, 300)
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModalTrabajador() {
	modalcTrabajador.style.opacity = "1"
	modalcTrabajador.style.visibility = "visible"
	modalTrabajador.classList.toggle("modal-close")
}
//funcion para consultar los datos
function consultar() {
	var datos = new FormData();
	datos.append('accion', 'consultar');
	enviaAjax(datos);
}
function consultaArea() {
	var datos = new FormData();
	datos.append('accion', 'consultaArea');
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
	function consultaTrabajador() {
		var datos = new FormData();
		datos.append('accion', 'consultaTrabajador');
		datos.append('busqueda', $("#busqueda").val());
		enviaAjax(datos);
	} 

$(document).ready(function () {

	consultar();
	consultaArea();
	consultaCliente();
	consultaBien(); 
	consultaTrabajador();

	$("#numAlquiler").on("keypress", function (e) {
		validarkeypress(/^[0-9-\b]*$/, e);
	});

	$("#numAlquiler").on("keyup", function () {
		validarkeyup(/^[0-9]{1,100}$/, $(this),
			$("#snumAlquiler"), "Solo Numeros");
	});

	$("#fechaAlquiler").on("keyup",function(){
		validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$(this),$("#sfechaAlquiler"),"Ingrese una fecha valida");
	});

	$("#cantPersonaAlquiler").on("keypress", function (e) {
		validarkeypress(/^[0-9-\b]*$/, e);
	});

	$("#cantPersonaAlquiler").on("keyup", function () {
		validarkeyup(/^[0-5]{1}[0-9]{1}$/, $(this),
			$("#scantPersonaAlquiler"), "Solo Numeros, Maximo 59 personas");
	});

	$("#cantPersonaAlquiler").on("keypress", function (e) {
		validarkeypress(/^[0-9-$\b]*$/, e);
	});

	$("#montoAlquiler").on("keyup", function () {
		validarkeyup(/^[0-9]{1,100}[$]{1}$/, $(this),
			$("#smontoAlquiler"), "Formato: 100$");
	});

	$("#nombreCliente").on("keypress", function (e) {
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
	});

	$("#nombreCliente").on("keyup", function () {
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,100}$/,
			$(this), $("#snombreCliente"), "Nesecita asignar un cliente");
	});

	$("#nombreArea").on("keypress", function (e) {
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
	});

	$("#nombreArea").on("keyup", function () {
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,100}$/,
			$(this), $("#snombreArea"), "Nesecita asignar un area");
	});

	


	$("#proceso").on("click", function () {

		if ($(this).text() == "Registrar Alquiler") {
			if (validarenvio()) {
				var datos = new FormData();
				datos.append('accion', 'incluir');
				datos.append('numAlquiler', $("#numAlquiler").val());
				datos.append('fechaAlquiler', $("#fechaAlquiler").val());
				datos.append('cantPersonaAlquiler', $("#cantPersonaAlquiler").val());
				datos.append('montoAlquiler', $("#montoAlquiler").val());
				datos.append('cedulaCliente', $("#cedulaCliente").val());
				datos.append('numArea', $("#numArea").val());
				enviaAjax(datos);
			}
				
			
		}

		if ($(this).text() == "Eliminar Alquiler") {
			
				var datos = new FormData();
				datos.append('accion', 'eliminar');
				datos.append('numAlquiler', $("#numAlquiler").val());
				enviaAjax(datos);
			
		}
		
		
	});
	// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
	$("#incluir").on("click", function () {
		limpia();
		$("#proceso").text("Registrar Alquiler");
		$("#titleModal").text("");
		$("#titleModal").append("Registrar Alquiler<span>.</span>");
		abrirModal();
	});

	$("#closesArea").on("click", function () {
		cerrarModalArea();
	});
	$("#closesCliente").on("click", function () {
		cerrarModalCliente();
	});

	$("#closesBien").on("click", function () {
		cerrarModalBien();
	});
	$("#closesTrabajador").on("click", function () {
		cerrarModalTrabajador();
	});

	$("#modalArea").on("click", function () {
		$("#titleModalArea").text("");
		$("#titleModalArea").append("Asignar Area<span>.</span>");
		abrirModalArea();
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
	$("#modalTrabajador").on("click", function () {
		$("#titleModalTrabajador").text("");
		$("#titleModalTrabajador").append("Asignar Trabajador<span>.</span>");
		abrirModalTrabajador();
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

$("#numArea").on("keyup",function(){
	var area = $(this).val();
	var encontro = false;
	$("#consultaArea tr").each(function(){
		if(area == $(this).find("td:eq(0)").text()){
			colocaCliente($(this));
			encontro = true;
		} 
	});
});	

function existeArea(){
	var area = $("#numArea").val();
	var existe = false;
	$("#consultaArea tr").each(function(){
		
		if(area == $(this).find("td:eq(0)").text()){
			existe = true;
		}
	});
	
	return existe;
	
}

function colocaArea(linea){
	$("#nombreArea").val($(linea).find("td:eq(1)").text());
	$("#numArea").val($(linea).find("td:eq(0)").text());

	cerrarModalArea();
}



function validarenvio() {
	if (validarkeyup(/^[0-9]{1,100}$/, $("#numAlquiler"),
		$("#snumAlquiler"), "Solo Numeros") == 0) {
		muestraMensaje("Solo Numeros");
		return false;
	}
	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechaAlquiler"),$("#sfechaAlquiler"),"Ingrese una fecha valida")==0){
		muestraMensaje("Ingrese una fecha valida");
		return false;
	}
	else if (validarkeyup(/^[0-5]{1}[0-9]{1}$/, $("#cantPersonaAlquiler"),
		$("#scantPersonaAlquiler"), "Solo Numeros, Maximo 59 personas") == 0) {
		muestraMensaje("Solo Numeros, Maximo 59 personas");
		return false;
	}
	else if (validarkeyup(/^[0-9]{1,100}[$]{1}$/, $("#montoAlquiler"),
		$("#smontoAlquiler"), "Formato: 100$") == 0) {
		muestraMensaje("Formato: 100$");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombreCliente"), $("#snombreCliente"), "Nesecita asignar un cliente") == 0) {
		muestraMensaje("Nesecita asignar un cliente");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombreArea"), $("#snombreArea"), "Nesecita asignar un area") == 0) {
		muestraMensaje("Nesecita asignar un area");
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
	}, 90000);

}

function pone(pos, accion) {

	linea = $(pos).closest('tr');
	if(accion==1) {
		$("#proceso").text("Eliminar Alquiler");
		$("#titleModal").text("");
		$("#titleModal").append("Eliminar Alquiler<span>.</span>");
	}
	$("#numAlquiler").val($(linea).find("td:eq(0)").text());
	$("#nombreArea").val($(linea).find("td:eq(1)").text());
	$("#nombreCliente").val($(linea).find("td:eq(2)").text());
	$("#cantPersonaAlquiler").val($(linea).find("td:eq(3)").text());
	$("#montoAlquiler").val($(linea).find("td:eq(5)").text());
	$("#fechaAlquiler").val($(linea).find("td:eq(4)").text());

	abrirModal()

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

				if (lee.resultado == "consultar") {
					$("#resultadoconsulta").html(lee.mensaje);
				}

				else if (lee.resultado == "consultaArea") {
					$("#consultaArea").html(lee.mensaje);
				}

				else if (lee.resultado == "consultaCliente") {
					$("#consultaCliente").html(lee.mensaje);
				}
				else if (lee.resultado == "consultaBien") {
					$("#consultaBien").html(lee.mensaje);
				} 
				else if(lee.resultado == "consultaTrabajador"){
					$("#consultaTrabajador").html(lee.mensaje);
				}
				
				else if (lee.resultado == "incluir") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Alquiler Registrado') {
						consultar();
						limpia();
					}
				}
				else if (lee.resultado == "eliminar") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Alquiler Eliminado') {
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
	$("#numAlquiler").val("");
	$("#cantPersonaAlquiler").val("");
	$("#fechaAlquiler").val("");
	$("#montoAlquiler").val("");
	$("#cedulaCliente").val("");
	$("#numArea").val("");
	$("#nombreArea").val("");
	$("#nombreCliente").val("");
}