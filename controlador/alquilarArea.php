<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		
		$o = new alquilarArea();   

		$accion = $_POST['accion'];

		if($accion=='consultar'){
			echo  json_encode($o->consultar());  
		}

    	else if($accion=='consultaCliente'){
			$o->set_busquedaCliente($_POST['busquedaCliente']);
			echo  json_encode($o->consultaCliente());  
		}
		else if($accion=='consultaArea'){
			echo  json_encode($o->consultaArea());  
		}
		else if($accion=='consultaBien'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultaBien());  
		} 
		else if($accion=='consultaTrabajador'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultaTrabajador());  
		} 
		else if($accion=='eliminar'){
			$o->set_numAlquiler($_POST['numAlquiler']);
			echo  json_encode($o->eliminar());
		}
		else{	
			$o->set_numAlquiler($_POST['numAlquiler']);  
            $o->set_fechaAlquiler($_POST['fechaAlquiler']);
			$o->set_cantPersonaAlquiler($_POST['cantPersonaAlquiler']);
            $o->set_montoAlquiler($_POST['montoAlquiler']);
			$o->set_cedulaCliente($_POST['cedulaCliente']);
			$o->set_numArea($_POST['numArea']);

			if($accion=='incluir'){
				echo  json_encode($o->incluir());
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