<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('rolModel');
        //$this->load->helper('Modulo');
		$this->load->library(array('form_validation'));
		if(!$this->session->userdata('id_usuario')){
		    $this->session->sess_destroy();
			redirect('login');
		}
    }

	public function index()
	{
        $resultado = $this->rolModel->getRoles();
		$data = array("content"=>'admin/roles',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function anadirRol(){
		$this->load->view('admin/modales/mroles');
	}

	public function editarRol(){
		$id = ($this->input->post('idObj'))? $this->input->post('idObj') : $this->input->get('id_rol');
		$dataRol = $this->rolModel->getRol($id);
		$dataView = array('dataRol'=>$dataRol,'edicion'=>true,'id_rol'=>$id);
		$this->load->view('admin/modales/mroles',$dataView);
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("descripcion", "Descripcion", "trim|required");
		$this->form_validation->set_rules("modulos[]", "Modulos", "required");

		if ($this->form_validation->run() == FALSE) {
			if($this->input->get('id_rol') !== null){
				$this->editarRol();
			}
			else {
				$this->anadirRol();
			}
		}
		else{
			$data_rol = array('descripcion'=>$this->input->post('descripcion'));
			$data_modulos = array('modulos' => $this->input->post('modulos'));
			if($this->input->get('id_rol') !== null){
				$data = array('data_rol'=>$data_rol, 'data_modulos'=>$data_modulos);
				$this->rolModel->actualizarRol($this->input->get('id_rol'), $data);
			}else {
				$this->rolModel->registrarrol($data_rol);
				$this->rolModel->modulosasignados($data_modulos);
			}
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
		}
	}

	public function borrarRol(){
		$id = $this->input->post('idObj');
		$data = array("objeto"=>"rol", "id"=>$id, "direccion"=>"rol/borrar", "accion" => "borrar");
		$this->load->view("admin/modales/confirmacion", $data);
	}

	public function borrar()
    {
        $id = $this->input->post('id');
		if ($this->rolModel->borrarrol($id)) {
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
		} else {
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"warning"));
		}
    }
}
