<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gestorsesiones_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->model('administrator_model', 'administrator');
    }

    public function crear_session($email, $kind) {
        $this->load->library('session');
        $newdata = array(
            'email' => $email,
            'kind' => $kind
        );
        $this->session->set_userdata($newdata);
    }
    
    public function logout() {
        $this->load->library('session');
        $this->session->sess_destroy();
    }

}
?>

