<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		$o = new gestionarTrabajador();   

		$accion = $_POST['accion'];

		if($accion=='consultar'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultar());  
		}
		else if($accion=='eliminar'){
			$o->set_cedulaTrabajador($_POST['cedulaTrabajador']);
			echo  json_encode($o->eliminar());
		}
		else{		  
			$o->set_cedulaTrabajador($_POST['cedulaTrabajador']);
			$o->set_nombreTrabajador($_POST['nombreTrabajador']);
			$o->set_apellidoTrabajador($_POST['apellidoTrabajador']);
            $o->set_direccionTrabajador($_POST['direccionTrabajador']);
			$o->set_telefonoTrabajador($_POST['telefonoTrabajador']);
            $o->set_cargoTrabajador($_POST['cargoTrabajador']);
		
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