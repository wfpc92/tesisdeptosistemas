<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('administrador_model', 'administrador');
        $this->load->model('seguridad_model', 'seguridad');
    }

    public function tmp($func = 'index') {
        if ($this->seguridad->es_administrador()) {
            $this->$func();
        } else {
            show_404();
        }
    }

    private function index() {
        $this->load->view('administrador/home');
    }

    private function redirect() {
        redirect('/administrador/tmp/index');
    }

    private function crear_usuario() {
        $this->load->database();
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('administrador/');
    }

    private function validar_formulario_crear_usuario() {
        $this->load->view('administrador/crear_usuario');
    }

    private function docentes() {
        $this->load->model('docente_model', 'docente');
        $output = $this->docente->gestion_docente();
        $this->_docentes_output($output);
    }

    private function _docentes_output($output = null) {
        $this->load->view('administrador/docentes.php', $output);
    }

}
