<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delito extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('Modulo');
        $this->load->model('delitoModel');
    }

	public function index()
	{
		$this->load->view("edicion/modales/mdelito");
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("delito", "Delito", "required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view("edicion/modales/mdelito");
        }
        else
        {
			$data = array('nombre'=>$this->input->post('delito') );

			$result = $this->delitoModel->registrardelito($data);
			header('Content-Type: application/json');
			echo $result;
        }
	}


}
