<?php
require_once 'controlador/clsSession.php';
//hay sesion?
$sesion = new clsSession();
if(isset($_SESSION['user'])){
    echo "hay sesion";
    require_once 'vista/home.php';
//hay elementos en post desde el login? se ha hecho submit?
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //validar usuario
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    //TODO existe el usuario? si: obtenga usuario actual y acceda a home
    if($sesion->existeUsuario($userForm,$passForm)){
        $sesion->setUsuarioActual($userForm);
    }else{
        echo "login o contraseña incorrectos";
        require_once 'vista/login.php';
    }
}else{
    echo "sin sesion";
    require_once 'vista/login.php';
}
?>