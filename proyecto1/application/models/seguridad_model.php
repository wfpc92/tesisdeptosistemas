<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Aqui se debe implementar todo lo relacionado a verificacion de datos, 
 * formularios, todo lo relacionado con la seguridad
 * descrito en:
 * http://escodeigniter.com/guia_usuario/general/security.html
 * http://uno-de-piera.com/buenas-practicas-y-consejos-en-codeigniter/
 * http://www.websec.mx/blog/ver/inseguridad-datos-sesion-codeigniter
 * 
 */
class Seguridad_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->model('administrator_model', 'administrator');
    }

    public function datosValidos() {
        $result = false;
        if ($this->usuario->email != '' && $this->usuario->password != '') {
            $result = true;
        }
        return $result;
    }

    public function validar_usuario() {
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
