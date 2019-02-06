<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grado extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('Modulo');
        $this->load->model('gradoModel');
    }

	public function index()
	{
		$this->load->view("edicion/modales/mgrado");
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("grado", "Grado", "required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view("edicion/modales/mgrado");
        }
        else
        {
			$data = array('nombre'=>$this->input->post('grado') );

			$result = $this->gradoModel->registrargrado($data);
			header('Content-Type: application/json');
			echo $result;
        }
	}


}
