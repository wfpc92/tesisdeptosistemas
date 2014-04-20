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
     */
    public function es_administrador() {
        if ($this->sesion->esta_conectado($this->administrador->email)) {
            return TRUE;
        }
        return FALSE;
    }

    public function logout() {
        $this->sesion->logout();
    }

}

?>
