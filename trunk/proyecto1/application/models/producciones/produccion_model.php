<?php

class Produccion_model extends CI_Model {

    function __construct() {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        /* ------------------ */

        $this->load->library('grocery_CRUD');
        $this->load->model('sistema/dao_model', 'dao');
        $this->load->model('producciones/monografia_model', 'monografia');
        $this->load->model('producciones/articulo_model', 'articulo');
        $this->load->model('producciones/reporte_model', 'reporte');
    }

    public function gestion_monografia($codigo) {
        $output = $this->monografia->gestion_monografia($codigo);
        return $output;
    }

    public function gestion_articulo($codigo) {
        $output = $this->articulo->gestion_articulo($codigo);
        return $output;
    }

    public function gestion_reporte($codigo) {
        $output = $this->reporte->gestion_reporte($codigo);
        return $output;
    }

    public function producciones_count() {
        return $this->db->count_all("produccion");
    }

    public function obtener_producciones() {
        $query = $this->db->get("produccion");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function obtener_produccion($PROD_CODIGO) {
        $query = $this->db->query('
                    SELECT p.PROD_CODIGO, p.PROD_TITULO, p.PROD_RESUMEN, 
                    p.PROD_FECHA_PUBLICACION, p.PROD_GRUPO_INVESTIGACION, 
                    p.PROD_PERMISO, p.PROD_ESTADO, p.PROD_ARCHIVO_ADJUNTO,
                    m.MONOGRAFIA_TIPO, m.MONOGRAFIA_AUTOR1, m.MONOGRAFIA_AUTOR2,
                    m.MONOGRAFIA_CODIRECTOR, r.RPT_DESCRIPCION,
                    a.ART_FACTOR_IMPACTO
                    FROM produccion as p
                    LEFT JOIN monografia as m on p.PROD_CODIGO = m.PROD_CODIGO
                    LEFT JOIN reporte_tecnico as r on p.PROD_CODIGO = r.PROD_CODIGO
                    LEFT JOIN articulo as a on p.PROD_CODIGO = a.PROD_CODIGO
                    where p.PROD_CODIGO = ?'
                , array($PROD_CODIGO));
        if ($query->num_rows() == 1) {
            include_once('SP_Produccion.php');
            $produccion = $query->result("SP_Produccion");
            return $produccion[0];
        }
        return NULL;
    }

    public function obtener_producciones_docente($id) {
        $query = $this->db->query('
                    SELECT p.PROD_CODIGO, p.PROD_TITULO, p.PROD_RESUMEN, 
                    p.PROD_FECHA_PUBLICACION, p.PROD_GRUPO_INVESTIGACION, 
                    p.PROD_PERMISO, p.PROD_ESTADO, p.PROD_ARCHIVO_ADJUNTO,
                    m.MONOGRAFIA_TIPO, m.MONOGRAFIA_AUTOR1, m.MONOGRAFIA_AUTOR2,
                    m.MONOGRAFIA_CODIRECTOR, r.RPT_DESCRIPCION,
                    a.ART_FACTOR_IMPACTO
                    FROM produccion as p
                    LEFT JOIN monografia as m on p.PROD_CODIGO = m.PROD_CODIGO
                    LEFT JOIN reporte_tecnico as r on p.PROD_CODIGO = r.PROD_CODIGO
                    LEFT JOIN articulo as a on p.PROD_CODIGO = a.PROD_CODIGO
                    LEFT JOIN usuario_produccion as up on p.PROD_CODIGO = up.PROD_CODIGO
                    where up.USU_CODIGO = ?'
                , array($id));
        if ($query->num_rows() == 1) {
            include_once('SP_Produccion.php');
            $produccion = $query->result("SP_Produccion");
            return $produccion[0];
        }
        return NULL;
    }

    public function email_docente($PROD_CODIGO) {
        $query = $this->db->query("
                    SELECT u.email
                    FROM usuario_produccion as up
                    LEFT JOIN users as u on u.id = up.USU_CODIGO
                    where up.PROD_CODIGO = $PROD_CODIGO"
                , array($PROD_CODIGO));
        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result[0]->email;
        }
        return NULL;
    }

}
