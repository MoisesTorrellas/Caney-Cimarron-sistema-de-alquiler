<?php


if (!is_file("modelo/".$pagina.".php")){

	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
    if(is_file("vista/".$pagina.".php")){

    if(!empty($_POST)){
		$o = new gestionarUsuario();   

		$accion = $_POST['accion'];
		
		if($accion=='consultar'){
			echo  json_encode($o->consultar());  
		}
		else if($accion=='eliminar'){
			$o->set_cedulaUsuario($_POST['cedulaUsuario']);
			echo  json_encode($o->eliminar());
		}
		else{		  
			$o->set_cedulaUsuario($_POST['cedulaUsuario']);
			$o->set_nombreUsuario($_POST['nombreUsuario']);
			$o->set_apellidoUsuario($_POST['apellidoUsuario']);
			$o->set_telefonoUsuario($_POST['telefonoUsuario']);
            $o->set_usuario($_POST['usuario']);
            $o->set_contraseña($_POST['contraseña']);
            $o->set_tipoUsuario($_POST['tipoUsuario']);
		
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