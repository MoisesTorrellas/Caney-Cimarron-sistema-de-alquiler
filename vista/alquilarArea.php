<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('comunes/head.php'); ?>
    <title>Alquilar Area</title>
</head>

<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php'); ?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarSuperior.php'); ?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Alquilar Area<span>.</span></h1>
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
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-user-add iconB'></i>Nuevo Alquier</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Numero de Alquiler</th>
                                    <th class="th">Codigo de Area</th>
                                    <th class="th">Cedula del Cliente</th>
                                    <th class="th">Cantidad de personas</th>
                                    <th class="th">Fecha</th>
                                    <th class="th">Monto</th>
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
                            <div class="form-box">
                                <input type="text" name="numAlquiler" id="numAlquiler" required>
                                <label class="form-name">Numero de Alquiler</label>
                                <div class="span">
                                    <span id="snumAlquiler" class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box">
                                <label class="form-name form-name-modi">Fecha</label>
                                <input type="date" name="fechaAlquiler" id="fechaAlquiler" required>
                                <div class="span">
                                    <span id="sfechaAlquiler" class=""></span>
                                </div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="cantPersonaAlquiler" id="cantPersonaAlquiler" required>
                                <label class="form-name">Cantidad de Personas</label>
                                <div class="span">
                                    <span id="scantPersonaAlquiler" class=""></span>
                                </div>
                            </div>
                            <div class="form-box">
                            <input type="text" name="montoAlquiler" id="montoAlquiler" required>
                                <label class="form-name">Monto</label>
                                <div class="span">
                                    <span id="smontoAlquiler" class=""></span>
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
                            <div class="form-box  form-box1">
                                <input type="text" id="nombreArea" name="nombreArea" required>
                                <label class="form-name">Area</label>
                                <input type="hidden" id="numArea" name="numArea"  required>
                                <button type="button" class="botonF" id="modalArea" name="modalArea">Asignar Area</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box form-box1">
                                <input type="text" id="nomBien" name="nomBien">
                                <label class="form-name">Bienes</label>
                                <input type="text" id="codBien" name="codBien" style="display:none">
                                <button type="button" class="botonF" id="modalBien" name="modalBien">Asignar Bienes</button>
                            </div>
                            <div class="form-box form-box1">
                                <input type="text" id="nombreTrabajador" name="nombreTrabajador">
                                <label class="form-name">Trabajadores</label>
                                <input type="text" id="cedulaTrabajador" name="cedulaTrabajador" style="display:none">
                                <button type="button" class="botonF" id="modalTrabajador" name="modalTrabajador">Asignar Trabajadores</button>
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
    <div class="modal-contenedorArea">
        <div class="modalArea modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal" id="titleModalArea"></h2>
                    <button type="button" class="closes" id="closesArea">X</button>
                </div>
                <div class="form-contenedor">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Numero</th>
                                    <th class="th">Nombre de Area</th>
                                    <th class="th">Horario</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTabla" id="consultaArea">

                            </tbody>
                        </table>
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
    <div class="modal-contenedorTrabajador">
        <div class="modalTrabajador modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal" id="titleModalTrabajador"></h2>
                    <div id="tablapersona_filter" class="dataTables_filter buscador">
                        <form method="post" id="f" autocomplete="off">
                            <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                            <input id="busqueda" name="busqueda" type="text" placeholder="Buscar...">
                            <i class="fi fi-br-search lupa"></i>
                        </form>
                    </div>
                    <button type="button" class="closes" id="closesTrabajador">X</button>
                </div>
                <div class="form-contenedor">
                    <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Cedula</th>
                                    <th class="th">Nombre y Apellido</th>
                                    <th class="th">Cargo</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTabla" id="consultaTrabajador">

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("comunes/modal.php"); ?>
    <script src="js/alquilarArea.js"></script>

</body>

</html>