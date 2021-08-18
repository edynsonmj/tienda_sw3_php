<?php
require_once 'modelo/clsConexion.php';
require_once 'modelo/clsUsuario.php';
class clsAcceso{
    private $conexion;
    private $auxPDO;
    public function __construct(){
        $this->conexion = new clsConexion('localhost', 'login', 'root', '');
        $this->conexion->conectar();
        //obtener objeto de comunicacion, mediante get magico
        $this->auxPDO = $this->conexion->conexionPDO;
        
    }
    /**
     * valida la un los parametros de un usuario en la base de datos
     * si los datos son correctos retorna true de lo contrario false
     */
    public function existeUsuario($prmUsername, $prmPassword){
        try {
            //en este caso no estoy usando valores anonimos, sino directos, estos deben ser protejidos por comillas simples
            $sql = "SELECT * FROM usuario WHERE usuario = '$prmUsername' AND clave = '$prmPassword'";
            //$sql = "SELECT * FROM usuario";   //sql de prueba
            //en este punto $consulta es un objeto PDO con la informacion consultada
            $consulta = $this->auxPDO->prepare($sql);
            //execute devuelve objetoPDO o false en caso de error, una consulta de 0 lineas devueltas no es error
            //por tanto no es adecuado para validar
            $resultado = $consulta->execute();
            //rowCount() devuelve el numero de filas afectadas tras la ultima consulta sql
            //para el caso particular de mysql, mysql devuelve el numero de lineas seleccionadas tras un select
            //pero esto no aplica para todas las bases de datos
            //portabilidad solo para operaciones delete, insert, update
            $numFilas = $consulta->rowCount();
            if ($numFilas > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        } catch (Exception $ex) {
            echo "error en la consulta";
            return false;
        }
    }
}
?>