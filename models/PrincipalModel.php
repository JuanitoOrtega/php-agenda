<?php

class PrincipalModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT * FROM eventos WHERE $campo = '$valor'";
        }
        $sql = "SELECT * FROM eventos WHERE $campo = '$valor' AND id != $id";
        return $this->select($sql);
    }

    public function registrar($nombre, $fecha_inicio, $fecha_fin, $color)
    {
        $sql = "INSERT INTO eventos (nombre, fecha_inicio, fecha_fin, color) VALUES (?,?,?,?)";
        $array = array($nombre, $fecha_inicio, $fecha_fin, $color);
        return $this->insertar($sql, $array);
    }

    public function listarEventos()
    {
        $sql = "SELECT id, nombre AS title, fecha_inicio AS start, fecha_fin AS end, color FROM eventos";
        return $this->selectAll($sql);
    }

    public function actualizar($nombre, $fecha_inicio, $fecha_fin, $color, $id)
    {
        $sql = "UPDATE eventos SET nombre = ?, fecha_inicio = ?, fecha_fin = ?, color = ? WHERE id = ?";
        $array = array($nombre, $fecha_inicio, $fecha_fin, $color, $id);
        return $this->save($sql, $array);
    }

    public function drop($fecha_inicio, $fecha_fin, $id)
    {
        $sql = "UPDATE eventos SET fecha_inicio = ?, fecha_fin = ? WHERE id = ?";
        $array = array($fecha_inicio, $fecha_fin, $id);
        return $this->save($sql, $array);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM eventos WHERE id = ?";
        $array = array($id);
        return $this->save($sql, $array);
    }
}