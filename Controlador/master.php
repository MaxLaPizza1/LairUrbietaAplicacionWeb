<?php
    //Controlador base
    $peticion = 'home';
    extract($_REQUEST);
    //Agregar clase sesion
    require_once 'helper/Cls_Sesion.php';
    $objSesion = new Sesion();
    //validar el usuario de la sesion
    if(!isset($_SESSION['usuario'])){
        switch($peticion){
            case 'home':
                require_once 'Vista/php/home.php';
                break;
            case 'galeria':
                require_once 'Vista/php/galeria.php';
                break;
            case 'InicioSesion':
                require_once 'Vista/php/InicioSesion.php';
                break;
            case 'RegistroUsuario':
                require_once 'Vista/php/RegistroUsuario.php';
                break;
            case 'guardarUsuario':
                require_once 'Modelo/Cls_usuarios.php';
                $objUsuario= new Usuario();
                $objUsuario->setDatos($correo,$nombre,$contrasena,$_FILES);
                $datos=$objUsuario->insertarUsuarios();
                require_once 'Vista/php/RegistroUsuario.php';
                break;
            case 'ingresar':
                require_once 'Modelo/Cls_usuarios.php';
                $objUsuario = new Usuario();
                $objUsuario->SetDatos($correo,null, $contrasena, null);
                $datos=$objUsuario->login();

                //Validacion del perfil de usuario
                $objSesion->crearVariable('usuario',$datos);
                if(isset($datos['perfil'])){
                    $objSesion->crearVariable('usuario',$datos);
                    //Crear una variable de sesion
                    if($datos['perfil']==2){
                        header('location:?peticion=perfilCliente');
                    }else{
                        header('location:?peticion=perfilAdmin');
                    }
                }
                require_once 'Vista/php/login.php';
                break;
            default:
                header('Location:Vista/php/home.php');
        }

    }
        //Validar el acceso al Perfil 1 = Administrador
        //Requerimos de una variable de sesion
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['perfil']==1){
            switch($peticion){
            case 'perfilAdmin':
                require_once 'Vista/php/indexAdmin.php';
                break;
            case 'ModificarProducto':

                break;
            case 'AgregarProducto':

                break;
            case 'cerrar':
                $objSesion->borrarVariable('usuario');
                require_once 'Vista/php/InicioSesion.php';
                break;
            }
        }
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['perfil']==2){
            switch($peticion){
            case 'perfilCliente':
                require_once 'Vista/php/indexCliente.php';
                break;
            case 'galeria':
                require_once 'Vista/php/galeriaCliente.php';
                break;
            case 'contacto':
                break;
            case 'cerrar':
                $objSesion->borrarVariable('usuario');
                require_once 'Vista/php/InicioSesion.php';
                break;
            }
        }

?>