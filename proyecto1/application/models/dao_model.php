<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DAO_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function conectar() {
        $this->load->database();
        return true;
    }

    function registro_docente() {

        $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";

        $this->db->query($sql, array(3, 'live', 'Rick'));
    }

    function get_contrasena_usuario($email) {
        if ($this->conectar()) {
            $query = $this->db->query('
                    SELECT USU_CONTRASENA AS password 
                    FROM usuario
                    WHERE USU_EMAIL = ?'
                    , array($email));
            if ($query->num_rows() > 0) {
                $row = $query->row(1);
                return $row->password;
            }
        }
        return FALSE;
    }

}

?>