<?php


class Conexion{
    /**
     * PDO: Objetos de datos de PHP / POO /slq server/oracle
     */

    public function conectar(){
        //then / catch
        try{
            $conexion = "mysql:host=localhost;dbname=practica_kodigo_fsj18;charset=utf8";
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, "root", "", $opciones);
            return $pdo;

        }catch(PDOException $e){
            echo "Error de Conexion: " . $e->getMessage();
            exit();
        }
    }
}

?>