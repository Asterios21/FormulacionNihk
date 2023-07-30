<?php
require('../modelo/conexionBD.php');
realizarPago();

if(isset($_POST['modal_tipoCuota'])){
    generarCuotaDeuda();
}


function verDeudas($input)
{
    if ($input != null) {
        $query = "SELECT dni,estado,monto,fecha_pago,descripcion,numero_acta FROM cuotas where dni like '%$input%' or estado like '%$input%' or monto like '%$input%' or fecha_pago like '%$input%' or descripcion like '%$input%' or numero_acta like '%$input%'";
        $res = conexionBD::conexion()->query($query);
        return $res;
    } else {
        $query = "SELECT dni,estado,monto,fecha_pago,descripcion,numero_acta FROM cuotas";
        $res = conexionBD::conexion()->query($query);
        return $res;
    }
}

function verActa($numeroActa)
{
    $query = "SELECT asunto_acta FROM acta WHERE numero_acta='$numeroActa'";
    $res = conexionBD::conexion()->query($query);
    $result = $res->fetch_assoc();
    return $result['asunto_acta'];
}
function verDeudor($dni)
{
    $query = "SELECT nombres,apellidos FROM poblador WHERE dni='$dni'";
    $res = conexionBD::conexion()->query($query);
    $result = $res->fetch_assoc();
    $nombreCompleto = $result['nombres'] . ' ' . $result['apellidos'];
    return $nombreCompleto;
}
function realizarPago()
{
    if (isset($_POST['modal_dni'])) {
        $dni = $_POST['modal_dni'];
        $monto = $_POST['modal_monto'];
        $montoPagar = $_POST['modal_montoPagar'];
        $newMonto = $monto - $montoPagar;
        $fecha_actual = date("Y-m-d h:i:s");
        $query = "UPDATE cuotas SET monto='$newMonto',fecha_pago='$fecha_actual' WHERE dni='$dni'";
        echo json_encode(mysqli_query(conexionBD::conexion(), $query));
    }
}

function generarCuotaDeuda()
{
    if(isset($_POST['modal_tipoCuota']) &&  isset($_POST['modal_nuevoMonto'])){
        
        if ($_POST['modal_tipoCuota'] == 'Cuota') {
            $numeroActa = $_POST['modal_idActa'];
            $monto = $_POST['modal_nuevoMonto'];
            $fechaPago = $_POST['modal_fechaPago'];
            $descripcion = $_POST['modal_descripcion'];
            $pob = mysqli_query(conexionBD::conexion(), 'SELECT dni FROM poblador');
            $pobRows = $pob->num_rows;
           
            for ($i = 0; $i < $pobRows; $i++) {
                $res = $pob->fetch_assoc();
                $dni=$res['dni'];
                mysqli_query(conexionBD::conexion(), "INSERT INTO cuotas VALUES(null,'$dni',1,'$monto','$fechaPago','$descripcion','$numeroActa')");
            }
            echo json_encode('hola');
        }
        if($_POST['modal_tipoCuota'] == 'Deuda') {
            $idPoblador = $_POST['modal_idPoblador'];
            $monto = $_POST['modal_nuevoMonto'];
            $fechaPago = $_POST['modal_fechaPago'];
            $descripcion = $_POST['modal_descripcion'];
            
            echo json_encode(mysqli_query(conexionBD::conexion(), "INSERT INTO cuotas VALUES(null,'$idPoblador',1,'$monto','$fechaPago','$descripcion',0)"));
        }
        
    }
    
}
?>