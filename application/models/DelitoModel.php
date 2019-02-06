<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DelitoModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos()
    {
        $this->db->select('*');
        $this->db->from('tipo_delito');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function obtenerdelitos($id)
    {
        $this->db->select('*');
        $this->db->from('historial_delictivo hd');
        $this->db->join('tipo_delito td','hd.id_delito = td.id_delito');
        $this->db->where('id_politico = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function registrardelito($data){
        try
        {
            $this->db->insert('tipo_delito',
            array('nombre'=>$data['nombre']));

            $this->db->select('max(id_delito) as id, nombre');
            $this->db->from('tipo_delito');
            $this->db->where('id_delito = (select max(id_delito) from tipo_delito)');
            $query = $this->db->get();
            $data_delito = $query->result_array();
            return json_encode(array("result"=>"success",'option'=>array("name"=>"delitoP","valor"=>$data_delito[0]['id'],"opcion"=>$data_delito[0]['nombre'])));
        }
        catch(Exception $e){
            return json_encode(array("result"=>"error"));
        }
    }

}
