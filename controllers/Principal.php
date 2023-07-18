<?php

class Principal extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Agenda';
        $this->views->getView('principal', 'index', $data);
    }

    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $fecha_inicio = strClean($_POST['fecha_inicio']);
        $fecha_fin = strClean($_POST['fecha_fin']);
        $color = strClean($_POST['color']);
        $id = strClean($_POST['id']);
        // print_r($_POST);
        if (isset($_POST)) {
            if (empty($nombre)) {
                $res = array('msg' => 'El nombre del evento es requerido', 'type' => 'warning');
            } else if (empty($fecha_inicio)) {
                $res = array('msg' => 'La fecha y hora de inicio es requerido', 'type' => 'warning');
            } else if (empty($fecha_fin)) {
                $res = array('msg' => 'La fecha y hora de finalización es requerido', 'type' => 'warning');
            } else {
                if ($id == '') {
                    $validarEvento = $this->model->getValidar('nombre', $nombre, 'registrar', 0);
                    if (empty($validarEvento)) {
                        $data = $this->model->registrar($nombre, $fecha_inicio, $fecha_fin, $color);
                        if ($data > 0) {
                            $res = array('msg' => 'Evento registrado exitosamente', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'Error al registrar evento', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'Ya existe un evento con este nombre', 'type' => 'warning');
                    }
                } else {
                    $validarEvento = $this->model->getValidar('nombre', $nombre, 'modificar', $id);
                    if (empty($validarEvento)) {
                        $data = $this->model->actualizar($nombre, $fecha_inicio, $fecha_fin, $color, $id);
                        if ($data == 1) {
                            $res = array('msg' => 'Evento actualizado exitosamente', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'Error al actualizar evento', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'Ya existe un evento con este nombre', 'type' => 'warning');
                    }
                }
            }
        } else {
            $res = array('msg' => 'Error desconocido', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        $data = $this->model->listarEventos();
        // print_r($data);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idEvento)
    {
        $data = $this->model->eliminar($idEvento);
        if ($data == 1) {
            $res = array('msg' => 'Evento eliminado exitosamente', 'type' => 'success');
        } else {
            $res = array('msg' => 'Error al eliminar evento', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function drop()
    {
        $fecha_inicio = strClean($_POST['fecha_inicio']);
        $fecha_fin = strClean($_POST['fecha_fin']);
        $id = strClean($_POST['id']);
        $data = $this->model->drop($fecha_inicio, $fecha_fin, $id);
        if ($data == 1) {
            $res = array('msg' => 'Evento modificado', 'type' => 'success');
        } else {
            $res = array('msg' => 'Error al modificar evento', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}