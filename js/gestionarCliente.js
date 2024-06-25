let cerrar = document.querySelectorAll(".closes")[0];
let modal = document.querySelectorAll(".modal2")[0];
let modalc = document.querySelectorAll(".modal-contenedor")[0];
let titulo= document.querySelectorAll(".titulo")[0];
let botonNav= document.querySelectorAll(".botonNav")[2];
document.getElementById("busqueda").addEventListener("keyup", consultar);
let botonMenu = document.querySelector('.bMenu');
let menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});

	if($(titulo).text()=="Gestionar Cliente."){
		botonNav.classList.toggle("botonNavUsuario")
	}


//Funcion para el boton de cerrar el modal de formularios
$(cerrar).on("click",function(){
	cerrarModal();
});

//funcion para cerrar el modal despues de modificar y eliminar
function cerrarModal(){
	modal.classList.toggle("modal-close")
    setTimeout(function(){
        modalc.style.opacity = "0"
        modalc.style.visibility = "hidden"
    },300)
}

//funcion para abrir el modal al pulsar el boton de incluir, modificar y eliminar
function abrirModal(){
	modalc.style.opacity = "1"
    modalc.style.visibility = "visible"
    modal.classList.toggle("modal-close")
}

//funcion para consultar los datos
function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');
	datos.append('busqueda',$("#busqueda").val());
	enviaAjax(datos);	
}



$(document).ready(function(){

	
	//validaciones

	consultar();

	//VALIDACION DE CEDULA
	$("#cedulaCliente").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedulaCliente").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedulaCliente"),"El formato debe ser 9999999 ");
	});
	
	//VALIDACION DEL NOMBRE
	$("#nombreCliente").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombreCliente").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombreCliente"),"Solo letras  entre 3 y 30 caracteres");
	});
	//VALIDACION DE APELLIDO
	$("#apellidoCliente").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#apellidoCliente").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sapellidoCliente"),"Solo letras  entre 3 y 30 caracteres");
	});
	//VALIDACION DE TELEFONO
    $("#telefonoCliente").on("keypress",function(e){
		validarkeypress(/^[0-9\-]*$/,e);
	});

	$("#telefonoCliente").on("keyup",function(){
		validarkeyup(/^[0-9]{4}[-][0-9]{7}$/,
		$(this),$("#stelefonoCliente"),"El formato es 0000-000000");
	});
	//VALIDACION DEL USERNAME
    $("#direccionCliente").on("keypress",function(e){
		validarkeypress(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#direccionCliente").on("keyup",function(){
		validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,100}$/,
		$(this),$("#sdireccionCliente"),"Solo letras y numeros entre 3 y 100 caracteres");
	});
	
	//CONTROL DE BOTONES 
$("#proceso").on("click",function(){

	//CONTROL DE BOTON REGISTRAR Cliente
	if($(this).text()=="Registrar Cliente"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('cedulaCliente',$("#cedulaCliente").val());
			datos.append('nombreCliente',$("#nombreCliente").val());
			datos.append('apellidoCliente',$("#apellidoCliente").val());
			datos.append('direccionCliente',$("#direccionCliente").val());
			datos.append('telefonoCliente',$("#telefonoCliente").val());
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON MODIFICAR Cliente
	else if($(this).text()=="Modificar Cliente"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('cedulaCliente',$("#cedulaCliente").val());
			datos.append('nombreCliente',$("#nombreCliente").val());
			datos.append('apellidoCliente',$("#apellidoCliente").val());
			datos.append('direccionCliente',$("#direccionCliente").val());
			datos.append('telefonoCliente',$("#telefonoCliente").val());
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON ELIMINAR Cliente
	if($(this).text()=="Eliminar Cliente"){
		if(validarkeyup(/^[0-9]{7,8}$/,$("#cedulaCliente"),
		$("#scedulaCliente"),"El formato debe ser 9999999")==0){
		muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		
		}
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('cedulaCliente',$("#cedulaCliente").val());
			enviaAjax(datos);
		}
	}
});

// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("Registrar Cliente");
	$("#titleModal").text("");
	$("#titleModal").append("Registrar Cliente<span>.</span>");
	abrirModal();
});



	
	
});

//VALIDACIONES DEL ENVIO
function validarenvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedulaCliente"),
		$("#scedulaCliente"),"El formato debe ser 9999999")==0){
		muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombreCliente"),$("#snombreCliente"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellidoCliente"),$("#sapellidoCliente"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[0-9]{4}[-]{1}[0-9]{7}$/,
		$("#telefonoCliente"),$("#stelefonoCliente"),"Ingrese un numero valido")==0){
		muestraMensaje("Ingrese un telefono valido");
		return false;	
	}
	else if(validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,100}$/,
		$("#direccionCliente"),$("#sdireccionCliente"),"Solo letras y numeros entre 3 y 100 caracteres")==0){
		muestraMensaje("Solo letras y numeros entre 3 y 100 caracteres");
		return false;
	}
	
	return true;
}

//FUNCION PARA MOSTRAR EL MODAL CON EL MENSAJE DE LA ACCION
function muestraMensaje(mensaje){
	
	$("#contenidodemodal").html(mensaje);
			$("#mostrarmodal").modal("show");
			setTimeout(function() {
					$("#mostrarmodal").modal("hide");
				},2000);
			
}

function validarkeypress(er,e){
	
	key = e.keyCode;
	
	/* console.log(e.text); */
    tecla = String.fromCharCode(key);
	
	
    a = er.test(tecla);
	
    if(!a){
	
		e.preventDefault();
    }
	
    
}

function validarkeyup(er,etiqueta,etiquetamensaje,
mensaje){
	a = er.test(etiqueta.val());
	if(a){
		etiquetamensaje.text("");
		return 1;
	}
	else{
		etiquetamensaje.text(mensaje);
		return 0;
	}
}
// ACCION DE CLICK AL PULSAR LOS BOTONES ELIMINAR Y MODIFICAR
function pone(pos,accion){
	
	linea=$(pos).closest('tr');

	if(accion==0){
		//$("#icon").classList('fi fi-br-user-add iconB');
		$("#proceso").text("Modificar Cliente");
		$("#titleModal").text("");
		$("#titleModal").append("Modificar Cliente<span>.</span>");
	}
	else{
		$("#proceso").text("Eliminar Cliente");
		$("#titleModal").text("");
		$("#titleModal").append("Eliminar Cliente<span>.</span>");
	}
	$("#cedulaCliente").val($(linea).find("td:eq(0)").text());
	$("#nombreCliente").val($(linea).find("td:eq(1)").text());
	$("#apellidoCliente").val($(linea).find("td:eq(2)").text());
	$("#direccionCliente").val($(linea).find("td:eq(3)").text());
	$("#telefonoCliente").val($(linea).find("td:eq(4)").text());
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
    beforeSend: function () {},
    timeout: 10000, 
    success: function (respuesta) {
		try {
        var lee = JSON.parse(respuesta);

		if (lee.resultado == "consultar") {	
			$("#resultadoconsulta").html(lee.mensaje);
		}
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "INCLUIR" 
		Y EL MENSAJE ES "Cliente REGISTRADO" CUNSULTA Y LIMPIA EL FORMULARIO*/
		else if (lee.resultado == "incluir") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cliente Registrado'){
				consultar();
				limpia();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "MODIFICAR" 
		Y EL MENSAJE ES "Cliente MODIFICADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "modificar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cliente Modificado'){
				consultar();
				cerrarModal();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "ELIMINAR" 
		Y EL MENSAJE ES "Cliente ELIMINADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "eliminar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cliente Eliminado'){
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
    complete: function () {},
	});
}

//FUNCION PARA LIMPIAR EL MODAL
function limpia(){
	$("#cedulaCliente").val("");
	$("#nombreCliente").val("");
	$("#apellidoCliente").val("");
    $("#telefonoCliente").val("");
    $("#direccionCliente").val("");

}