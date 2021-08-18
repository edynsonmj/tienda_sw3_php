<?php
/**
 * Establece la conexion con la base de datos usando PDO
 */
class clsConexion{
    //ATRIBUTOS
    private $conexionPDO;
    private $BDnombre;
    private $BDusuario;
    private $BDclave;
    private $conexionHost;
    private $estado=false;
    //CONSTRUCTOR
    public function __construct($prmConexionHost, $prmBDnombre, $prmBDusuario, $prmBDclave){
        $this->conexionHost = $prmConexionHost;
        $this->BDusuario = $prmBDusuario;
        $this->BDnombre = $prmBDnombre;
        $this->BDClave = $prmBDclave;
    }
    //METODOS
    public function conectar(){
        try{
            $dns = 'mysql:host='.$this->conexionHost.';'.'dbname='.$this->BDnombre;
            $this->conexionPDO = new PDO($dns, $this->BDusuario, $this->BDclave);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->estado = true;
        }catch(Exception $ex){
            $this->ExceptionLog($ex);
        }
    }
    public function desconectar(){
        $this->conexionPDO=null;
        $this->estado=false;
    }
    public function __GET($atr){return $this->$atr;}
    public function __SET($atr, $val){return $this->$atr=$val;}
}

?>