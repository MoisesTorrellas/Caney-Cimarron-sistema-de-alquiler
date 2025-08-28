<?php

require_once('modelo/datos.php');

class gestionarCargo extends datos{

	
	private $codigoCargo;
    private $nombreCargo;
	private $busqueda;
	
	function set_codigoCargo($valor){
		$this->codigoCargo = $valor;
	}
	
	function set_nombreCargo($valor){
		$this->nombreCargo = $valor;
	}

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}


	
/* ------------------------GET------------------------ */
	function get_codigoCargo(){
		return $this->codigoCargo;
	}
	
	function get_nombreCargo(){
		return $this->nombreCargo;
	}

	function get_busqueda(){
		return $this->busqueda;
	}
	
	function incluir(){
		$r = array();
		if(!$this->existeCodigo($this->codigoCargo) && !$this->existeNombre($this->nombreCargo)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into cargo (
						codigoCargo,
						nombreCargo
						)
						Values(
						'$this->codigoCargo',
						'$this->nombreCargo'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Cargo Registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else if($this->existeCodigo($this->codigoCargo)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el codigo';
		}
		else if($this->existeNombre($this->nombreCargo)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el Cargo';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeCodigo($this->codigoCargo)){
			try {
					$co->query("Update cargo set 
                    codigoCargo = '$this->codigoCargo',
                    nombreCargo = '$this->nombreCargo'
						where
						codigoCargo = '$this->codigoCargo'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Cargo Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Cargo no registrado';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeCodigo($this->codigoCargo)){
			try {
					$co->query("delete from cargo 
						where
						codigoCargo = '$this->codigoCargo'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Cargo Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Cargo';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from cargo where codigoCargo like '%$this->busqueda%' 
									or nombreCargo like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td'data-label='Codigo del Cargo'>";
							$respuesta = $respuesta.$r['codigoCargo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre del Cargo'>";
							$respuesta = $respuesta.$r['nombreCargo'];
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
	
	
	private function existeCodigo($codigoCargo){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from cargo where codigoCargo='$codigoCargo'");
			
			
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
	private function existeNombre($nombreCargo){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from cargo where nombreCargo='$nombreCargo'");
			
			
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
 