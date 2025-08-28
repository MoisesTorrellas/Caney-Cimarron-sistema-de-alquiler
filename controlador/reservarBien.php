<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		
		$o = new reservarBien();   

		$accion = $_POST['accion'];

    	if($accion=='consultaCliente'){
			$o->set_busquedaCliente($_POST['busquedaCliente']);
			echo  json_encode($o->consultaCliente());  
		}
		else if($accion=='consultaBien'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultaBien());  
		} 
		
		else{	
			$o->set_numReservacion($_POST['numReservacion']);  
            $o->set_cantPersonaReservacion($_POST['cantPersonaReservacion']);
			$o->set_fechaReservacion($_POST['fechaReservacion']);
            $o->set_horaReservacion($_POST['horaReservacion']);
			$o->set_cedulaCliente($_POST['cedulaCliente']);
			$o->set_codBien($_POST['codBien']);
			

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