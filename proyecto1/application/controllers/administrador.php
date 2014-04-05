<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Standard Libraries of codeigniter are required */
		$this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
        $this->load->model('docente_model');
    }

    public function index() {
        $this->load->view('administrador/home');
    }
    
    public function tmp($func){
        $this->$func();
    }
    
    private function redirect(){
        redirect(site_url('/administrador'));
    }

    public function crear_usuario() {
        $this->load->database();
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('administrador/');
    }

    public function validar_formulario_crear_usuario() {
        $this->load->view('administrador/crear_usuario');
    }

    public function docentes() {
        $docente = new Docente_model();

        $output = $docente->gestion_docente();

        $this->_docentes_output($output);
    }

    public function _docentes_output($output = null) {
        $this->load->view('administrador/docentes.php', $output);
    }
    
    function logout()
    {
        $this->load->model('gestorsesiones_model','sesion');
        $this->sesion->logout();
        $this->load->view('home');
    }

}