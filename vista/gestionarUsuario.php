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
                        <button  type="button" id="incluir" data-toggle="modal" data-target="#modal1" name="consultar" class="boton"><i class='fi fi-br-user-add iconB'></i> Nuevo Usuario</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
        <div class="modalInter modal-dialogo" role="document">
            <div class="contentModal">
                <div class="headerModal">
                    <h5 class="modal-title">Formulario de Personas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>