<?php
require_once("autoload.php");

class Listar{
    private $miconexion;

    public function __construct(){   ///este es listar.php el en la carpeta clases
        $this->miconexion = new Conexion();
        $this->miconexion = $this->miconexion->AbrirConexion();
    }

    public function ListarTodos(){
        $sql = "Select * From Datos";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($registros);
    }

    public function ListarID(int $id){
        $sql = "Select * From Datos Where id = :id";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->BindValue(":id", $id);
        $consulta->execute();
        $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($registro);
    }
    
    
}

?>