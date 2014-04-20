<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Docente extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */

        $this->load->library('grocery_CRUD');
        $this->load->model('produccion_model');


        $this->load->model('docente_model', 'docente');
        $this->load->model('seguridad_model', 'seguridad');
    }

    public function tmp($func = 'index') {
        if ($this->seguridad->es_docente()) {
            $this->$func();
        } else {
            show_404();
        }
    }

    private function index() {
        $this->load->view('docente/home');
    }

    private function redirect() {
        redirect('/docente/tmp/index');
    }

    private function producciones() {
        $this->_producciones_output();
    }

    private function monografia() {
        $produccion = new Produccion_model();

        $output = $produccion->gestion_monografia();

        $this->_monografia_output($output);
    }

    private function _producciones_output() {
        $this->load->view('docente/producciones.php');
    }

    private function _monografia_output($output = null) {
        $this->load->view('docente/monografia.php', $output);
    }

}
