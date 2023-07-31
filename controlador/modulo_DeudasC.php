<?php
require '../modelo/modulo_DeudasM.php';
verificarFechasActas();
$input=isset($_POST['input']) ? conexionBD::conexion()->real_escape_string($_POST['input']):null;
$verDeuda=verDeudas($input);
$num_rows=$verDeuda->num_rows;
$html='';


if($num_rows>0){
    while($row=$verDeuda->fetch_assoc()){
        $dniClass=$row['dni'];
        $estado=$row['estado']!=0?'Activo':'Inactivo';
        $iterable='';
        $asunto='';
        if($row['estado']==0 || $row['monto']==0){
            $iterable='Disabled';
        }
        if($row['numero_acta']==null){
            $asunto='Sin asunto';
        }
        else{
            $asunto=verActa($row['numero_acta']);
        }
        $html .="<tr class='$dniClass'>";
        $html .='<td>'.$row['dni'].'</td>';
        $html .='<td>'.verDeudor($row['dni']).'</td>';
        $html .='<td>'.$estado.'</td>';
        $html .='<td>'.$row['monto'].'</td>';
        $html .='<td>'.$row['fecha_pago'].'</td>';
        $html .='<td>'.$row['descripcion'].'</td>';
        $html .='<td>'.$asunto.'</td>';
        $html .=
        "<td> 
                <button type='button'  name='edit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='edit($dniClass)' id='buttonPagar' $iterable >Pagar</button>
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
