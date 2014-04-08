<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Docente_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function gestion_docente() {
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('usuario')->set_subject('Docente');
        $crud->set_relation_n_n('Roles', 'usuario_rol', 'rol', 'USU_CODIGO', 'ROL_CODIGO', 'ROL_NOMBRE');

        /* columnas a mostrar */
        $crud->columns('USU_NOMBRE', 'USU_APELLIDO', 'USU_EMAIL', 'USU_LOGIN', 'USU_ESTADO');
        $crud->fields('USU_NOMBRE', 'USU_APELLIDO', 'USU_EMAIL', 'USU_LOGIN', 'USU_CONTRASENA', 'USU_ESTADO');

        /* campos en add */
        $crud->add_fields('USU_NOMBRE', 'USU_APELLIDO', 'USU_EMAIL', 'USU_LOGIN', 'USU_CONTRASENA', 'USU_ESTADO');

        /* campos en edit */
        $crud->edit_fields('USU_NOMBRE', 'USU_APELLIDO', 'USU_EMAIL', 'USU_LOGIN', 'USU_ESTADO', 'Roles');

        /* Los nombres de los campos */
        $crud->display_as('USU_NOMBRE', 'Nombre');
        $crud->display_as('USU_APELLIDO', 'Apellido');
        $crud->display_as('USU_EMAIL', 'Email');
        $crud->display_as('USU_LOGIN', 'Login');
        $crud->display_as('USU_CONTRASENA', 'Contraseña');
        $crud->display_as('USU_ESTADO', 'Estado');

        /* Campos requeridos */
        $crud->required_fields('USU_NOMBRE', 'USU_APELLIDO', 'USU_EMAIL', 'USU_LOGIN', 'USU_CONTRASENA');

        /* Tipo de campo */
        $crud->field_type('USU_CONTRASENA', 'password');
        $crud->field_type('USU_ESTADO', 'enum', array('activo', 'inactivo'));

        /* Edit vs Add */
        $state = $crud->getState();
        $state_info = $crud->getStateInfo();

        if ($state == 'add') {
            $crud->field_type('USU_ESTADO', 'hidden', 'activo');
        } elseif ($state == 'edit') {
            $primary_key = $state_info->primary_key;
            $crud->field_type('USU_CONTRASENA', 'invisible');
        }
        $crud->callback_before_insert(array($this, 'encrypt_password_callback'));

        $output = $crud->render();
        return $output;
    }

    function encrypt_password_callback($post_array, $primary_key = null) {
        //$this->load->library('encrypt');

        $key = 'super-secret-key';

        $hash = hash_init('md5', HASH_HMAC, $key);
        hash_update($hash, $post_array['USU_CONTRASENA']);
        $hash = hash_final($hash);

        $post_array['USU_CONTRASENA'] = $hash;
        //$post_array['password'] = $this->encrypt->encode($post_array['password']);
        return $post_array;
    }

}