<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradoModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function registrargrado($data){
        try
        {
            $this->db->insert('grados_academicos',
            array('nombre'=>$data['nombre']));

            $this->db->select('max(id_grado) as id, nombre');
            $this->db->from('grados_academicos');
            $this->db->where('id_grado = (select max(id_grado) from grados_academicos)');
            $query = $this->db->get();
            $data_grado = $query->result_array();
            return json_encode(array("result"=>"success",'option'=>array("name"=>"gradoP","valor"=>$data_grado[0]['id'],"opcion"=>$data_grado[0]['nombre'])));
        }
        catch(Exception $e){
            return json_encode(array("result"=>"error"));
        }
    }

    public function listarTodos()
    {
        $this->db->select('*');
        $this->db->from('grados_academicos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function obtenerestudios($id)
    {
        $this->db->select('*');
        $this->db->from('historial_academico ha');
        $this->db->join('grados_academicos ga','ha.id_grado = ga.id_grado');
        $this->db->where('id_politico = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

}
