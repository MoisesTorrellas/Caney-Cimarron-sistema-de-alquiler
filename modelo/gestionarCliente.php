<?php

require_once('modelo/datos.php');

class gestionarCliente extends datos{
	
	private $cedulaCliente;
    private $nombreCliente;
    private $apellidoCliente;
    private $direccionCliente;
    private $telefonoCliente;
    private $busqueda;
	
	function set_cedulaCliente($valor){
		$this->cedulaCliente = $valor;
	}
	
	function set_nombreCliente($valor){
		$this->nombreCliente = $valor;
	}
	
	function set_apellidoCliente($valor){
		$this->apellidoCliente = $valor;
	}
	
	
	function set_direccionCliente($valor){
        $this->direccionCliente = $valor;
	}
	
    function set_telefonoCliente($valor){
        $this->telefonoCliente = $valor;
    }

	function set_busqueda($valor){
		$this->busqueda = $valor;
	}
	
/* ------------------------GET------------------------ */
	function get_cedulaCliente(){
		return $this->cedulaCliente;
	}
	
	function get_nombreCliente(){
		return $this->nombreCliente;
	}
	
	function get_apellidoCliente(){
		return $this->apellidoCliente;
	}
	
	
	function get_direccionCliente(){
        return $this->direccionCliente;
	}

    function get_telefonoCliente(){
        return $this->telefonoCliente;
    }
	
	function get_busqueda(){
		return $this->busqueda;
	}
	
	
	function incluir(){
		$r = array();
		if(!$this->existeCedula($this->cedulaCliente) ){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("Insert into cliente (
						cedulaCliente,
						nombreCliente,
						apellidoCliente,
						direccionCliente,
						telefonoCliente
						)
						Values(
						'$this->cedulaCliente',
						'$this->nombreCliente',
						'$this->apellidoCliente',
                        '$this->direccionCliente',
						'$this->telefonoCliente'
						)");
						$r['resultado'] = 'incluir';
                        $r['mensaje'] =  'Cliente Registrado';
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
		if($this->existeCedula($this->cedulaCliente)){
			try {
					$co->query("Update cliente set 
                    cedulaCliente = '$this->cedulaCliente',
                    nombreCliente = '$this->nombreCliente',
                    apellidoCliente = '$this->apellidoCliente',
                    direccionCliente = '$this->direccionCliente',
                    telefonoCliente = '$this->telefonoCliente'
						where
						cedulaCliente = '$this->cedulaCliente'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Cliente Modificado';
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
		if($this->existeCedula($this->cedulaCliente)){
			try {
					$co->query("delete from cliente
						where
						cedulaCliente = '$this->cedulaCliente'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Cliente Eliminado';
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
			
			$resultado= $co->query("Select * from Cliente where cedulaCliente like '%$this->busqueda%' 
									or nombreCliente like '%$this->busqueda%'
									or apellidoCliente like '%$this->busqueda%'
									or direccionCliente like '%$this->busqueda%'
									or telefonoCliente like '%$this->busqueda%'");

			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					
					$respuesta = $respuesta."<tr class='tr'>";
						$respuesta = $respuesta."<td class='td' data-label='Cedula'>";
							$respuesta = $respuesta.$r['cedulaCliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Nombre'>";
							$respuesta = $respuesta.$r['nombreCliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Apellido'>";
							$respuesta = $respuesta.$r['apellidoCliente'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td class='td' data-label='Direccion'>";
                            $respuesta = $respuesta.$r['direccionCliente'];
                        $respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td class='td' data-label='Telefono'>";
							$respuesta = $respuesta.$r['telefonoCliente'];
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
	
	
	private function existeCedula($cedulaCliente){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from cliente where cedulaCliente='$cedulaCliente'");
			
			
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