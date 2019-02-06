<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('modulo');
		$this->load->model('cargoModel');
    }

	public function index()
	{
		$this->load->view("edicion/modales/mcargo");
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("descripcion", "Descripcion", "required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view("edicion/modales/mcargo");
        }
        else
        {
			$data = array(
				'descripcion'=>$this->input->post('descripcion'),
				'periodo'=>$this->input->post('periodo'),
				'tipoperiodo'=>$this->input->post('tipoperiodo')
			  );

			$result = $this->cargoModel->registrarcargo($data);
			header('Content-Type: application/json');
			echo $result;
        }
	}


}
