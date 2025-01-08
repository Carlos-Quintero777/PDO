<?php
require_once("autoload.php");

class Actualiza {
    private $MiConexion;   ////este es mi Actualiza.php de la carpeta clases

    public function __construct() {
        $this->MiConexion = new Conexion();
        $this->MiConexion = $this->MiConexion->AbrirConexion();
    }

    public function Actualizar($id, $nombre, $edad, $correo) {
        try {
            $sql = "UPDATE datos SET nombre = :nombre, edad = :edad, correo = :correo WHERE id = :id";
            $consulta = $this->MiConexion->prepare($sql);
            $consulta->bindValue(":id", $id, PDO::PARAM_INT);
            $consulta->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $consulta->bindValue(":edad", $edad, PDO::PARAM_INT);
            $consulta->bindValue(":correo", $correo, PDO::PARAM_STR);
    
            if ($consulta->execute()) {
                return true; // Actualización exitosa
            } else {
                print_r($consulta->errorInfo()); // Imprime errores si falla
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}


?>