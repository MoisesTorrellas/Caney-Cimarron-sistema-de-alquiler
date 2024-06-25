function pone_fecha(){
	
	
	var datos = new FormData();
	datos.append('accion','obtienefecha');
	enviaAjax(datos);	
	
}
function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');
	enviaAjax(datos);	
}
$(document).ready(function(){
	//para obtener la fecha del servidor y calcular la 
	//edad de nacimiento que debe ser mayor a 18 
	pone_fecha();
	//fin de colocar fecha en input fecha de nacimiento
	
	//ejecuta una consulta a la base de datos para llenar la tabla
	consultar();
	var datos = new FormData();
	datos.append('accion','consultartrabajador');
	enviaAjax(datos);
//VALIDACION DE DATOS	
	
	$("#descripcion").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#descripcion").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,50}$/,
		$(this),$("#sdescripcion"),"Solo letras  entre 3 y 50 caracteres");
	});
	
	$("#fechadeorden").on("keyup",function(){
		validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$(this),$("#sfechadeorden"),"Ingrese una fecha valida");
	});
	
	
	
	
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			texto_formateado = removeSpace($("#descripcion").val());
			datos.append('descripcion', texto_formateado);
			datos.append('fechadeorden',$("#fechadeorden").val());
			datos.append('estatus',$("#estatus").val());
			datos.append('idtrabajador',$("#idtrabajador").val());
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			texto_formateado = removeSpace($("#descripcion").val());
			datos.append('descripcion', texto_formateado);
			datos.append('fechadeorden',$("#fechadeorden").val());
			datos.append('estatus',$("#estatus").val());
			datos.append('idtrabajador',$("#idtrabajador").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,50}$/,$("#descripcion"),
		$("#sdescripcion"),"El formato debe ser letras")==0){
	    muestraMensaje("La descripcion debe coincidir con el formato <br/>"+ 
						"solo letras");	
		
	    }
		else{
			var datos = new FormData();
			console.log("-"+$("#descripcion").val()+"-");
			datos.append('accion','eliminar');
			texto_formateado = removeSpace($("#descripcion").val());
			datos.append('descripcion', texto_formateado);
			enviaAjax(datos);
		}
	}
});
$("#incluir").on("click",function(){
	limpia();
	document.getElementById('descripcion').removeAttribute("readonly");
	$("#proceso").text("INCLUIR");
	$("#modal1").modal("show");
});




	
	
});

//Validación de todos los campos antes del envio
function validarenvio(){
	if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,50}$/,
		$("#descripcion"),$("#descripcion"),"Solo letras  entre 3 y 50 caracteres")==0){
		muestraMensaje("orden <br/>Solo letras  entre 3 y 50 caracteres");
		return false;
	}

	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechadeorden"),$("#sfechadeorden"),"Ingrese una fecha valida")==0){
		muestraMensaje("Fecha de orden <br/>Ingrese una fecha valida");
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



	
	$("#descripcion").val($(linea).find("td:eq(0)").text());
	document.getElementById('descripcion').setAttribute("readonly","");
	$("#fechadeorden").val($(linea).find("td:eq(1)").text());
	$("#estatus").val($(linea).find("td:eq(2)").text());
	$("#idtrabajador").val($(linea).find("td:eq(3)").text());

	if(accion==0){
		$("#proceso").text("MODIFICAR");
	}
	else{
		$("#proceso").text("ELIMINAR");
	}
	
	$("#modal1").modal("show");
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
     console.log(respuesta);
      try {
        var lee = JSON.parse(respuesta);
        if (lee.resultado == "obtienefecha") {
          $("#fechadeorden").val(lee.mensaje);
        }
		else if (lee.resultado == "consultar") {
           $("#resultadoconsulta").html(lee.mensaje);
        }
		else if (lee.resultado == "consultartrabajador") {
			$("#idtrabajador").html(lee.mensaje);
		 }
		 else if (lee.resultado == "removeSpace") {
			$("#descripcion").val(lee.mensaje);
		 }
		else if (lee.resultado == "incluir") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Inluido'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "modificar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Modificado'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "eliminar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Eliminado'){
			   $("#modal1").modal("hide");
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
      // si ocurrio un error en la trasmicion
      // o recepcion via ajax entra aca
      // y se muestran los mensaje del error
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
	pone_fecha();
	
	
	$("#descripcion").val("");
	$("#estatus").prop("selectedIndex",0);
	$("#idtrabajador").prop("selectedIndex",0);
}
function removeSpace(cadena)
{
	if(typeof cadena==='string')
	{
		if(/(?:^\s)|(?:[\s][\s])|(?:[\s]+$)/.test(cadena))
		{
			cadena = cadena.replace(/\n/mg,"---WHITE_ENDL_SPACE---");
			cadena=cadena.replace(/(?:^\s+)|(?:[\s]+$)/mg,"");
			while(/[\s][\s]/.test(cadena)) cadena=cadena.replace(/(?:[\s][\s])+/," ");
			cadena = cadena.replace(/---WHITE_ENDL_SPACE---/g,"\n");
		}
		return cadena;
	}
	else{
		console.error('El argumento debe ser un string');
		return undefined;
	}
};