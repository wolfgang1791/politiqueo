<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('organos');
        $this->db->where('estado = 1');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result)>0){
            return $result;
        }
    }

    public function listarTodosAdmin(){
        $this->db->select('*');
        $this->db->from('organos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function registrarorgano($data){
        try
        {
            $this->db->insert('organos',
            array('descripcion'=>$data['descripcion'],
                     'titulo'=>$data['titulo'],
                     'imagen'=>$data['url'],
                     'estado'=>1)
           );
           return "success";
        }
        catch(Exception $e){
            return "error";
        }
    }

    public function obtenerorgano($id){
        $this->db->select('*');
        $this->db->from('organos');
        $this->db->where('id_organo ='.$id);
        $this->db->where('estado = 1');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result)>0){
            return $result;
        }
    }

    public function actualizarorgano($data){
        try
        {
            $this->db->set('descripcion',$data['descripcion']);
            $this->db->set('titulo',$data['titulo']);
            $this->db->set('imagen',$data['url']);
            $this->db->where('id_organo',$data['id'] );
            $this->db->update('organos');
            return "success";
        }
        catch (Exception $e) {
            return "error";
        }
    }

    public function borrarorgano($id){
    try
    {
        $this->db->set('estado', 0);
        $this->db->where('id_organo', $id);
        $this->db->update('organos');
        return "success";
     }
     catch(Exception $e){
         return "error";
     }
    }

    public function activarorgano($id){
        try {
            $this->db->set('estado', 1);
            $this->db->where('id_organo', $id);
            $this->db->update('organos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

}
