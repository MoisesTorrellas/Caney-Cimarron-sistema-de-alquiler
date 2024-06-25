<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		$o = new gestionarCliente();   

		$accion = $_POST['accion'];

		if($accion=='consultar'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultar());  
		}
		else if($accion=='eliminar'){
			$o->set_cedulaCliente($_POST['cedulaCliente']);
			echo  json_encode($o->eliminar());
		}
		else{		  
			$o->set_cedulaCliente($_POST['cedulaCliente']);
			$o->set_nombreCliente($_POST['nombreCliente']);
			$o->set_apellidoCliente($_POST['apellidoCliente']);
            $o->set_direccionCliente($_POST['direccionCliente']);
			$o->set_telefonoCliente($_POST['telefonoCliente']);
		
			if($accion=='incluir'){
				echo  json_encode($o->incluir());
			}
			elseif($accion=='modificar'){
				echo  json_encode($o->modificar());
			}
		}
		exit;
	}
	
	
	require_once("vista/".$pagina.".php"); 
}
    else{
        echo "pagina en construccion";
    }
?>