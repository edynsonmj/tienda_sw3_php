<?php
require_once 'modelo/clsAcceso.php';
class clsSession{
    public function __construct(){
        session_start();
    }

    public function existeUsuario($prmUsername, $prmPassword){
        try{
            $auxAcceso = new clsAcceso();
            $result = $auxAcceso->existeUsuario($prmUsername, $prmPassword);
            return $result;
        }catch(Exception $e){
            echo "ha ocurrido un error en el login";
            require_once 'vista/login.php';
        }
    }

    public function setUsuarioActual($prmUser){
        $_SESSION['user'] = $prmUser;
        require 'vista/home.php';
    }

    public function getUsuarioActual(){
        return $_SESSION['user'];
    }

    public function cerrarSession(){
        session_unset();
        session_destroy();
    }
}

?>