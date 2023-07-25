<?php
//require('controlador/usuariosC.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>COMUNIDAD PALLACCOCHA</title>

    <link rel="stylesheet" href="../css/crearCuenta.css">
    <link rel="shortcut icon" href="icons/namaste.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/084bfb5838.js"></script>

    <script src="../scripts/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/84156eae16.js" crossorigin="anonymous"></script>
</head>

<body background="../images/fondo2.jpg">
    <div class="contenedor-principal ">
        <div class="cuerpo_cuenta">
            <form action="#" method="post" class="formulario-datos">
                <div class="crearCuentaText">
                    <h2 style="color:#00d8d6;">CREAR CUENTA</h2>
                </div>
                <div class="usuario">
                    <input type="text" class="input-box" name="input-DNI" placeholder="Ingrese DNI" maxlength=8>
                    <i class="fa-solid fa-user icono"></i>
                </div>
                <div class="nombre">
                    <input type="text" class="input-box" name="input-DNI" placeholder="Nombre" maxlength=8>
                    <i class="fa-solid fa-user icono"></i>
                </div>
                <div class="apellido">
                    <input type="text" class="input-box" name="input-DNI" placeholder="Apellidos" maxlength=8>
                    <i class="fa-solid fa-user icono"></i>
                </div>
                <div class="contraseña">
                    <input type="password" class="input-box" name="input-contraseña" placeholder="Ingrese contraseña" maxlength=20>
                    <i class="fa-solid fa-key icono"></i>
                </div>
                <button style="color:white;" id="boton-ingresar">CREAR CUENTA</button>
                <div class="recuperar_contraseña">
                    <a href="../index.php">Iniciar Sesion </a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
//$s = validarUsuarioC();
//echo "$s";
?>