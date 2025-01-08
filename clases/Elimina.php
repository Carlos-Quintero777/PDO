<?php
require_once("autoload.php");

class Elimina {
    private $MiConexion;

    public function __construct() {
        $conexion = new Conexion(); 
        $this->MiConexion = $conexion->AbrirConexion(); 
    }

    public function Eliminar($id) {
        try {
            $sql = "DELETE FROM Datos WHERE id = :id"; 
            $stmt = $this->MiConexion->prepare($sql); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

            if ($stmt->execute()) { 
                if ($stmt->rowCount() > 0) {
                    return "Registro eliminado correctamente.";
                } else {
                    return "No se encontró ningún registro con ese ID.";
                }
            } else {
                return "Error al ejecutar la consulta.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
