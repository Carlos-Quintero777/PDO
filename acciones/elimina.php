:<?php
require_once("../clases/autoload.php"); 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo " <p style='text-align: center;'>EL ID QUE SELECCIONASTE ES : " . $id ."</p>";   

    $elimina = new Elimina();
    $resultado = $elimina->Eliminar($id);

    if ($resultado) {
        echo "<p style='text-align: center;'>¡CARAJOTE!<br>El Registro Fue Eliminado de MANERA CORRECTA<p>";
        echo "<a href='../web/indice.php'><p style='text-align: center;'><br><br>VOLVER A LA TABLA</a>";
    } else {
        echo "EYYY HAY ERROR AL INTENTAR BORRAR EL REGISTRO";
    }
} else {
    echo "EL ID NO FUE PROPORCIONADO";
}
?> 