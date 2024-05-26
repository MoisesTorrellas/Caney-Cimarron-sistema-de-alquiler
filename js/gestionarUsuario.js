let cerrar = document.querySelectorAll(".closes")[0];
let abrir = document.querySelectorAll(".cta")[0];
let modal = document.querySelectorAll(".modal2")[0];
let modalc = document.querySelectorAll(".modal-contenedor")[0];

$(cerrar).on("click",function(){
	modal.classList.toggle("modal-close")
    setTimeout(function(){
        modalc.style.opacity = "0"
        modalc.style.visibility = "hidden"
    },300)
});

function cerrarModal(){
    modal.classList.toggle("modal-close")
    setTimeout(function(){
        modalc.style.opacity = "0"
        modalc.style.visibility = "hidden"
    },300)
}

function abrirModal(){
	modalc.style.opacity = "1"
    modalc.style.visibility = "visible"
    modal.classList.toggle("modal-close")
}

function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');
	enviaAjax(datos);	
}

/* function destruyeDT(){
	//1 se destruye el datatablet
	if ($.fn.DataTable.isDataTable("#tablapersona")) {
        $("#tablapersona").DataTable().destroy();
    }
}
function crearDT(){
	//se crea nuevamente
    if (!$.fn.DataTable.isDataTable("#tablapersona")) {
        $("#tablapersona").DataTable({
			language: {
            lengthMenu: "Mostrar _MENU_ por página",
            zeroRecords: "No se encontraron personas",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "No hay personas registradas",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            search: "Buscar:",
            paginate: {
            first: "Primera",
            last: "Última",
            next: "Siguiente",
            previous: "Anterior",
        },
            },
            autoWidth: false,
            order: [[1, "asc"]],
            });
    }         
} */

$(document).ready(function(){
	
	consultar();
	
//VALIDACION DE DATOS	
	$("#cedulaUsuario").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedulaUsuario").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedulaUsuario"),"El formato debe ser 9999999 ");
	});
	
	
	$("#nombreUsuario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombreUsuario").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombreUsuario"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	$("#apellidoUsuario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#apellidoUsuario").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sapellidoUsuario"),"Solo letras  entre 3 y 30 caracteres");
	});
	
    $("#telefonoUsuario").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#telefonoUsuario").on("keyup",function(){
		validarkeyup(/^[0]{1}[4]{1}[1-2]{1}[2-4]{1}[-]{1}[0-9]{7}$/,
		$(this),$("#stelefonoUsuario"),"El formato es 0400-000000");
	});

    $("#usuario").on("keypress",function(e){
		validarkeypress(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#usuario").on("keyup",function(){
		validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#susuario"),"Solo letras y numeros entre 3 y 15 caracteres");
	});

    $("#contraseña").on("keypress",function(e){
		validarkeypress(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#contraseña").on("keyup",function(){
		validarkeyup(/^[0-9\A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#scontraseña"),"Solo letras y numeros entre 3 y 15 caracteres");
	});
	
	
	
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
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
			consultar()
		}
	}
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
			consultar()
		}
	}
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


$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("Registrar Usuario");
	abrirModal();
	consultar();
});



	
	
});

//Validación de todos los campos antes del envio
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
	else if(validarkeyup(/^[0]{1}[4]{1}[1-2]{1}[2-4]{1}[-]{1}[0-9]{7}$/,
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


//Funcion que muestra el modal con un mensaje
function muestraMensaje(mensaje){
	
	$("#contenidodemodal").html(mensaje);
			$("#mostrarmodal").modal("show");
			setTimeout(function() {
					$("#mostrarmodal").modal("hide");
				},5000);
			
}


//Función para validar por Keypress
function validarkeypress(er,e){
	
	key = e.keyCode;
	
	
    tecla = String.fromCharCode(key);
	
	
    a = er.test(tecla);
	
    if(!a){
	
		e.preventDefault();
    }
	
    
}
//Función para validar por keyup
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

//funcion para pasar de la lista a el formulario
function pone(pos,accion){
	
	linea=$(pos).closest('tr');

	if(accion==0){
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
	consultar()
	
}


//funcion que envia y recibe datos por AJAX
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
    timeout: 10000, //tiempo maximo de espera por la respuesta del servidor
    success: function (respuesta) {
    // console.log(respuesta);
		try {
        var lee = JSON.parse(respuesta);
		if (lee.resultado == "consultar") {
			/* destruyeDT(); */	
			$("#resultadoconsulta").html(lee.mensaje);
			/* crearDT(); */
		}
		else if (lee.resultado == "incluir") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Registrado'){
				consultar();
			}
        }
		else if (lee.resultado == "modificar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Modificado'){
				consultar();
			}
        }
		else if (lee.resultado == "eliminar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Usuario Eliminado'){
				consultar();
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
        //pasa cuando superan los 10000 10 segundos de timeout
        muestraMensaje("Servidor ocupado, intente de nuevo");
		} else {
        //cuando ocurre otro error con ajax
        muestraMensaje("ERROR: <br/>" + request + status + err);
		}
    },
    complete: function () {},
	});
}

function limpia(){
	$("#cedulaUsuario").val("");
	$("#nombreUsuario").val("");
	$("#apellidoUsuario").val("");
    $("#telefonoUsuario").val("");
    $("#usuario").val("");
    $("#contraseña").val("");
	$("#tipoUsuario").prop("selectedIndex",0);
}