<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

    public function getUsuario($data){
        $this->db->select('*');
        $this->db->from('usuarios u');
        $this->db->where('u.correo ',$data['email']);
        $this->db->where('u.pass ',$data['pass']);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
        else{
            return false;
        }
    }

}
