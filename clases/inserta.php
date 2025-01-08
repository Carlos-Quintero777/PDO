<?php
require_once ("autoload.php");

class Inserta{

    private $miconexion;

    public function __construct(){       ///este es inserta.php de la carpeta clases
        $this->miconexion = new Conexion();
        $this->miconexion = $this->miconexion->Abrirconexion();
    }

    public  function Insertar( string $nombre, $edad, $correo){
        $sql ="INSERT INTO Datos (nombre, edad, correo) VALUES (:nombre, :edad, :correo)";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->BindValue(":nombre", $nombre);
        $consulta->BindValue(":edad", $edad);
        $consulta->BindValue(":correo", $correo);
        $resultado = $consulta->execute();
        return json_encode ($resultado);
    }

}




?>
