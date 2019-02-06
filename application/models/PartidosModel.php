<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartidosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('partidos');
        $this->db->where('estadop = 1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listarTodosAdmin(){
        $this->db->select('*');
        $this->db->from('partidos');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function listarPoliticos($id_partido){
        $this->db->select('*');
        $this->db->from('politicos');
        $this->db->where('id_partido = '.$id_partido);
        $this->db->where('estado = 1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNombre($id_partido){
        $this->db->select('*');
        $this->db->from('partidos');
        $this->db->where('id_partido = '.$id_partido);
        $this->db->where('estadop = 1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function registrarpartido($data){
        try
        {
            $this->db->insert('partidos',
            array('nombre'=>$data['nombre'],
                     'imagen'=>$data['url'],
                     'estadop'=>1)
           );
           return "success";
        }
        catch(Exception $e){
            return "error";
        }
    }

    public function obtenerpartido($id){
        $this->db->select('*');
        $this->db->from('partidos');
        $this->db->where('id_partido ='.$id);
        $this->db->where('estadop = 1');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result)>0){
            return $result;
        }
    }

    public function actualizarpartido($data){
        try
        {
            $this->db->set('nombre',$data['nombre']);
            $this->db->set('imagen',$data['url']);
            $this->db->where('id_partido',$data['id'] );
            $this->db->update('partidos');
            return "success";
        }
        catch (Exception $e) {
            return "error";
        }
    }

    public function borrarpartido($id){
        try
        {
            $this->db->set('estadop', 0);
            $this->db->where('id_partido', $id);
            $this->db->update('partidos');
            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

    public function activarpartido($id){
        try {
            $this->db->set('estadop', 1);
            $this->db->where('id_partido', $id);
            $this->db->update('partidos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

}
