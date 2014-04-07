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
    }
    
    public function index() {
        $this->load->view('docente/home');
    }
    
    public function producciones(){
        $this->_producciones_output();
    }
    
    public function monografia(){
        $produccion = new Produccion_model();
        
        $output = $produccion->gestion_monografia();
        
        $this->_monografia_output($output);
    }
    
    public function _producciones_output() {
        $this->load->view('docente/producciones.php');
    }
    
    public function _monografia_output($output = null) {
        $this->load->view('docente/monografia.php', $output);
    }
}