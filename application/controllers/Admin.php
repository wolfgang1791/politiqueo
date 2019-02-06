<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('inicioModel');
		//$this->load->helper('Modulo');
    }

	public function index()
	{
		$id_rol =  $this->session->userdata('id_rol');
		$resultado = $this->inicioModel->getModulo($id_rol);
		$data = array("content"=>'admin/inicio',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function successMsj($tarea){
		$data = array("mensaje"=>$tarea);
		echo $tarea;
		//$this->load->view('admin/msuccess', $data);
	}
}
