<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/css/estilo.css">
    <title>Conexion a BD</title>
</head>
<body>
<header><h1 class="titulo">Proyecto EVN304 segundo parcial</h1></header>
    <nav id="menuPrincipal">
        <a class="opcionMenu" href="?peticion=home">Inicio</a>
        <a class="opcionMenu" href="?peticion=galeria">Galeria</a>
        <a class="opcionMenu" href="?peticion=InicioSesion">Inicio de Sesion</a>
    </nav>
    <section>
        <center>
        <form method="post" action="" enctype="multipart/form-data">
        <h3><label for="name">Introduce tus datos</label><br></h3>
        <input type="text" name="nombre" placeholder="Introduce tu nombre">
        <input type="email" name="correo" placeholder="Introduce tu correo">
        <input type="password" id="pass" name="contrasena" placeholder="Introduce tu contraseña">
        <label>Introduce una foto</label>
        <input type="file" name="foto">
        <input type="hidden" name="peticion" value="guardarUsuario">
        <input type="submit" onclick="encriptar()" value="Guardar">
        </form>

        <p>
            <?php 
                if(isset($nombre)){
                    if($datos){
                        echo 'El registro se realizo correctamente';
                    }else{
                        echo 'No se realizo el registro de manera correcta';
                    }
                }
            ?>
        </p>
        </center>
    </section>
</body>
</html>
<?php

?>