<?php
    class ConexionBD{
        public static function conexion(){
            try{
                // $conexion = new PDO("mysql:local=localhost; dbname=bombero3_wp883", "bombero3", "3T5:j:G4QdseA3");//3T5:j:G4QdseA3
                $conexion = new PDO("mysql:local=localhost; dbname=bomberos", "root", "");
                $conexion->query("SET NAMES 'utf8mb4'");
                return $conexion;
            } catch(Exception $e){
                print "Error: ".$e->getMessage()."<br>";
                die();
            }
        }
    }
?>