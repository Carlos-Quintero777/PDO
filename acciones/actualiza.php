<?php
require_once("../clases/autoload.php");

$id = isset($_POST["id"]) ? $_POST["id"] : null;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null; 
$edad = isset($_POST["edad"]) ? $_POST["edad"] : null;
$correo = isset($_POST["correo"]) ? $_POST["correo"] : null;

if ($id && $nombre && $edad && $correo) {
    $actualiza = new Actualiza();
    if ($actualiza->Actualizar($id, $nombre, $edad, $correo)) {
        echo "<p style='text-align: center;'>¡GENIAL!<br><br>Se Pudo Actualizar SATISFACTORIAMENTE</p>";
    } else {
        echo "CARNAL, HUBO UN ERROR AL ACTUALIZAR";
    }
} else {
    echo "MUY MAL, FALTAN DATOS PARA ACTUALIZAR, RELLENA TODOS LOS CAMPOS FLOJO";
}
echo "<a href='../web/indice.php'><p style='text-align: center;'><br>VOLVER A LA TABLA</a></p>";

?>