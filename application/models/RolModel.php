<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolModel extends CI_Model{

    public function getRoles(){
        $this->db->select('r.id_rol,r.descripcion,count(u.id_rol) as total');
        $this->db->from('roles r');
        $this->db->join('usuarios u','u.id_rol = r.id_rol','left');
        $this->db->group_by('r.id_rol');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRol($idRol){
        $this->db->select('ma.id_rol, ma.id_modulo, r.descripcion, m.nombre');
        $this->db->from('modulos m');
        $this->db->join('modulos_asignados ma','m.id_modulo = ma.id_modulo','left');
        $this->db->join('roles r','r.id_rol = ma.id_rol','right');
        $this->db->where('r.id_rol',$idRol);
        $query = $this->db->get();
        $dataRol = $query->result_array();
        $array_out = array('id_rol'=>$dataRol[0]['id_rol'],'descripcion'=>$dataRol[0]['descripcion'],'modulos'=>$this->getModulosAux());
        foreach ($array_out['modulos'] as $key => $modulo) {
            $array_out['modulos'][$key]['asignado'] = (array_search($modulo['id_modulo'],array_column($dataRol,'id_modulo'))!==FALSE) ? (1) : (0);
        }
        return $array_out;
    }

    public function registrarrol($data){
        $this->db->insert('roles', array('descripcion'=>$data['descripcion']));
    }

    public function modulosasignados($data){
        $this->db->select("max(id_rol) as id");
        $this->db->from('roles');
        $query = $this->db->get();
        $row = $query->result_array();

        $this->eliminarModAsig($row[0]['id'],$data);
    }

    public function borrarrol($id)
    {
        $this->db->delete('modulos_asignados', array('id_rol'=>$id));
        if (!$this->db->delete('roles', array('id_rol' => $id))) {
            return false;
        }
        else {
            return true;
        }
    }

    public function actualizarRol($id, $data){
        $this->db->where('id_rol', $id);
        $this->db->update('roles', array('descripcion'=>$data['data_rol']['descripcion']));
        $this->db->delete('modulos_asignados', array('id_rol'=>$id));
        $this->eliminarModAsig($id,$data['data_modulos']);
    }

    private function eliminarModAsig($id, $data){
        for ($i=0; $i < count($data['modulos']); $i++) {
            $this->db->insert('modulos_asignados',
            array('id_modulo'=>$data['modulos'][$i],'id_rol'=>$id));
        }
    }

    private function getModulosAux(){
        $query = $this->db->get('modulos');
        return $query->result_array();
    }

}
