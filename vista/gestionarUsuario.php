<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('comunes/head.php'); ?>
    <title>Gestionar Usuario.</title>
</head>

<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php'); ?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarSuperior.php'); ?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Gestionar Usuario<span>.</span></h1>
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
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-user-add iconB'></i> Nuevo Usuario</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th" data-label='Cedula'>Cedula</th>
                                    <th class="th" data-label='Nombre'>Nombre</th>
                                    <th class="th" data-label='Apellido'>Apellido</th>
                                    <th class="th" data-label='Telefono'>Telefono</th>
                                    <th class="th" data-label='Usuario'>Usuario</th>
                                    <th class="th" data-label='Contraseña'>Contraseña</th>
                                    <th class="th" data-label='Tipo'>Tipo</th>
                                    <th class="th" data-label='Acciones'>Acciones</th>
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
                    <h2 id="titleModal" class="titleModal"></h2>
                    <button type="button" class="closes">X</button>
                </div>
                <div class="form-contenedor">
                    <form method="post" id="f" autocomplete="off">
                        <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                        <div class="row">
                            <div class="form-box box-modi">
                                <input type="text" name="cedulaUsuario" id="cedulaUsuario" required>
                                <label class="form-name">Cedula</label>
                                <div class="span">
                                    <span id="scedulaUsuario" class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box">
                                <input type="text" name="nombreUsuario" id="nombreUsuario" required>
                                <label class="form-name">Nombre</label>
                                <div class="span"><span id="snombreUsuario" class=""></span></div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="apellidoUsuario" id="apellidoUsuario" required>
                                <label class="form-name">Apellido</label>
                                <div class="span"><span id="sapellidoUsuario" class=""></span></div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="telefonoUsuario" id="telefonoUsuario" required>
                                <label class="form-name">Telefono</label>
                                <div class="span"><span id="stelefonoUsuario" class=""></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box">
                                <input type="text" name="usuario" id="usuario" required>
                                <label class="form-name">Nombre de Usuario</label>
                                <div class="span"><span id="susuario" class=""></span></div>
                            </div>
                            <div class="form-box">
                                <input type="text" name="contraseña" id="contraseña" required>
                                <label class="form-name">Contraseña</label>
                                <div class="span"><span id="scontraseña" class=""></span></div>
                            </div>
                            <div class="form-box">
                                <label class="form-name form-name-modi">Tipo de Usuario</label>
                                <select name="tipoUsuario" id="tipoUsuario" class="">
                                    <option class="option" value="Usuario" selected>Usuario</option>
                                    <option class="option" value="Administrador">Administrador</option>
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
    <script src="js/gestionarUsuario.js"></script>

</body>

</html>