<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		$o = new gestionarBien();   

		$accion = $_POST['accion'];

		if($accion=='consultar'){
			$o->set_busqueda($_POST['busqueda']);
			echo  json_encode($o->consultar());  
		}
		else if($accion=='eliminar'){
			$o->set_codBien($_POST['codBien']);
			echo  json_encode($o->eliminar());
		}
		else{	
			$o->set_codBien($_POST['codBien']);  
			$o->set_nomBien($_POST['nomBien']);
			$o->set_cantBien($_POST['cantBien']);
		
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