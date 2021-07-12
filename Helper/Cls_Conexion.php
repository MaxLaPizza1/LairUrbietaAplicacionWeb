<?php
    //Clase conexion
    class Conexion{
        private $_objConectar;

        function __construct(){
            $this->_objConectar=new mysqli(SERVIDOR,USUARIO,CONTRASENA,BASE_DATOS);
            if($this->_objConectar->connect_errno){
                printf("Fallo la conexion:%s\n", $this->_objConectar->connect_error);
                exit();
            }
        }

        public function ejecutarConsulta($consulta){
            $resultado=$this->_objConectar->query($consulta);
            return $resultado;
        }

        public function cerrarConexion(){
            $this->_objConectar->close();
        }
    }
?>