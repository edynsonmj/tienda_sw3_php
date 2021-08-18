<?php

class clsUsuario{
    private $nombre;
    private $nombreUsuario;
    private $password;

    public function __construct(){}

    public function setNombre($prmNombre){
        $this->nombre = $prmNombre;
    }

    public function setNombreUsuario($prmNombreUsuario){
        $this->nombreUsuario = $prmNombreUsuario;
    }

    public function setPassword($prmPassword){
        $this->password = $prmPassword;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getNombreUsuario(){
        return $this->$nombreUsuario;
    }

    public function getPassword(){
        return $this->password;
    }
}
?>