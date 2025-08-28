<?php
require_once('modelo/datos.php');

class alquilarArea extends datos{

    private $numAlquiler;
    private $numArea;
    private $cedulaCliente;
    private $codBien;
	private $cedulaTrabajador;
    private $cantPersonaAlquiler;
    private $fechaAlquiler;
    private $montoAlquiler;
    private $busqueda;
	private $busquedaCliente;
	private $cantidadBienAlquiler;

    function set_numAlquiler($valor){
		$this->numAlquiler = $valor;
	}
	
	function set_numArea($valor){
		$this->numArea = $valor;
	}
	
	function set_cedulaCliente($valor){
		$this->cedulaCliente = $valor;
	}

    function set_codBien($valor){
		$this->codBien = $valor;
	}

	function set_cedulaTrabajador($valor){
		$this->cedulaTrabajador = $valor;
	}
	
	function set_cantPersonaAlquiler($valor){
		$this->cantPersonaAlquiler = $valor;
	}
	
	function set_fechaAlquiler($valor){
		$this->fechaAlquiler = $valor;
	}
	
	function set_montoAlquiler($valor){
		$this->montoAlquiler = $valor;
	}
    

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}

	function set_busquedaCliente($valor){
		$this->busquedaCliente = $valor;
	}
	function set_cantidadBienAlquiler($valor){
		$this->cantidadBienAlquiler = $valor;
	}

	/*----------------------------GET----------------------------*/

    function get_numAlquiler(){
		return $this->numAlquiler;
	}
	
	function get_numArea(){
		return $this->numArea;
	}
	
	function get_cedulaCliente(){
		return $this->cedulaCliente;
	}

    function get_codBien(){
	return $this->codBien;
	}

	function get_cedulaTrabajador(){
		return $this->cedulaTrabajador;
		}
	
	function get_cantPersonaAlquiler(){
		return $this->cantPersonaAlquiler;
	}
	
	function get_fechaAlquiler(){
		return $this->fechaAlquiler;
	}
	
	function get_montoAlquiler(){
		return $this->montoAlquiler;
	}

	function get_busqueda(){
		return $this->busqueda;
	}

	function get_busquedaCliente(){
		return $this->busquedaCliente;
	}
	function get_cantidadBienAlquiler(){
		return $this->cantidadBienAlquiler;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeNumero($this->numAlquiler) && !$this->existeFecha($this->fechaAlquiler)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into alquiler (
						numAlquiler,
						fechaAlquiler,
						cantPersonaAlquiler,
						montoAlquiler,
                        cedulaCliente
						)
						Values(
						$this->numAlquiler,
						'$this->fechaAlquiler',
						'$this->cantPersonaAlquiler',
						'$this->montoAlquiler',
						'$this->cedulaCliente'
						);
                        Insert into asignararea (
						numArea,
						numAlquiler
						)
						Values(
                        $this->numArea,
						$this->numAlquiler
						);");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Alquiler Registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
                $r['mensaje'] =  $e->getMessage();
			}
		}
		else if($this->existeFecha($this->fechaAlquiler)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe un alquiler con esa Fecha';
		}
		else if($this->existeNumero($this->numAlquiler)){
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe un alquiler con ese numero';
		}
		return $r;
	}

	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existeNumero($this->numAlquiler)){
			try {
					$co->query("delete from alquiler 
						where
						numAlquiler = '$this->numAlquiler'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Alquiler Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Alquiler';
		}
		return $r;
	}

	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query('SELECT alquiler.*, cliente.nombreCliente, cliente.apellidoCliente, area.nombreArea FROM alquiler INNER JOIN cliente ON alquiler.cedulaCliente = cliente.cedulaCliente INNER JOIN asignararea ON alquiler.numAlquiler = asignararea.numAlquiler INNER JOIN area ON asignararea.numArea = area.numArea ORDER BY alquiler.numAlquiler ASC');

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td'data-label='Numero de Alquiler'>";
							$respuesta = $respuesta.$r['numAlquiler'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Area'>";
							$respuesta = $respuesta.$r['nombreArea'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Cliente'>";
							$respuesta = $respuesta.$r['nombreCliente'].' '.$r['apellidoCliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Cantidad de Personas'>";
							$respuesta = $respuesta.$r['cantPersonaAlquiler'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Fecha'>";
							$respuesta = $respuesta.$r['fechaAlquiler'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td'data-label='Monto'>";
							$respuesta = $respuesta.$r['montoAlquiler'];
						$respuesta = $respuesta."</td>";;
						$respuesta = $respuesta."<td class='td tbBoton' >";
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

	function consultaCliente(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from cliente where cedulaCliente like '%$this->busquedaCliente%' 
									or nombreCliente like '%$this->busquedaCliente%'
									or apellidoCliente like '%$this->busquedaCliente%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr' style='cursor:pointer' onclick='colocaCliente(this);'>";
						$respuesta = $respuesta."<td class='td' data-label='Cedula'>";
							$respuesta = $respuesta.$r['cedulaCliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre y Apellido'>";
							$respuesta = $respuesta.$r['nombreCliente'].' '.$r['apellidoCliente'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}  
				
			    $r['resultado'] = 'consultaCliente';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultaCliente';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	

	function consultaArea(){
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
					
					$respuesta = $respuesta."<tr class='tr' style='cursor:pointer' onclick='colocaArea(this);'>";
						$respuesta = $respuesta."<td class='td' data-label='Numero de Area'>";
							$respuesta = $respuesta.$r['numArea'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre de Area'>";
							$respuesta = $respuesta.$r['nombreArea'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Horario'>";
							$respuesta = $respuesta.$r['horarioArea'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}  
				
			    $r['resultado'] = 'consultaArea';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultaArea';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	function consultaBien(){
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
					
					$respuesta = $respuesta."<tr class='tr' style='cursor:pointer' onclick='colocaBien(this);'>";
						$respuesta = $respuesta."<td class='td' data-label='Codigo de Bien'>";
							$respuesta = $respuesta.$r['codBien'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre de Bien'>";
							$respuesta = $respuesta.$r['nomBien'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Cantidad'>";
							$respuesta = $respuesta.$r['cantBien'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}  
				
			    $r['resultado'] = 'consultaBien';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultaBien';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	function consultaTrabajador(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado= $co->query("Select * from trabajador where cedulaTrabajador like '%$this->busqueda%' 
									or nombreTrabajador like '%$this->busqueda%'
									or apellidoTrabajador like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr' style='cursor:pointer' onclick='colocaTrabajador(this);'>";
						$respuesta = $respuesta."<td class='td' data-label='Cedula'>";
							$respuesta = $respuesta.$r['cedulaTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre y Apellido'>";
							$respuesta = $respuesta.$r['nombreTrabajador'].' '.$r['apellidoTrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre y Apellido'>";
							$respuesta = $respuesta.$r['cargoTrabajador'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}  
				
			    $r['resultado'] = 'consultaTrabajador';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultaTrabajador';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	private function existeNumero($numAlquiler){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from alquiler where numAlquiler='$numAlquiler'");
			
			
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
	private function existeFecha($fechaAlquiler){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from alquiler where fechaAlquiler='$fechaAlquiler'");
			
			
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