<?php
    class conexionBD{
        static public function conexion(){
            $servidor="localhost";
            $baseDeDatos="comunidad3";
            $usuario="root";
            $contrasenia="";
            $ruta=3307;
            $conexionBD=new mysqli($servidor,$usuario,$contrasenia,$baseDeDatos,$ruta);

            return $conexionBD;
        }
    }
?>

