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
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-time-add iconB'></i>Nueva Reservación</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Numero de Reservación</th>
                                    <th class="th">Cedula Cliente</th>
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
    <div class="modal-contenedor">
        <div class="modal2 modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal" id="titleModal"></h2>
                    <button type="button" class="closes">X</button>
                </div>
                <div class="form-contenedor">
                    <form method="post" id="f" autocomplete="off">
                        <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                        <div class="row">
                        <div class="form-box form-box1">
                                <input type="text" name="numReservacion" id="numReservacion" required>
                                <label class="form-name">Numero de Reservacion</label>
                                <div class="span">
                                    <span id="snumReservacion" class=""></span>
                                </div>
                            </div>
                            <div class="form-box form-box1">
                                <input type="text" name="cantPersonaReservacion" id="cantPersonaReservacion" required>
                                <label class="form-name">Cantidad de Personas</label>
                                <div class="span">
                                    <span id="scantPersonaReservacion" class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box form-box1">
                                <label class="form-name form-name-modi">Fecha</label>
                                <input type="date" name="fechaReservacion" id="fechaReservacion" required>
                                <div class="span">
                                    <span id="sfechaReservacion" class=""></span>
                                </div>
                            </div>
                            <div class="form-box form-box1">
                                <label class="form-name form-name-modi">Hora</label>
                                <input type="time" name="horaReservacion" id="horaReservacion" required>
                                <div class="span">
                                    <span id="shoraReservacion" class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box form-box1">
                                <input type="text" id="nombreCliente" name="nombreCliente" required>
                                <label class="form-name">Cliente</label>
                                <input type="hidden" id="cedulaCliente" name="cedulaCliente"  required>
                                <button type="button" class="botonF" id="modalCliente" name="modalCliente">Asignar Cliente</button>
                            </div>
                            <div class="form-box form-box1">
                                <input type="text" id="nomBien" name="nomBien">
                                <label class="form-name">Bienes</label>
                                <input type="text" id="codBien" name="codBien" style="display:none">
                                <button type="button" class="botonF" id="modalBien" name="modalBien">Asignar Bienes</button>
                            </div>
                        </div>
                    
                        <div class="row">
                            <button type="button" class="botonF" id="proceso"><i class="" id="icon"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-contenedorCliente">
        <div class="modalCliente modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal" id="titleModalCliente"></h2>
                    <div id="tablapersona_filter" class="dataTables_filter buscador">
                        <form method="post" id="f" autocomplete="off">
                            <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                            <input id="busquedaCliente" name="busquedaCliente" type="text" placeholder="Buscar...">
                            <i class="fi fi-br-search lupa"></i>
                        </form>
                    </div>
                    <button type="button" class="closes" id="closesCliente">X</button>
                </div>
                <div class="form-contenedor">
                    <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Cedula</th>
                                    <th class="th">Nombre y Apellido</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTabla" id="consultaCliente">

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-contenedorBien">
        <div class="modalBien modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal" id="titleModalBien"></h2>
                    <div id="tablapersona_filter" class="dataTables_filter buscador">
                        <form method="post" id="f" autocomplete="off">
                            <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                            <input id="busqueda" name="busqueda" type="text" placeholder="Buscar...">
                            <i class="fi fi-br-search lupa"></i>
                        </form>
                    </div>
                    <button type="button" class="closes" id="closesBien">X</button>
                </div>
                <div class="form-contenedor">
                    <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Codigo</th>
                                    <th class="th">Nombre</th>
                                    <th class="th">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTabla" id="consultaBien">

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("comunes/modal.php"); ?>
    <script src="js/reservarBien.js"></script>


    <?php require_once("comunes/modal.php"); ?>
</body>

</html>