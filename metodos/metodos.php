<?php
require_once '../clases/autoload.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$informacion = "Acción no definida";

if ($metodo == 'GET') {
    $listar = new Listar();
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $informacion = $listar->ListarID($id);
    } else {
        $informacion = $listar->ListarTodos();
    }
} elseif ($metodo == 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['correo'])) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];

        $inserta = new Inserta();
        $informacion = $inserta->Insertar($nombre, $edad, $correo);
    } else {
        $informacion = "Faltan datos para el registro.";
    }
} elseif ($metodo == 'PUT') {
    parse_str(file_get_contents("php://input"), $parametros);
    if (isset($parametros['id']) && isset($parametros['nombre']) && isset($parametros['edad']) && isset($parametros['correo'])) {
        $id = $parametros['id'];
        $nombre = $parametros['nombre'];
        $edad = $parametros['edad'];
        $correo = $parametros['correo'];

        $actualiza = new Actualiza();
        $informacion = $actualiza->actualizar($id, $nombre, $edad, $correo);
    } else {
        $informacion = "Faltan datos para la actualización.";
    }
} elseif ($metodo == 'DELETE') {
    
    $id = $_GET['id'] ?? null;

    if (empty($id)) {
        parse_str(file_get_contents("php://input"), $parametros);
        $id = $parametros['id'] ?? null;
    }

    if (!empty($id)) {
        if (is_numeric($id)) {
            $elimina = new Elimina();
            $informacion = $elimina->Eliminar($id);
        } else {
            $informacion = "El ID proporcionado no es válido.";
        }
    } else {
        $informacion = "Faltan parámetros para la eliminación.";
    }
}

echo $informacion;
?>