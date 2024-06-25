<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('comunes/head.php'); ?>
    <title>Gestionar Bienes.</title>
</head>

<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php'); ?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarsuperior.php'); ?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Gestionar Bienes<span>.</span></h1>
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
                        <button type="button" id="incluir" class="boton cta"><i class='fi fi-br-plate-utensils iconB'></i>Registrar Bienes</button>
                    </div>
                </div>
                <div class="containerTabla">
                    <div class="conteinerHijoTabla">
                        <table class="tabla" id="tablageneral">
                            <thead class="headTabla">
                                <tr class="trH">
                                    <th class="th">Codigo del Bien</th>
                                    <th class="th">Nombre del Bien</th>
                                    <th class="th">Cantidad</th>
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
                                <input type="text" name="codBien" id="codBien" required>
                                <label class="form-name">Codigo del Bien</label>
                                <div class="span">
                                    <span id="scodBien" class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-box form-box1">
                                <input type="text" name="nomBien" id="nomBien" required>
                                <label class="form-name">Nombre</label>
                                <div class="span"><span id="snomBien" class=""></span></div>
                            </div>
                            <div class="form-box form-box1">
                                <input type="text" name="cantBien" id="cantBien" required>
                                <label class="form-name">Cantidad</label>
                                <div class="span"><span id="scantBien" class=""></span></div>
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
    <script src="js/gestionarBien.js"></script>
</body>

</html>