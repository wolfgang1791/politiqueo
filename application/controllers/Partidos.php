<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partidos extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
    }

    public function index(){
        if($this->input->get('id_partido') == ""){
            redirect(base_url());
        }
        $id_partido = $this->input->get('id_partido');
        $listaPoliticos = $this->partidosModel->listarPoliticos($id_partido);
        $nombrePartido = $this->partidosModel->getNombre($id_partido);
		$data = array("content"=>'politicos/lista-politicos',"dataView"=>array('listaPoliticos'=>$listaPoliticos, 'nombrePartido'=>$nombrePartido));
		$this->load->view('layout',$data);
    }
}
