<html> 
<?php require_once("comunes/encabezado.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">


  <title> Ordenes </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/SIESEDIS1.png" rel="icon">
  <link href="assets/img/SIESEDIS1.png" rel="apple-touch-icon">

  <?php require_once("comunes/template.php"); ?>
  <body id="hero2" class="animation img-fluid">
  <section id="hero2" class=" animation img-fluid">

<div class="p-2 text-white">
<div class="" style="--bs-bg-opacity: .10;">
<?php require_once("comunes/boostrap.php"); ?>

<?php require_once('comunes/menu pest.php'); ?>
<section>
 
<div class="container"><!-- contenedor de estilo encapsulado-->
<div class="bg-danger" style="border-radius: 20px; --bs-bg-opacity: .10;">
	<div class="container"><!-- todo el contenido ira dentro de esta etiqueta-->
	
<div class="row">
	<center><h2 class="h2-title text-white">Orden de Servicio</h2><br></center>
	<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
		<div class="row mt-3">
		    
		<div class="d-flex justify-content-center">
  	<div class="btn-group me-3" role="group" aria-label="Botones">
   		
		<button type="button" class="btn btn-danger" id="incluir" >Registrar Orden</button>
    	
	</div>
		</div>
			
		</div>
	
	<div class="container">
	<form class="d-flex">
                 <div style="width:60%; overflow-y: auto; display: flex; margin: 10px auto">
                    <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscador">
                    <hr>
                    
                  </form>
				  </div>
	   <div class="table-responsive">
		<table class="table table-striped table-hover table_id" id="tablausuarios" style="width:100%; min-width: 500px;">
			<thead>
			  <tr>
				<th><center>Descripcion</center></th>
				<th><center>Fecha de orden</center></th>
				<th><center>Estatus</center></th>
				<th><center>Trabajador</center></th>
				<th><center>Acciones</center></th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			  
			  
			</tbody>
	   </table>
	    </div>
	   </div>
	  </div>
     </div>
    </div>
  </div><div class=" text-center text-white"> Copyright SIESDIS <strong><a href="diseñadores"><span>NJY</a></span></strong>. All Rights Reserved
   
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-danger">
	  <h5 class="modal-title" >Formulario de Orden Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content text-dark">
		<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
			<div class="row mb-3">
				
					<div class="col-md-8">
					   <label for="descripcion">Descripcion</label>
					   <input class="form-control" type="text" id="descripcion" />
					   <span id="sdescripcion"></span>
					</div>
				</div>
				
				<div class="row mb-3">
						
					<div class="col-md-4">
					   <label for="fechadeorden">Fecha de Orden</label>
					   <input class="form-control" type="date" id="fechadeorden" name="fechadeorden" />
					   <span id="sfechadeorden"></span>
					</div>
					<div class="col-md-8">
					<label for="estatus">Estatus</label>
					   <select class="form-control" id="estatus">
					        <option value="ENVIADA">Enviada</option>
							<option value="EN PROCESO">En Proceso</option>
							<option value="PENDIENTE">Pendiente</option>
							<option value="CANCELADO">Cancelado</option>
					   </select>
					</div>
				</div>
				
				<div class="row mb-3">
                    <div class="col-md-8">
					<label for="idtrabajador">Trabajador</label>
					   <select class="form-control" id="idtrabajador">
							
					   </select>
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>

				<div class="row mt-3 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-danger" 
						   id="proceso" ></button>
					</div>
				</div>
			</div>	
			</form>
		</div> <!-- fin de container -->
		<!--
		
		-->
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</section>
<!--fin de seccion modal-->
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/orden.js"></script>
<?php require_once("comunes/jqueryjs.php"); ?>
<script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
	<script src="librerias/bootstrap4/popper.min.js"></script>
	<script src="librerias/bootstrap4/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/buscadorFunc.js"></script>
</body>
</html>