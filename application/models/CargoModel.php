<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos()
    {
        $this->db->select('*');
        $this->db->from('cargos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function obtenercargo($id)
    {
        $this->db->select('*');
        $this->db->from('historial_cargos hc');
        $this->db->join('cargos c','hc.id_cargo = c.id_cargo');
        $this->db->where('id_politico = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function registrarcargo($data){
        try
        {
            $this->db->insert('cargos',
            array('descripcion'=>$data['descripcion'],
                     'periodo'=>$data['periodo'],
                     'tipo_periodo'=>$data['tipoperiodo'])
           );
            $this->db->select('max(id_cargo) as id, descripcion as nombre');
            $this->db->from('cargos');
            $this->db->where('id_cargo = (select max(id_cargo) from cargos)');
            $query = $this->db->get();
            $data_cargo = $query->result_array();
            return json_encode(array("result"=>"success",'option'=>array("name"=>"cargoP","valor"=>$data_cargo[0]['id'],"opcion"=>$data_cargo[0]['nombre'])));
        }
        catch(Exception $e){
            return "error";
        }
    }

}
