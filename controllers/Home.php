<?php

class Home extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Agenda';
        $this->views->getView('home', 'index', $data);
    }

    public function registrar()
    {
        $nombreEvento = strClean($_POST['nombreEvento']);
        $fechaEvento = strClean($_POST['fechaEvento']);
        $colorEvento = strClean($_POST['colorEvento']);
        // print_r($_POST);
        if (isset($_POST)) {
            if (empty($nombreEvento)) {
                $res = array('msg' => 'El nombre del evento es requerido', 'type' => 'warning');
            } else if (empty($fechaEvento)) {
                $res = array('msg' => 'La fecha del evento es requerido', 'type' => 'warning');
            } else {
                $data = $this->model->registrar($nombreEvento, $fechaEvento, $colorEvento);
                if ($data > 0) {
                    $res = array('msg' => 'El evento se registró exitosamente', 'type' => 'success');
                } else {
                    $res = array('msg' => 'Error al registrar evento', 'type' => 'error');
                }
            }
        } else {
            $res = array('msg' => 'Error desconocido', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}