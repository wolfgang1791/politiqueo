<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function getModulo($id_rol){ // vistas
    $CI =& get_instance();
    $CI->db->select('*');
    $CI->db->from('modulos m');
    $CI->db->join('modulos_asignados ma','m.id_modulo = ma.id_modulo');
    $CI->db->where('ma.id_rol = '.$id_rol);
    $query = $CI->db->get();
    return $query->result_array();
}

function getModulos(){ // registros
    $CI =& get_instance();
    $query = $CI->db->query("select * from modulos");
    return $query->result_array();
}

function totalModulos($id_rol){
    $CI =& get_instance();

    $usuarios = 0;
    $roles = 0;
    $resultado = getModulo($id_rol);
    for ($i=0; $i < count($resultado); $i++) {
        if($resultado[$i]['id_modulo'] == 1){
            $usuarios = $CI->db->count_all('usuarios');
        }
        else if( $resultado[$i]['id_modulo'] == 2 ){
            $roles = $CI->db->count_all('roles');
        }
    }
    $count = array($usuarios, $roles);
    return $count;
}

function getRol(){
    $CI =& get_instance();
    $query = $CI->db->query("select * from roles;");
    return $query->result_array();
}
