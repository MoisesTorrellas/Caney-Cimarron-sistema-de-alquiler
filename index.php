<?php

$pagina= 'principal';

if(!empty($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}

if(is_file('controlador/'.$pagina.'.php')){
    require_once('controlador/'.$pagina.'.php'); 
}

else{
    require_once('comunes/Error.php');
}

?>