<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/css/estilo.css">
    <script src="Vista/js/funcion.js"></script>
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
        <form action="" method="POST">
        <h3><label for="name">Inicio Sesion</label><br></h3>
        <label for="name">Correo</label>
        <input type="email" id="correo" name="correo" placeholder="Introduce tu correo">
        <label for="name">Contraseña</label>
        <input type="password" name="contrasena" id="pass" placeholder="Introduce tu contraseña">
        <input type="hidden" name="peticion" value="ingresar">

        <input type="submit" onclick="encriptar()" value="Ingresar">
        </form>
        </center>
        <p>
        
        </p>
        <a href="?peticion=RegistroUsuario" class="opcion">Registrate</a>
    </section>
</body>
</html>
<?php

?>