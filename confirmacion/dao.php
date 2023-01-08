<?php

require_once './parametros.php';

class DAO {
    private $cadenaConexion;
    private $conexion;

    public function __construct(){
        
        try{
            $this->cadenaConexion = "mysql:host=". DB_SERVIDOR .";port=". DB_PUERTO .";dbname=". DB_NOMBRE .";charset=". DB_CHARSET;
            $this->conexion = new PDO($this->cadenaConexion,DB_USUARIO,DB_PASS);
            // echo "Conexión correcta jd";
            // $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function ejecutarOrden($sql = "", $valores = array()){
        if($sql != "" && strlen($sql) > 0 ){
            try{
                $this->conexion->beginTransaction();
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute($valores);
                if(intval($consulta->errorCode())==0){
                    $this->conexion->commit(); //confirmar la acción 
                    $filasAfectadas = $consulta->rowCount();
                    return $filasAfectadas;
                } else {
                    $this->conexion->rollBack();
                    return -1;
                }
            } catch(Exception $ex){
                $this->conexion->rollBack(); //regresar al estado anterior
                // return $this->conexion->errorInfo();
                return $ex->getMessage();
            }
        } else {
            return 0;
        }
    }


}


// $dao = new DAO();