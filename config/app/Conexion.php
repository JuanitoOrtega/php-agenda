<?php

class Conexion {
    
    private $conect;

    public function __construct()
    {
        $pdo = "mysql:host=" . DBHOST . ";port=" . DBPORT . ";dbname=" . DBNAME . ";" . DBCHARSET . "";
        try {
            $this->conect = new PDO($pdo, DBUSER, DBPASS);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conectado a la base de datos";
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function conectar()
    {
        return $this->conect;
    }
}