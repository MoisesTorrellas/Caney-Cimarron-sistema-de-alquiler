<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('comunes/head.php'); ?>

    <title>Inicio.</title>
</head>
<body>
<div class="fondo">
        <form method="post" action="">
        <input type="text" name="accion" id="accion" style="display: none;">
            <div class="contenedor">
                <div class="contenedor-saludo">
                    <h2 class="saludo">BIENVENIDO</h2>
                </div>
                <div class="formulario-box usuario">
                    <input class="formulario" type="text" id="usuario" name="usuario" required>
                    <label class="formulario-name">Usuario</label>
                    <i class="fi fi-br-user icon"></i>
                </div>
                
                <div class="formulario-box clave">
                    <input class="formulario" type="password" id="contraseña" name="contraseña" required>
                    <label class="formulario-name">Contraseña</label>
                    <i class='fi fi-br-lock icon'></i>
                </div>
                <div class="boton-box">
                    <button type="submit" name="ingresar" id="ingresar" class="boton"><i class='fi fi-br-sign-in-alt iconB'></i> Iniciar Sesión</button>
                </div>                
            </div>
        </form>
        <div class="contenedor contenedorLogo">
            <img class="imgLogo" src="img/logoInicio.jpg" alt="">
        </div>
    </div>
</body>
</html>