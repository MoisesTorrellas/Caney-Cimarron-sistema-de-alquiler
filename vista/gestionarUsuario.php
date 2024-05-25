<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('comunes/head.php');?>
    <title>Document</title>
</head>
<body>
    <div class="conteinerPadre">
        <?php include('comunes/navbarLateral.php');?>
        <div class="conteinerHijo">
            <?php include('comunes/navbarsuperior.php');?>
            <div class="content">
                <div class="tituloBox">
                    <h1 class="titulo">Gestionar Usuarios<span>.</span></h1>
                </div>
                <div class="contentBusqueda">
                    <div class="buscador">
                        <input class="" type="search" id="buscar" name="buscar" placeholder="Buscar...">
                        <i class="fi fi-br-search lupa"></i>
                    </div>
                    <div class="botonBox">
                        <button  type="button" id="incluir" class="boton cta"><i class='fi fi-br-user-add iconB'></i> Nuevo Usuario</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-contenedor">
        <div class="modal modal-close">
            <div class="contentModal">
                <div class="headerModal">
                    <h2 class="titleModal">Registro de Usuarios<span>.</span></h2>
                    <button type="button" class="closes">X</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/modal.js"></script>
</body>
</html>