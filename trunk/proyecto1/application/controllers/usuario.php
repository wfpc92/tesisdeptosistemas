<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include 'administrador.php';

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('cookiemanager_model', 'cookiemanager');
        //$this->load->model('dataaccess_model', 'dataaccess');
        //$this->load->model('emailservice_model', 'emailservice');
        $this->data['title'] = 'homepage';
        $this->data['header'] = 'user/header';
        $this->data['content'] = 'content';
        $this->data['footer'] = 'footer';
    }

    public function index() {
        $this->load->view('home');
    }

    /*     * *
     * Recibe email y password, verifica con la seguridad y crea una cookie
     * para establecer comunicacion cliente servidor.
     */

    public function login() {
        if (!isset($_POST))
            return;
        $this->load->model('seguridad_model', 'seguridad');
        $this->load->model('gestorsesiones_model', 'sesiones');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $datosValidos = $this->seguridad->datosValidos($email, $password);
        $controller = FALSE;
        if ($datosValidos) {
            $tipo_usuario = $this->seguridad->validar_usuario($email, $password);
            $controller = ($tipo_usuario == "administrador") ?
                    new Administrador() :
                    FALSE;
            if ($controller != FALSE) {
                $this->sesiones->crear_session($email, $tipo_usuario);
                $controller->tmp('redirect');
                return;
            }
        }
        if (!$datosValidos || !$controller) {
            $this->data['summary'] = "email or password incorrect.";
        }
        $this->load->view("home",$this->data);
    }

    public function vista_restablecer_contrasena() {
        $this->load->view('vista_restablecer_contrasena');
    }

    public function restablecer_contrasena() {
        $this->load->model('dao_model', 'dao');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = $this->dao->get_contrasena_usuario($email);
        if ($password) {
            $this->load->model('clienteemail_model', 'email');
            $this->email->enviar_contrasena($email, $password);
            $this->data['email'] = $email;
            echo 'contrasena enviada';
        }
        else
            echo 'email no valido, contrasena no enviada';
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */