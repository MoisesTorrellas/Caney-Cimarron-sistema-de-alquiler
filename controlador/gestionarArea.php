<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		$o = new gestionarArea();   

		$accion = $_POST['accion'];

		if($accion=='consultar'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultar());  
		}
		else if($accion=='eliminar'){
			$o->set_numArea($_POST['numArea']);
			echo  json_encode($o->eliminar());
		}
		else{	
			$o->set_numArea($_POST['numArea']);  
			$o->set_nombreArea($_POST['nombreArea']);
			$o->set_horarioArea($_POST['horarioArea']);
		
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