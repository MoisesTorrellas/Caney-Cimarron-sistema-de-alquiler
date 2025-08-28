<?php
require_once('modelo/datos.php');

class reservarBien extends datos{

    private $numReservacion;
    private $cantPersonaReservacion;
    private $fechaReservacion;
    private $horaReservacion;
	private $cedulaCliente;
    private $codBien;
    private $busqueda;
	private $busquedaCliente;

    function set_numReservacion($valor){
		$this->numReservacion = $valor;
	}
	
	function set_cantPersonaReservacion($valor){
		$this->cantPersonaReservacion = $valor;
	}
	
	function set_fechaReservacion($valor){
		$this->fechaReservacion = $valor;
	}

    function set_horaReservacion($valor){
		$this->horaReservacion = $valor;
	}

	function set_cedulaCliente($valor){
		$this->cedulaCliente = $valor;
	}
	
	function set_codBien($valor){
		$this->codBien = $valor;
	}
	
	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
	function set_busquedaCliente($valor){
		$this->busquedaCliente = $valor;
	}

    /*----------------------------GET----------------------------*/

    function get_numReservacion(){
		return $this->numReservacion;
	}
	
	function get_cantPersonaReservacion(){
		return $this->cantPersonaReservacion;
	}
	
	function get_fechaReservacion(){
		return $this->fechaReservacion;
	}

    function get_horaReservacion(){
	return $this->horaReservacion;
	}

	function get_cedulaCliente(){
		return $this->cedulaCliente;
		}
	
	function get_codBien(){
		return $this->codBien;
	}
	
	function get_busqueda(){
		return $this->busqueda;
	}
	
	function get_busquedaCliente(){
		return $this->busquedaCliente;
	}

    function incluir(){
		$r = array();
		
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into asignarbienreservacion (
						numReservacion,
                        cantPersonaReservacion,
                        fechaReservacion,
                        horaReservacion,
						cedulaCliente,
                        codBien
						)
						Values(
						$this->numReservacion,
						'$this->cantPersonaReservacion',
						$this->fechaReservacion,
						$this->horaReservacion,
						'$this->cedulaCliente',
						$this->codBien
						);");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Reservacion Registrada';
			} catch(Exception $e) {
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

}

?>