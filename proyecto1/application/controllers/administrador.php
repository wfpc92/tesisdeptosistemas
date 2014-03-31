<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    
    public function index() {
        $this->load->view('administrador/home');
    }
    
    public function crear_usuario () {
        $this->load->database();   
        $this->load->model('administrador_model','administrador');
        $this->load->view('administrador/');
    }
    
    public function validar_formulario_crear_usuario (){
        $this->load->view('administrador/crear_usuario');
    }

}