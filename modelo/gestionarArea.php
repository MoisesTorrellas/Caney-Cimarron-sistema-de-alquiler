<?php

require_once('modelo/datos.php');

class gestionarArea extends datos{

    private $numArea;
	private $nombreArea;
    private $horarioArea;
    private $busqueda;
	
	function set_numArea($valor){
		$this->numArea = $valor;
	}
	function set_nombreArea($valor){
		$this->nombreArea = $valor;
	}
	
	function set_horarioArea($valor){
		$this->horarioArea = $valor;
	}

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
/* ------------------------GET------------------------ */
	function get_numArea(){
		return $this->numArea;
	}
	
	function get_nombrearea(){
		return $this->nombreArea;
	}
	
	function get_horarioArea(){
		return $this->horarioArea;
	}

	function get_busqueda(){
		return $this->busqueda;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeNumero($this->numArea) ){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into area (
						numArea,
						nombreArea,
						horarioArea
						)
						Values(
						'$this->numArea',
						'$this->nombreArea',
						'$this->horarioArea'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Area Registrada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe un Area con ese numero';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeNumero($this->numArea)){
			try {
					$co->query("Update area set 
                    numArea = '$this->numArea',
                    nombreArea = '$this->nombreArea',
                    horarioArea = '$this->horarioArea'
						where
						numArea = '$this->numArea'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Area Modificada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Area no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeNumero($this->numArea)){
			try {
					$co->query("delete from area 
						where
						numArea = '$this->numArea'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Area Eliminada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe area';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from area where numArea like '%$this->busqueda%' 
									or nombreArea like '%$this->busqueda%'
									or horarioArea like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td' data-label='Numero de Area'>";
							$respuesta = $respuesta.$r['numArea'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre de Area'>";
							$respuesta = $respuesta.$r['nombreArea'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Horario'>";
							$respuesta = $respuesta.$r['horarioArea'];
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
	
	
	private function existeNumero($numArea){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from area where numArea='$numArea'");
			
			
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