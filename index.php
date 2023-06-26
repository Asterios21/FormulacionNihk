<?php
require('controlador/usuariosC.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>TIENDA ON LINE</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="icons/namaste.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/084bfb5838.js"></script>

    <script src="../scripts/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/84156eae16.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="contenedor-principal ">
        <div class="cuerpo">
            <form action="#" method="post" class="formulario-datos">
                <div class="tituloIniciarSesion">
                    <h2 style="color:#00d8d6;">INICIAR SESION</h2>
                </div>


                <div class="DNI">
                    <input type="text" class="input-DNI" name="input-DNI" placeholder="Ingrese Usuario" maxlength=8>
                    <i class="fa-solid fa-user icono"></i>
                </div>

                <div class="contraseña">
                    <input type="password" class="input-contraseña" name="input-contraseña"
                        placeholder="Ingrese contraseña" maxlength=20>
                    <i class="fa-solid fa-key icono"></i>
                </div>

                <button style="color:white;" id="boton-ingresar">INGRESAR</button>

                <div class="recuperar_contraseña">
                    <a href="usuariosV.php?modulo=asistencias" >Olvidé mi contraseña</a>
                    <a href="vista/CrearCuenta.php">¿No tienes cuenta?Aqui </a>
                </div>

            </form>

        </div>
    </div>


</body>

<?php
 validarUsuarioC();
//echo "$s";
?>