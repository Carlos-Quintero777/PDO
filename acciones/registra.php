<?php
require_once("../clases/autoload.php");
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["correo"];

if (isset($nombre) && isset($edad) && isset($correo)) { 
    $miconexion = new Inserta();
    $estado = $miconexion->Insertar($nombre, $edad, $correo);
    if ($estado == true) {
        echo "<p style='text-align: center;'><br>¡PERFECTISIMO!<br><br>Fue Insertado de MANERA CORRECTA";
        echo "<a href='../web/indice.php'><p style='text-align: center;'><br><br>REGRESAR A LA TABLA</p></a>";
        }else{
            echo "NOMBRE, HAY ERROR, NO SE PUDO INSERTAR EN LA TABLA";
        }

}
?>