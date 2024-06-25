<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('comunes/head.php'); ?>
    <title>Reservar Bienes</title>
</head>

<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php'); ?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarSuperior.php'); ?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Reservar Bienes<span>.</span></h1>
                </div>
                <div class="contentBusqueda">
                    <div id="tablapersona_filter" class="dataTables_filter buscador">
                        <form method="post" id="f" autocomplete="off">
                            <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                            <input id="busqueda" name="busqueda" type="text" placeholder="Buscar...">
                            <i class="fi fi-br-search lupa"></i>
                        </form>
                    </div>
                    <div class="botonBox">
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-user-add iconB'></i>Nueva Reservación</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Numero de Reservación</th>
                                    <th class="th">Fecha</th>
                                    <th class="th">Hora</th>
                                    <th class="th">Cantidad de personas</th>
                                    <th class="th">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTabla" id="resultadoconsulta">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require_once("comunes/modal.php"); ?>
    <script>
        let titulo = document.querySelectorAll(".titulo")[0];
        let botonNav = document.querySelectorAll(".botonNav")[5];
        let botonHijo = document.querySelectorAll(".boton-nav-hijo")[3];
        if ($(titulo).text() == "Reservar Bienes.") {
            botonHijo.classList.toggle("botonNavUsuario");
        }
    </script>
</body>

</html>