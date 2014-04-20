<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gestorsesiones_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function crear_session() {
        $newdata = array(
            'email' => $this->usuario->email,
            'kind' => $this->usuario->tipo_usuario
        );
        $this->session->set_userdata($newdata);
        echo 'informacion de session nueva: ';
        print_r($this->session->all_userdata());
    }

    public function logout() {
        $this->session->sess_destroy();
    }

    public function esta_conectado($email) {
        print_r($this->session->all_userdata());
        $email_cookie = $this->session->userdata('email');
        echo 'email entrante: ' . $email . ' email saliente: ' . $email_cookie;
        return $email == $email_cookie ? TRUE : FALSE;
    }

}
