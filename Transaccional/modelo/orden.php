<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class Orden extends datos{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	
	private $descripcion; //recuerden que en php, las variables no tienen tipo predefinido
	private $fechadeorden;
	private $estatus;
	private $idtrabajador;
	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	
	
	function set_descripcion($valor){
		$this->descripcion = $valor;
	}
	
	function set_fechadeorden($valor){
		$this->fechadeorden = $valor;
	}

	function set_estatus($valor){
		$this->estatus = $valor;
	}
	
	function set_idtrabajador($valor){
		$this->idtrabajador = $valor;
	}
	
	//ahora la misma cosa pero para leer, es decir get
	
	function get_descripcion(){
		return $this->descripcion;
	}
	
	function get_fechadeorden(){
		return $this->fechadeorden;
	}
	
	function get_estatus(){
		return $this->estatus;
	}
	
	function get_idtrabajador(){
		return $this->idtrabajador;
	}
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if(!$this->existe($this->descripcion)){
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into orden(
						descripcion,
						fechadeorden,
						estatus,
						idtrabajador
						)
						Values(
						'$this->descripcion',
						'$this->fechadeorden',
						'$this->estatus',
						'$this->idtrabajador'
						)");
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la descripcion';
		}
		return $r;
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->descripcion)){
			try {
					$co->query("Update orden set 
						descripcion = '$this->descripcion',
						fechadeorden = '$this->fechadeorden',
						estatus = '$this->estatus',
						idtrabajador = '$this->idtrabajador'
						where
						descripcion = '$this->descripcion'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Registro Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Descripcion no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->descripcion)){
			try {
					$co->query("delete from orden 
						where
						descripcion = '$this->descripcion'
						");
						$r['resultado'] = 'eliminar';
						$r['mensaje'] =  'Registro Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'error';
			$r['mensaje'] =  'Registro No Encontrado';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("SELECT o.descripcion, o.fechadeorden, o.estatus, t.nombre as idtrabajador  FROM orden AS o LEFT JOIN trabajador as t on t.idtrabajador = o.idtrabajador");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr>";
					    
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['descripcion'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['fechadeorden'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['estatus'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['idtrabajador'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						$respuesta = $respuesta."<span><button type='button' class='btn btn-secondary
						fas fa-edit w-100 small-width  mt-2' onclick='pone(this,0)'
						 style='width:10px;height:30px'></button>";"</span>";
						$respuesta = $respuesta."<button type='button'
						class='btn btn-danger fas fa-trash w-100 small-width mt-2' 
						onclick='pone(this,1)' style='width:10px;height:30px;'
						></button>";
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
	
	function consultartrabajador(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from trabajador");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
						$respuesta = $respuesta."<option value='".$r['idtrabajador']."'>";
							$respuesta = $respuesta.$r['nombre'];
						$respuesta = $respuesta."</option>";
			
				}
				
			    $r['resultado'] = 'consultartrabajador';
				$r['mensaje'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultartrabajador';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	private function existe($descripcion){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from orden where descripcion='$descripcion'");
			
			
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
	
	
	
	function obtienefecha(){
		$r = array();
		
			  $f = date('Y-m-d');
		      $f1 = strtotime ('now' , strtotime($f)); 
		      $f1 = date ('Y-m-d',$f1);
			  $r['resultado'] = 'obtienefecha';
			  $r['mensaje'] =  $f1;
		
		return $r;
	}

	
	
	
}
?>