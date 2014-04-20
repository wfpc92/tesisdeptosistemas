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
        $this->load->model('gestorsesiones_model', 'sesion');
    }

    public function nueva_session($usuario) {
        $this->sesion->crear_session($usuario);
    }

    public function datos_validos() {
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
        return $this->sesion->es_tipo_usuario('administrador') ? TRUE : FALSE;
    }

    public function es_docente() {
        return $this->sesion->es_tipo_usuario('docente') ? TRUE : FALSE;
    }

    public function es_jefe() {
        return $this->sesion->es_tipo_usuario('jefe_departamento') && $this->sesion->es_tipo_usuario('docente') ? TRUE : FALSE;
    }

    public function logout() {
        $this->sesion->logout();
    }

}

?>
