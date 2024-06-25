<?php

require_once('modelo/datos.php');

class gestionarUsuario extends datos{
	
	private $cedulaUsuario; 
	private $nombreUsuario;
	private $apellidoUsuario;
	private $telefonoUsuario;
	private $usuario;
	private $contraseña;
    private $tipoUsuario;
	private $busqueda;
	
	function set_cedulaUsuario($valor){
		$this->cedulaUsuario = $valor;
	}
	
	function set_nombreUsuario($valor){
		$this->nombreUsuario = $valor;
	}
	
	function set_apellidoUsuario($valor){
		$this->apellidoUsuario = $valor;
	}
	
	function set_telefonoUsuario($valor){
		$this->telefonoUsuario = $valor;
	}
	
	function set_usuario($valor){
		$this->usuario = $valor;
	}
	
	function set_contraseña($valor){
		$this->contraseña = $valor;
	}
    function set_tipoUsuario($valor){
		$this->tipoUsuario = $valor;
	}

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
/* ------------------------GET------------------------ */
	function get_cedulaUsuario(){
		return $this->cedulaUsuario;
	}
	
	function get_nombreUsuario(){
		return $this->nombreUsuario;
	}
	
	function get_apellidoUsuario(){
		return $this->apellidoUsuario;
	}
	
	function get_telefonoUsuario(){
		return $this->telefonoUsuario;
	}
	
	function get_usuario(){
		return $this->usuario;
	}
	
	function get_contraseña(){
		return $this->contraseña;
	}
	
    function get_tipoUsuario(){
		return $this->tipoUsuario;
	}

	function get_busqueda(){
		return $this->busqueda;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeCedula($this->cedulaUsuario) && !$this->existeUsuario($this->usuario)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into usuarios (
						cedulaUsuario,
						nombreUsuario,
						apellidoUsuario,
						telefonoUsuario,
						usuario,
						contraseña,
                        tipoUsuario
						)
						Values(
						'$this->cedulaUsuario',
						'$this->nombreUsuario',
						'$this->apellidoUsuario',
						'$this->telefonoUsuario',
						'$this->usuario',
						'$this->contraseña',
						'$this->tipoUsuario'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Usuario Registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else if($this->existeCedula($this->cedulaUsuario)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
		else if($this->existeUsuario($this->usuario)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el usuario';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeCedula($this->cedulaUsuario)){
			try {
					$co->query("Update usuarios set 
                    cedulaUsuario = '$this->cedulaUsuario',
                    nombreUsuario = '$this->nombreUsuario',
                    apellidoUsuario = '$this->apellidoUsuario',
                    telefonoUsuario = '$this->telefonoUsuario',
						usuario = '$this->usuario',
						contraseña = '$this->contraseña',
						tipoUsuario = '$this->tipoUsuario'
						where
						cedulaUsuario = '$this->cedulaUsuario'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Usuario Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Cedula no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeCedula($this->cedulaUsuario)){
			try {
					$co->query("delete from usuarios 
						where
						cedulaUsuario = '$this->cedulaUsuario'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Usuario Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la cedula';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from usuarios where cedulaUsuario like '%$this->busqueda%' 
									or nombreUsuario like '%$this->busqueda%'
									or apellidoUsuario like '%$this->busqueda%'
									or telefonoUsuario like '%$this->busqueda%'
									or usuario like '%$this->busqueda%'
									or tipoUsuario like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td'data-label='Cedula'>";
							$respuesta = $respuesta.$r['cedulaUsuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre'>";
							$respuesta = $respuesta.$r['nombreUsuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Apellido'>";
							$respuesta = $respuesta.$r['apellidoUsuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Telefono'>";
							$respuesta = $respuesta.$r['telefonoUsuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Usuario'>";
							$respuesta = $respuesta.$r['usuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Contraseña'>";
							$respuesta = $respuesta.$r['contraseña'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Tipo'>";
							$respuesta = $respuesta.$r['tipoUsuario'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td tbBoton' >";
							$respuesta = $respuesta."<button type='button'
							class='botonTabla botonTablaE' 
							onclick='pone(this,0)'
						    ><i class='fi fi-br-pencil iconTabla'></i></button><br/>";
							$respuesta = $respuesta."<button type='button'
							class='botonTabla' 
							onclick='pone(this,1)'
						    ><i class='fi fi-br-trash-xmark iconTabla'></i></button><br/>";
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}  
				
			    $r['resultado'] = 'consultar';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	
	private function existeCedula($cedulaUsuario){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from usuarios where cedulaUsuario='$cedulaUsuario'");
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true;
			    
			}
			else{
				
				return false;;
			}
			
		}catch(Exception $e){
			return false;
		}
	}
	private function existeUsuario($usuario){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from usuarios where usuario='$usuario'");
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true;
			    
			}
			else{
				
				return false;;
			}
			
		}catch(Exception $e){
			return false;
		}
	}
	

}
?>