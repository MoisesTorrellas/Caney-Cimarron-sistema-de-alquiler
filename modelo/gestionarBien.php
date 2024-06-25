<?php

require_once('modelo/datos.php');

class gestionarBien extends datos{
	
    private $codBien;
	private $nomBien;
    private $cantBien;
    private $busqueda;
	
	function set_codBien($valor){
		$this->codBien = $valor;
	}
	function set_nomBien($valor){
		$this->nomBien = $valor;
	}
	
	function set_cantBien($valor){
		$this->cantBien = $valor;
	}

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
/* ------------------------GET------------------------ */
	function get_codBien(){
		return $this->codBien;
	}
	
	function get_nomBien(){
		return $this->nomBien;
	}
	
	function get_cantBien(){
		return $this->cantBien;
	}

	function get_busqueda(){
		return $this->busqueda;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeNumero($this->codBien) ){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into bienes (
						codBien,
						nomBien,
						cantBien
						)
						Values(
						'$this->codBien',
						'$this->nomBien',
						'$this->cantBien'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Bienes Registrados';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existen bienes con ese codigo';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeNumero($this->codBien)){
			try {
					$co->query("Update bienes set 
                    codBien = '$this->codBien',
                    nomBien = '$this->nomBien',
                    cantBien = '$this->cantBien'
						where
						codBien = '$this->codBien'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Bienes Modificados';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Bienes no Registrados';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeNumero($this->codBien)){
			try {
					$co->query("delete from bienes 
						where
						codBien = '$this->codBien'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Bienes Eliminados';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existen esos bienes';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from bienes where codBien like '%$this->busqueda%' 
									or nomBien like '%$this->busqueda%'
									or cantBien like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td' data-label='Codigo de Bien'>";
							$respuesta = $respuesta.$r['codBien'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre de Bien'>";
							$respuesta = $respuesta.$r['nomBien'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Cantidad'>";
							$respuesta = $respuesta.$r['cantBien'];
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
	
	
	private function existeNumero($codBien){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from bienes where codBien='$codBien'");
			
			
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