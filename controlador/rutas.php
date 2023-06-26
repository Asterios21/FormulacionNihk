<?php

if(isset($_GET["modulo"])){
    switch ($_GET["modulo"]){
        case 'actas':
            include("secretario/modulo_PobladoresV.php");
            break;
        
        case 'asistencias':
            include("secretario/modulo_PobladoresV.php");
            break;
        
        case 'pobladores':
            include("secretario/modulo_PobladoresV.php");
            break;

        case 'deudas':
            include("secretario/modulo_PobladoresV.php");
            break;    
        
        default:
            include("secretario/modulo_PobladoresV.php");
            break;
    }
    
}else{
    include("secretario/modulo_PobladoresV.php");
}
?>