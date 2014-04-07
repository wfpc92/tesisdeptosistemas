<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Produccion_model extends CI_Model {
    function __construct() {
        parent::__construct();
        
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
    }
    
    public function gestion_monografia(){
        $crud = new grocery_CRUD();
        $crud->set_table('monografia')->set_subject('Monografia');
        //$crud->set_relation_n_n('Roles', 'usuario_rol', 'rol','USU_CODIGO','ROL_CODIGO','ROL_NOMBRE');      
        
        /*columnas a mostrar*/
        $crud->columns('PROD_TITULO','PROD_RESUMEN','PROD_FECHA_PUBLICACION','PROD_GRUPO_INVESTIGACION', 'PROD_PERMISO','PROD_ESTADO','MONOGRAFIA_TIPO','MONOGRAFIA_ARCHIVO_ADJUNTO','MONOGRAFIA_AUTOR1','MONOGRAFIA_AUTOR2','MONOGRAFIA_CODIRECTOR');
        $crud->fields('PROD_TITULO','PROD_RESUMEN','PROD_FECHA_PUBLICACION','PROD_GRUPO_INVESTIGACION', 'PROD_PERMISO','PROD_ESTADO','MONOGRAFIA_TIPO','MONOGRAFIA_ARCHIVO_ADJUNTO','MONOGRAFIA_AUTOR1','MONOGRAFIA_AUTOR2','MONOGRAFIA_CODIRECTOR');
        
        /*campos en add*/
        $crud->add_fields('PROD_TITULO','PROD_RESUMEN','PROD_FECHA_PUBLICACION','PROD_GRUPO_INVESTIGACION', 'PROD_PERMISO','PROD_ESTADO','MONOGRAFIA_TIPO','MONOGRAFIA_ARCHIVO_ADJUNTO','MONOGRAFIA_AUTOR1','MONOGRAFIA_AUTOR2','MONOGRAFIA_CODIRECTOR');
        
        /*campos en edit*/
        $crud->edit_fields('PROD_TITULO','PROD_RESUMEN','PROD_FECHA_PUBLICACION','PROD_GRUPO_INVESTIGACION', 'PROD_PERMISO','PROD_ESTADO','MONOGRAFIA_TIPO','MONOGRAFIA_ARCHIVO_ADJUNTO','MONOGRAFIA_AUTOR1','MONOGRAFIA_AUTOR2','MONOGRAFIA_CODIRECTOR');
        
        /*Los nombres de los campos*/
        $crud->display_as('PROD_TITULO','Titulo');
        $crud->display_as('PROD_RESUMEN','Resumen');
        $crud->display_as('PROD_FECHA_PUBLICACION','Fecha de Publicacion');
        $crud->display_as('PROD_GRUPO_INVESTIGACION','Grupo de Investigacion');
        $crud->display_as('PROD_PERMISO','Permiso');
        $crud->display_as('PROD_ESTADO','Estado');
        $crud->display_as('MONOGRAFIA_TIPO','Tipo');
        $crud->display_as('MONOGRAFIA_ARCHIVO_ADJUNTO','Archivo PDF');
        $crud->display_as('MONOGRAFIA_AUTOR1','Autor');
        $crud->display_as('MONOGRAFIA_AUTOR2','Autor 2');
        $crud->display_as('MONOGRAFIA_CODIRECTOR','Codirector');
        
        /*Campos requeridos*/
        $crud->required_fields('PROD_TITULO','PROD_RESUMEN','PROD_FECHA_PUBLICACION','PROD_PERMISO');
        
        /*Tipo de campo*/
        $crud->field_type('PROD_PERMISO','dropdown',array('1'=>'Privada','2'=>'Publico'));
        
        $output = $crud->render();
        return $output;
    }
}
?>
