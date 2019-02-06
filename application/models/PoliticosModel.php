<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoliticosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('politicos');
        $this->db->where('estado = 1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listarTodosAdmin(){
        $this->db->select('*');
        $this->db->from('politicos pol');
        $this->db->join('partidos par','pol.id_partido=par.id_partido');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPolitico($id_politico){
        $this->db->select('pol.id_politico, pol.nombres, pol.apellidos, pol.fec_nacimiento, pol.dni, pol.id_cargo, pol.representa ,pol.id_partido, pol.condicion, pol.imagen, par.nombre');
        $this->db->from('politicos pol');
        $this->db->join('partidos par','pol.id_partido=par.id_partido');
        $this->db->where('id_politico = '.$id_politico);
        $this->db->where('pol.estado = 1');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result[0];
        }
    }
    public function getPoliticoAdmin($id_politico){
        $this->db->select('pol.id_politico, pol.nombres, pol.apellidos, pol.fec_nacimiento, pol.dni, pol.id_cargo, pol.representa ,pol.id_partido, pol.condicion, pol.imagen, par.nombre');
        $this->db->from('politicos pol');
        $this->db->join('partidos par','pol.id_partido=par.id_partido');
        $this->db->where('id_politico = '.$id_politico);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result[0];
        }
    }

    public function registrarpolitico($data_politico,$data_academica,$data_cargos,$data_delitos){

       try {
           $this->db->trans_begin();
           $this->db->insert('politicos',
           array('nombres'=>$data_politico['nombres'],
                    'apellidos'=>$data_politico['apellidos'],
                    'nombres'=>$data_politico['nombres'],
                    'apellidos'=>$data_politico['apellidos'],
                    'imagen'=>$data_politico['url'],
                    'dni'=>$data_politico['dni'],
                    'fec_nacimiento'=>$data_politico['edad'],
            //        'id_cargo'=>$data_politico['cargo'],
                    'representa'=>$data_politico['representa'],
                    'id_partido'=>$data_politico['bancada'],
                    'condicion'=>$data_politico['condicion'],
                    'estado' => 1)
          );

          $this->db->select('max(id_politico) as id');
          $this->db->from('politicos');
          $query = $this->db->get();
          $id = $query->result_array();

          if(isset($data_academica['grado'])){
              for ($i=0; $i < count($data_academica['grado']); $i++) {
                  $this->db->insert('historial_academico',
                  array('id_politico'=>$id[0]['id'],
                        'id_grado'=>$data_academica['grado'][$i],
                        'descripcion'=>$data_academica['carrera'][$i],
                        'id_usuario'=>$this->session->userdata('id_usuario'),
                        'fec_modificacion'=>date("Y-m-d"),
                        'fec_inicio'=>$data_academica['añoinicio'][$i],
                        'fec_fin'=>$data_academica['añofinal'][$i])
                  );
              }
          }

          if(isset($data_cargos['cargo'])){
              for ($i=0; $i < count($data_cargos['cargo']); $i++) {
                  $this->db->insert('historial_cargos',
                  array('id_politico'=>$id[0]['id'],
                        'id_cargo'=>$data_cargos['cargo'][$i],
                        'id_usuario'=>$this->session->userdata('id_usuario'),
                        'fec_modificacion'=>date("Y-m-d"),
                        'fec_inicio'=>$data_cargos['añoinicio'][$i],
                        'fec_fin'=>$data_cargos['añofinal'][$i])
                  );
              }
          }


          if(isset($data_delitos['delito'])){
              for ($i=0; $i < count($data_delitos['delito']); $i++) {
                  $this->db->insert('historial_delictivo',
                  array('id_politico'=>$id[0]['id'],
                        'id_delito'=>$data_delitos['delito'][$i],
                        'descripcion'=>$data_delitos['descripcion'][$i],
                        'fec'=>$data_delitos['fecha'][$i],
                        'id_usuario'=>$this->session->userdata('id_usuario'),
                        'fec_modificacion'=>date("Y-m-d"))
                  );
              }
          }


         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
             return "error";
         }
         else
         {
             $this->db->trans_commit();
             return "success";
         }
       }
       catch (Exception $e) {

          return "error";
       }
    }

    public function actualizarpolitico($data,$data_academica,$data_cargos,$data_delitos){
        try
        {
            $this->db->trans_begin();

            $this->db->set('nombres',$data['nombres']);
            $this->db->set('apellidos',$data['apellidos']);
            $this->db->set('imagen',$data['url']);
            $this->db->set('fec_nacimiento',$data['edad']);
            $this->db->set('dni',$data['dni']);
        //    $this->db->set('id_cargo',$data['cargo']);
            $this->db->set('representa',$data['representa']);
            $this->db->set('id_partido',$data['bancada']);
            $this->db->set('condicion',$data['condicion']);
            $this->db->where('id_politico',$data['id'] );
            $this->db->update('politicos');

            $this->db->where('id_politico', $data['id']);
            $this->db->delete('historial_academico');


            if(isset($data_academica['grado'])){
                for ($i=0; $i < count($data_academica['grado']); $i++) {
                    $this->db->insert('historial_academico',
                    array('id_politico'=> $data['id'],
                          'id_grado'=>$data_academica['grado'][$i],
                          'descripcion'=>$data_academica['carrera'][$i],
                          'id_usuario'=>$this->session->userdata('id_usuario'),
                          'fec_modificacion'=>date("Y-m-d"),
                          'fec_inicio'=>$data_academica['añoinicio'][$i],
                          'fec_fin'=>$data_academica['añofinal'][$i])
                    );
                }
            }

            $this->db->where('id_politico', $data['id']);
            $this->db->delete('historial_cargos');

            if(isset($data_cargos['cargo'])){
                for ($i=0; $i < count($data_cargos['cargo']); $i++) {
                    $this->db->insert('historial_cargos',
                    array('id_politico'=> $data['id'],
                          'id_cargo'=>$data_cargos['cargo'][$i],
                          'id_usuario'=>$this->session->userdata('id_usuario'),
                          'fec_modificacion'=>date("Y-m-d"),
                          'fec_inicio'=>$data_cargos['añoinicio'][$i],
                          'fec_fin'=>$data_cargos['añofinal'][$i])
                    );
                }
            }

            $this->db->where('id_politico', $data['id']);
            $this->db->delete('historial_delictivo');

            if(isset($data_delitos['delito'])){
                for ($i=0; $i < count($data_delitos['delito']); $i++) {
                    $this->db->insert('historial_delictivo',
                    array('id_politico'=>$data['id'],
                          'id_delito'=>$data_delitos['delito'][$i],
                          'descripcion'=>$data_delitos['descripcion'][$i],
                          'fec'=>$data_delitos['fecha'][$i],
                          'id_usuario'=>$this->session->userdata('id_usuario'),
                          'fec_modificacion'=>date("Y-m-d"))
                    );
                }
            }

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                return "error";
            }
            else
            {
                $this->db->trans_commit();
                return "success";
            }
        }
        catch (Exception $e) {
            return "error";
        }
    }
    public function borrarpolitico($id){
        try {
            $this->db->set('estado', 0);
            $this->db->where('id_politico', $id);
            $this->db->update('politicos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

    public function activarpolitico($id){
        try {
            $this->db->set('estado', 1);
            $this->db->where('id_politico', $id);
            $this->db->update('politicos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

    public function filtrarpoliticos($palabra)
   {
       $this->db->select('*');
       $this->db->from('politicos');
       $this->db->like('nombres', $palabra);
       $this->db->or_like('apellidos', $palabra);
       $this->db->where('estado = 1');
       $query = $this->db->get();
       $resultado = $query->result_array();
       return $resultado;
   }

}
