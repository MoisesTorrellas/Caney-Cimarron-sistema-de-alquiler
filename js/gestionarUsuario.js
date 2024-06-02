let cerrar = document.querySelectorAll(".closes")[0];
let modal = document.querySelectorAll(".modal2")[0];
let modalc = document.querySelectorAll(".modal-contenedor")[0];
document.getElementById("busqueda").addEventListener("keyup", consultar);


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
	$("#cedulaUsuario").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedulaUsuario").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedulaUsuario"),"El formato debe ser 9999999 ");
	});
	
	//VALIDACION DEL NOMBRE
	$("#nombreUsuario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombreUsuario").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombreUsuario"),"Solo letras  entre 3 y 30 caracteres");
	});
	//VALIDACION DE APELLIDO
	$("#apellidoUsuario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#apellidoUsuario").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sapellidoUsuario"),"Solo letras  entre 3 y 30 caracteres");
	});
	//VALIDACION DE TELEFONO
    $("#telefonoUsuario").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#telefonoUsuario").on("keyup",function(){
		validarkeyup(/^[0-5]{4}[-]{1}[0-9]{7}$/,
		$(this),$("#stelefonoUsuario"),"El formato es 0400-000000");
	});
	//VALIDACION DEL USERNAME
    $("#usuario").on("keypress",function(e){
		validarkeypress(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#usuario").on("keyup",function(){
		validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#susuario"),"Solo letras y numeros entre 3 y 15 caracteres");
	});
	//VALIDACION DE CONTRASEÑA
    $("#contraseña").on("keypress",function(e){
		validarkeypress(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#contraseña").on("keyup",function(){
		validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#scontraseña"),"Solo letras y numeros entre 3 y 15 caracteres");
	});

	//CONTROL DE BOTONES 
$("#proceso").on("click",function(){

	//CONTROL DE BOTON REGISTRAR USUARIO
	if($(this).text()=="Registrar Usuario"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('cedulaUsuario',$("#cedulaUsuario").val());
			datos.append('nombreUsuario',$("#nombreUsuario").val());
			datos.append('apellidoUsuario',$("#apellidoUsuario").val());
			datos.append('telefonoUsuario',$("#telefonoUsuario").val());
			datos.append('usuario',$("#usuario").val());
			datos.append('contraseña',$("#contraseña").val());
			datos.append('tipoUsuario',$("#tipoUsuario").val());
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON MODIFICAR USUARIO
	else if($(this).text()=="Modificar Usuario"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('cedulaUsuario',$("#cedulaUsuario").val());
			datos.append('nombreUsuario',$("#nombreUsuario").val());
			datos.append('apellidoUsuario',$("#apellidoUsuario").val());
			datos.append('telefonoUsuario',$("#telefonoUsuario").val());
			datos.append('usuario',$("#usuario").val());
			datos.append('contraseña',$("#contraseña").val());
            datos.append('tipoUsuario',$("#tipoUsuario").val());
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON ELIMINAR USUARIO
	if($(this).text()=="Eliminar Usuario"){
		if(validarkeyup(/^[0-9]{7,8}$/,$("#cedulaUsuario"),
		$("#scedulaUsuario"),"El formato debe ser 9999999")==0){
		muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		
		}
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('cedulaUsuario',$("#cedulaUsuario").val());
			enviaAjax(datos);
		}
	}
});

// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("Registrar Usuario");
	abrirModal();
});



	
	
});

//VALIDACIONES DEL ENVIO
function validarenvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedulaUsuario"),
		$("#scedulaUsuario"),"El formato debe ser 9999999")==0){
		muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombreUsuario"),$("#snombreUsuario"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellidoUsuario"),$("#sapellidoUsuario"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[0-5]{4}[-]{1}[0-9]{7}$/,
		$("#telefonoUsuario"),$("#stelefonoUsuario"),"Ingrese una fecha valida")==0){
		muestraMensaje("Ingrese un telefono valido");
		return false;	
	}
	else if(validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$("#usuario"),$("#susuario"),"Solo letras y numeros entre 3 y 15 caracteres")==0){
		muestraMensaje("Solo letras y numeros entre 3 y 15 caracteres");
		return false;
	}
    else if(validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$("#contraseña"),$("#scontraseña"),"Solo letras y numeros entre 3 y 15 caracteres")==0){
		muestraMensaje("Solo letras y numeros entre 3 y 15 caracteres");
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
				},30000);
			
}

function validarkeypress(er,e){
	
	key = e.keyCode;
	
	
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
		$("#proceso").text("Modificar Usuario");
	}
	else{
		$("#proceso").text("Eliminar Usuario");
	}
	$("#cedulaUsuario").val($(linea).find("td:eq(0)").text());
	$("#nombreUsuario").val($(linea).find("td:eq(1)").text());
	$("#apellidoUsuario").val($(linea).find("td:eq(2)").text());
	$("#telefonoUsuario").val($(linea).find("td:eq(3)").text());
	$("#usuario").val($(linea).find("td:eq(4)").text());
	$("#contraseña").val($(linea).find("td:eq(5)").text());
    $("#tipoUsuario").val($(linea).find("td:eq(6)").text());

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
		Y EL MENSAJE ES "USUARIO REGISTRADO" CUNSULTA Y LIMPIA EL FORMULARIO*/
		else if (lee.resultado == "incluir") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Registrado'){
				consultar();
				limpia();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "MODIFICAR" 
		Y EL MENSAJE ES "USUARIO MODIFICADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "modificar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Modificado'){
				consultar();
				cerrarModal();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "ELIMINAR" 
		Y EL MENSAJE ES "USUARIO ELIMINADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "eliminar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Eliminado'){
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
	$("#cedulaUsuario").val("");
	$("#nombreUsuario").val("");
	$("#apellidoUsuario").val("");
    $("#telefonoUsuario").val("");
    $("#usuario").val("");
    $("#contraseña").val("");

}