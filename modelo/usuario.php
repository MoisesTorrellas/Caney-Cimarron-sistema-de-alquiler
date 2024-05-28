<?php

require_once('modelo/datos.php');

class inicio extends datos{

    private $usuario;
    private $contraseña;

    public function usuarioExiste($user,$pass){

        $query = $this->conecta()->prepare('SELECT * FROM usuarios WHERE usuario=:user AND contraseña=:pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }
        else{
            return false;
        }
    }

    public function setUser($user){
        $query= $this->conecta()->prepare('SELECT * FROM usuarios WHERE usuario=:user');
        $query->execute(['user'=> $user]);

        foreach($query as $actiUser){
            $this->usuario= $actiUser['usuario'];
        }
    }
}


?>