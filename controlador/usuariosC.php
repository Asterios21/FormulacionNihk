'
<?php
// session_start();
require('modelo/usuariosM.php');
if (isset($_SESSION['nombres'])) {
  header("location:vista/usuariosV.php");
}

function validarUsuarioC()
{

  if (isset($_POST['input-DNI']) && isset($_POST['input-contraseña'])) {
    $DNI = $_POST['input-DNI'];
    $contraseña = $_POST['input-contraseña'];

    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    echo $hash;
    $res = validarUsuarioM($DNI);
    if ($res) {
      if (password_verify($contraseña, $res['contrasenia'])) {
        session_start();
        $_SESSION['dni'] = $res['dni'];
        $_SESSION['contrasenia'] = $res['contrasenia'];
        $_SESSION['nombres'] = $res['nombres'];
        $_SESSION['apellidos'] = $res['apellidos'];

        if ($res['rol'] == "secretario") {
          header("location:vista/usuariosV.php");

        } elseif ($res['rol'] == "tesorero"){
          header("location:vista/tesoreroV.php");
        }

      }
    }

  }

}

?>'