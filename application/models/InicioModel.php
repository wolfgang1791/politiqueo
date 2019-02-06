<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getModulo($id_rol){
        $this->db->select('*');
        $this->db->from('modulos m');
        $this->db->join('modulos_asignados ma','m.id_modulo = ma.id_modulo');
        $this->db->where('ma.id_rol = '.$id_rol);
        $query = $this->db->get();
        return $query->result_array();
    }

}
