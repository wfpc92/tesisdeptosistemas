<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seguridad_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->model('administrator_model', 'administrator');
    }

    public function datosValidos($email, $password) {
        $result = false;
        if ($email != '' and $password != '') {
            $result = true;
        }
        return $result;
    }

    public function validar_usuario($email, $password) {
        $this->load->model('dao_model', 'dao');
        $contra = $this->dao->get_contrasena_usuario($email);
        if ($contra == $password) {
            return 'administrador';
        } else {
            return NULL;
        }
    }

    /**
     * Verifica que el administrador que existe en la base de datos concuerda 
     * validar acceso seguro.
     * con el acceso
     * @param type $email
     * @param type $password
     */
    public function is_administrator($email, $password) {
        if ($this->administrator->email == $email and
                $this->administrator->password == $password) {
            return TRUE;
        }
        return FALSE;
    }

}

?>
