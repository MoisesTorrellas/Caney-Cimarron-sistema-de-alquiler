<?php

require_once('modelo/datos.php');
class gestionarTrabajador extends datos{

	
	private $cedulaTrabajador;
    private $nombreTrabajador;
    private $apellidoTrabajador;
    private $direccionTrabajador;
    private $telefonoTrabajador;
    private $cargoTrabajador;
    private $busqueda;
	
	function set_cedulaTrabajador($valor){
		$this->cedulaTrabajador = $valor;
	}
	
	function set_nombreTrabajador($valor){
		$this->nombreTrabajador = $valor;
	}
	
	function set_apellidoTrabajador($valor){
		$this->apellidoTrabajador = $valor;
	}
	
	
	function set_direccionTrabajador($valor){
        $this->direccionTrabajador = $valor;
	}
	
    function set_telefonoTrabajador($valor){
        $this->telefonoTrabajador = $valor;
    }

    function set_cargoTrabajador($valor){
		$this->cargoTrabajador = $valor;
	}

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
/* ------------------------GET------------------------ */
	function get_cedulaTrabajador(){
		return $this->cedulaTrabajador;
	}
	
	function get_nombreTrabajador(){
		return $this->nombreTrabajador;
	}
	
	function get_apellidoTrabajador(){
		return $this->apellidoTrabajador;
	}
	
	
	function get_direccionTrabajador(){
        return $this->direccionTrabajador;
	}

    function get_telefonoTrabajador(){
        return $this->telefonoTrabajador;
    }
	
    function get_cargoTrabajador(){
		return $this->cargoTrabajador;
	}

	function get_busqueda(){
		return $this->busqueda;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeCedula($this->cedulaTrabajador) ){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into trabajador (
						cedulaTrabajador,
						nombreTrabajador,
						apellidoTrabajador,
						direccionTrabajador,
						telefonoTrabajador,
						cargoTrabajador
						)
						Values(
						'$this->cedulaTrabajador',
						'$this->nombreTrabajador',
						'$this->apellidoTrabajador',
                        '$this->direccionTrabajador',
						'$this->telefonoTrabajador',	
						'$this->cargoTrabajador'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Trabajador Registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeCedula($this->cedulaTrabajador)){
			try {
					$co->query("Update trabajador set 
                    cedulaTrabajador = '$this->cedulaTrabajador',
                    nombreTrabajador = '$this->nombreTrabajador',
                    apellidoTrabajador = '$this->apellidoTrabajador',
                    direccionTrabajador = '$this->direccionTrabajador',
                    telefonoTrabajador = '$this->telefonoTrabajador',
						cargoTrabajador = '$this->cargoTrabajador'
						where
						cedulaTrabajador = '$this->cedulaTrabajador'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Trabajador Modificado';
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
		if($this->existeCedula($this->cedulaTrabajador)){
			try {
					$co->query("delete from Trabajador 
						where
						cedulaTrabajador = '$this->cedulaTrabajador'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Trabajador Eliminado';
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
			
			$resultado= $co->query("Select * from trabajador where cedulaTrabajador like '%$this->busqueda%' 
									or nombreTrabajador like '%$this->busqueda%'
									or apellidoTrabajador like '%$this->busqueda%'
									or direccionTrabajador like '%$this->busqueda%'
									or telefonoTrabajador like '%$this->busqueda%'
									or cargoTrabajador like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td' data-label='Cedula'>";
							$respuesta = $respuesta.$r['cedulaTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre'>";
							$respuesta = $respuesta.$r['nombreTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Apellido'>";
							$respuesta = $respuesta.$r['apellidoTrabajador'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td class='td' data-label='Direccion'>";
                            $respuesta = $respuesta.$r['direccionTrabajador'];
                        $respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Telefono'>";
							$respuesta = $respuesta.$r['telefonoTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Cargo'>";
							$respuesta = $respuesta.$r['cargoTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td tbBoton'>";
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
	
	
	private function existeCedula($cedulaTrabajador){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from trabajador where cedulaTrabajador='$cedulaTrabajador'");
			
			
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