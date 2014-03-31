<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DAO_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function conectar() {
        $this->load->database();
        echo 'conectado';
        return true;
    }

    function registro_docente() {
        
        $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";

        $this->db->query($sql, array(3, 'live', 'Rick'));
    }

}

?>