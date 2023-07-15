<?php

class HomeModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($nombreEvento, $fechaEvento, $colorEvento)
    {
        $sql = "INSERT INTO evento (nombre, fecha, color) VALUES (?,?,?)";
        $array = array($nombreEvento, $fechaEvento, $colorEvento);
        return $this->insertar($sql, $array);
    }
}