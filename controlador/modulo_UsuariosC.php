<?php
require '../modelo/modulo_UsuariosM.php';

$input=isset($_POST['input']) ? conexionBD::conexion()->real_escape_string($_POST['input']):null;
$verPoblador=verPoblador($input);
$num_rows=$verPoblador->num_rows;
$html='';


if($num_rows>0){
    while($row=$verPoblador->fetch_assoc()){
        $dniClass=$row['dni'];
        $estado=$row['estado']!=0?'Activo':'Inactivo';
        $html .="<tr class='$dniClass'>";
        $html .='<td>'.$row['dni'].'</td>';
        $html .='<td>'.$row['nombres'].'</td>';
        $html .='<td>'.$row['apellidos'].'</td>';
        $html .='<td>'.$row['rol'].'</td>';
        $html .='<td>'.$estado.'</td>';
        $html .=
        "<td> 
                <button type='button'  name='edit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='edit($dniClass)'>Editar</button>
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
