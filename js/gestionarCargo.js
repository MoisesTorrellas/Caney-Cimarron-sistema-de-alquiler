var cerrar = document.querySelectorAll(".closes")[0];
var modal = document.querySelectorAll(".modal2")[0];
var modalc = document.querySelectorAll(".modal-contenedor")[0];
var titulo= document.querySelectorAll(".titulo")[0];
var botonNav= document.querySelectorAll(".boton-nav-hijo")[1];
document.getElementById("busqueda").addEventListener("keyup", consultar);
var botonMenu = document.querySelector('.bMenu');
var menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});

	if($(titulo).text()=="Gestionar Cargos."){
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

	$("#codigoCargo").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#codigoCargo").on("keyup",function(){
		validarkeyup(/^[0-9]{1,5}$/,$(this),
		$("#scodigoCargo"),"El formato debe ser 99999 ");
	});
	
	//VALIDACION DEL NOMBRE
	$("#nombreCargo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombreCargo").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombreCargo"),"Solo letras  entre 3 y 30 caracteres");
	});
	//CONTROL DE BOTONES 
$("#proceso").on("click",function(){

	//CONTROL DE BOTON REGISTRAR CArgo
	if($(this).text()=="Registrar Cargo"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('codigoCargo',$("#codigoCargo").val());
			datos.append('nombreCargo',$("#nombreCargo").val());
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON MODIFICAR Cargo
	else if($(this).text()=="Modificar Cargo"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('codigoCargo',$("#codigoCargo").val());
			datos.append('nombreCargo',$("#nombreCargo").val());
		
			enviaAjax(datos);
		}
	}
	//CONTROL DE BOTON ELIMINAR Cargo
	if($(this).text()=="Eliminar Cargo"){
		if(validarkeyup(/^[0-9]{1,5}$/,$("#codigoCargo"),
		$("#scodigoCargo"),"El formato debe ser 999")==0){
		muestraMensaje("La codigo debe coincidir con el formato <br/>"+ 
						"999");	
		
		}
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('codigoCargo',$("#codigoCargo").val());
			enviaAjax(datos);
		}
	}
});

// ACCION DE CLICK AL PULSAR EL BOTON INCLUIR
$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("Registrar Cargo");
	$("#titleModal").text("");
	$("#titleModal").append("Registrar Cargo<span>.</span>");
	abrirModal();
});



	
	
});

//VALIDACIONES DEL ENVIO
function validarenvio(){
	if(validarkeyup(/^[0-9]{1,5}$/,$("#codigoCargo"),
		$("#scodigoCargo"),"El formato debe ser 999")==0){
		muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombreCargo"),$("#snombreCargo"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Solo letras  entre 3 y 30 caracteres");
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
		$("#proceso").text("Modificar Cargo");
		$("#titleModal").text("");
		$("#titleModal").append("Modificar Cargo<span>.</span>");
	}
	else{
		$("#proceso").text("Eliminar Cargo");
		$("#titleModal").text("");
		$("#titleModal").append("Eliminar Cargo<span>.</span>");
	}
	$("#codigoCargo").val($(linea).find("td:eq(0)").text());
	$("#nombreCargo").val($(linea).find("td:eq(1)").text());

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
		Y EL MENSAJE ES "TRABAJADOR REGISTRADO" CUNSULTA Y LIMPIA EL FORMULARIO*/
		else if (lee.resultado == "incluir") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cargo Registrado'){
				consultar();
				limpia();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "MODIFICAR" 
		Y EL MENSAJE ES "TRABAJADOR MODIFICADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "modificar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cargo Modificado'){
				consultar();
				cerrarModal();
			}
        }
		/*CUANDO EL RESULTADO PROVENIENTE DEL MODELO ES "ELIMINAR" 
		Y EL MENSAJE ES "TRABAJADOR ELIMINADO" CUNSULTA Y CIERRA EL MODAL*/
		else if (lee.resultado == "eliminar") {
			muestraMensaje(lee.mensaje);
			if(lee.mensaje=='Cargo Eliminado'){
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
	$("#codigoCargo").val("");
	$("#nombreCargo").val("");

}

