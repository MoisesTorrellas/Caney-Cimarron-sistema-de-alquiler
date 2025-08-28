<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('comunes/head.php'); ?>
    <title>Gestionar Trabajador.</title>
</head>

<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php'); ?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarSuperior.php'); ?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Gestionar Trabajador<span>.</span></h1>
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
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-employee-man iconB'></i> Nuevo Trabajador</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Cedula</th>
                                    <th class="th">Nombre</th>
                                    <th class="th">Apellido</th>
                                    <th class="th">Direccion</th>
                                    <th class="th">Telefono</th>
                                    <th class="th">Cargo</th>
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
                                <input type="text" name="cedulaTrabajador" id="cedulaTrabajador" required>
                                <label class="form-name">Cedula</label>
                                <div class="span">
                                    <span id="scedulaTrabajador" class=""></span>
                                </div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="nombreTrabajador" id="nombreTrabajador" required>
                                <label class="form-name">Nombre</label>
                                <div class="span"><span id="snombreTrabajador" class=""></span></div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="apellidoTrabajador" id="apellidoTrabajador" required>
                                <label class="form-name">Apellido</label>
                                <div class="span"><span id="sapellidoTrabajador" class=""></span></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-box">
                                <input type="text" name="direccionTrabajador" id="direccionTrabajador" required>
                                <label class="form-name">Direccion</label>
                                <div class="span"><span id="sdireccionTrabajador" class=""></span></div>
                            </div>

                            <div class="form-box">
                                <input type="text" name="telefonoTrabajador" id="telefonoTrabajador" required>
                                <label class="form-name">Telefono</label>
                                <div class="span"><span id="stelefonoTrabajador" class=""></span></div>
                            </div>

                            <div class="form-box">
                                <label class="form-name form-name-modi"> Cargo </label>
                                <select name="cargoTrabajador" id="cargoTrabajador" class="">
                                    <option class="option" value="---" selected>---</option>
                                    <option class="option" value="Mesonero">Mesonero</option>
                                    <option class="option" value="Cocinero">Cocinero</option>
                                </select>
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
    <?php require_once("comunes/modal.php"); ?>
    <script src="js/gestionarTrabajador.js"></script>
</body>

</html>