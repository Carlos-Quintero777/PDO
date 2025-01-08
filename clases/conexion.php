<?php

use PSpell\Config;

class Conexion{
    private $db="baseMayorQACJ";
    private $host="localhost";
    private  $usr="root";    // este es la conexion.php de la base de datos mysql en la carpeta clases
    private  $pwd="";

    private $conecta;

    public function __construct(){

        $cadena = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";

    try{
        $this->conecta=new PDO($cadena,$this->usr,$this->pwd);
        $this->conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(Exception $e){
        $this->conecta="Error al conectar";
        echo "Error: ".$e->getMessage();
    }
}
public function AbrirConexion(){
    return $this->conecta;
}
}
$miconexion =new Conexion();

?>