<?php
require '../modelo/modulo_DeudasM.php';

$input=isset($_POST['input']) ? conexionBD::conexion()->real_escape_string($_POST['input']):null;
$verDeuda=verDeudas($input);
$num_rows=$verDeuda->num_rows;
$html='';


if($num_rows>0){
    while($row=$verDeuda->fetch_assoc()){
        $dniClass=$row['dni'];
        $estado=$row['estado']!=0?'Activo':'Inactivo';
        $html .="<tr class='$dniClass'>";
        $html .='<td>'.verDeudor($row['dni']).'</td>';
        $html .='<td>'.$estado.'</td>';
        $html .='<td> S/. '.$row['monto'].'</td>';
        $html .='<td>'.$row['fecha_pago'].'</td>';
        $html .='<td>'.$row['descripcion'].'</td>';
        $html .='<td>'.verActa($row['numero_acta']).'</td>';
        $html .=
        "<td> 
                <button type='button'  name='edit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='edit($dniClass)'>Pagar</button>
        </td>";
        $html .='</tr>';
    }
}

else{
    $html.='<tr>';
    $html.='<td colspan="7">Sin Resultados</td>';
    $html.='</tr>';
}
echo json_encode($html,JSON_UNESCAPED_UNICODE);

?>
