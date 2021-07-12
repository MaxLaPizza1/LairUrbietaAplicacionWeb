<?php
    require_once 'Helper/Cls_Conexion.php';
    //Clase modelo para entidad Usuarios
    class Usuario{
        //Declaracion de los atributos del usuario
        private $_nombre;
        private $_correo;
        private $_contrasena;
        private $_foto;
        private $_perfil;
        private $_estatus;

        public function SetDatos($corr,$nom,$cont,$foto){
            $this->_correo=$corr;
            $this->_nombre=$nom;
            $this->_contrasena=$cont;
            $this->_foto=$foto;
            //Perfil a utilizar es Administrado=1 y Cliente=2
            //El estatus 0=Inactivo y 1=Activo
        }

        public function insertarUsuarios(){
            $nombreFoto=$this->_foto['foto']['name'];
            $ruta='Vista/media'.$nombreFoto;
            move_uploaded_file($this->_foto['foto']['tmp_name'],$ruta);

            $sql="insert into usuarios values('$this->_correo','$this->_nombre',sha2('$this->_contrasena',256),'$ruta',2,1)";
            $res=$this->_aplicarQuery($sql);
            return $res;
        }

        public function login(){
            //Seleccionando los campos que me permitan identificar al usuario.
            //ENT_QUOTES convierte las comillas dobles como simples
            $this->_correo= htmlentities($this->_correo, ENT_QUOTES);
            $sql="select nombre, perfil, foto from usuarios where correo = '$this->_correo' && contrasena =sha2('$this->_contrasena',256)";
            $res= $this->_aplicarQuery($sql);
            $valores=$res->fetch_assoc();
            return $valores;
        }
        public function _aplicarQuery($consulta){
            $objConexion = new Conexion();
            $res=$objConexion->ejecutarConsulta($consulta);
            $objConexion->cerrarConexion();
            return $res;
        }

    }
?>