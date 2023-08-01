<?php
require '../modelo/crearCuentaM.php';
if(isset($_POST['input-dni'])){
    $dni=$_POST['input-dni'];
    $nombres=$_POST['input-nombre'];
    $apellidos=$_POST['input-apellido'];
    $password=$_POST['input-password'];
    $celular=$_POST['input-celular'];
    
    if(crearCuenta($dni,$password,$nombres,$apellidos,$celular)){
        echo "<script>alert('Creado exitosamente')</script>";
    }
    else{
        echo "<script>alert('No se pudo crear la cuenta')</script>";
    }
}
?>