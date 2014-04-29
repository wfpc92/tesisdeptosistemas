<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jefe_Departamento extends CI_Controller {

    public $STR_INDEX = "jefe_departamento/home";

    function __construct() {
        parent::__construct();
        $this->load->model('docente_model', 'docente');
        $this->load->model('jefe_departamento_model', 'jefe_departamento');
        $this->load->model('seguridad_model', 'seguridad');
    }

    public function tmp($func = 'index') {
        if ($this->seguridad->es_jefe()) {
            $this->$func();
        } else {
            show_404();
        }
    }

    private function index() {
        $roles = $this->seguridad->roles();
        $vistas = array();
        foreach ($roles as $key => $value) {
            array_push($vistas, $roles[$key] . '/home');
        }
        $this->data['vistas'] = $vistas;
        $this->load->view('home', $this->data);
    }

    private function redirect() {
        redirect('/jefe_departamento/tmp/index');
    }

}
