<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('comunes/head.php');?>
    <title>Generar Reporte.</title>
</head>
<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php');?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarsuperior.php');?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Generar Reporte<span>.</span></h1>
                </div>
            </div>
        </div>
    </div>
    <script>
        let titulo= document.querySelectorAll(".titulo")[0];
        let botonNav= document.querySelectorAll(".botonNav")[5];
        let botonHijo= document.querySelectorAll(".boton-nav-hijo")[0];
        if($(titulo).text()=="Generar Reporte."){
		    botonNav.classList.toggle("botonNavUsuario");
	    }
    </script>
    <script src=""></script>
</body>
</html>