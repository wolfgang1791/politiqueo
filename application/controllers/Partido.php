<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partido extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
        //$this->load->helper('modulo');

        if(!$this->session->userdata('id_usuario')){
            $this->session->sess_destroy();
            redirect('login');
        }
    }

	public function index()
	{
        $resultado = $this->partidosModel->listarTodosAdmin();
		$data = array("content"=>'edicion/panelpartido',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $data = array("content"=>'edicion/registrarpartido',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
    }

    public function actualizarpartido()
    {
        $id = $this->input->post('idObj');
        $resultado = $this->partidosModel->obtenerpartido($id);
		$data = array("resultado"=>$resultado);
		$this->load->view("edicion/modales/mpartido", $data);
    }

    public function actualizar()
    {
        $this->form_validation->set_rules("nombre", "Nombre de Partido", "required");
		$this->form_validation->set_rules("url","URL de imagen","required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('edicion/modales/mpartido');
        }
        else
        {
			$data = array(
                'id' => $this->input->post('id'),
                'nombre'=>$this->input->post('nombre'),
				'url'=>$this->input->post('url')
			  );

			$resultado = $this->partidosModel->actualizarpartido($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$resultado));
        }
    }

    public function recibirdatos()
	{
		$this->form_validation->set_rules("nombre", "Nombre de Partido", "required");
		$this->form_validation->set_rules("url","URL de imagen","required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('edicion/modales/mpartido');
        }
        else
        {
			$data = array(
				'nombre'=>$this->input->post('nombre'),
				'url'=>$this->input->post('url')
			  );

			$result = $this->partidosModel->registrarpartido($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$result));
        }
	}

    public function anadirpartido()
    {
		$this->load->view('edicion/modales/mpartido');
	}

    public function borrarpartido(){
		$id = $this->input->post('idObj');
		$data = array("objeto"=>"Partido", "id"=>$id, "direccion"=>"partido/borrar", "accion" => "borrar");
		$this->load->view("admin/modales/confirmacion", $data);
	}

    public function borrar()
    {
        $id = $this->input->post('id');
        $result = $this->partidosModel->borrarpartido($id);
        header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
    }

    public function activar(){
        $id = $this->input->post('id');
        $result = $this->partidosModel->activarpartido($id);
        header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
	}

    public function activarpartido(){
        $id = $this->input->post('idObj');
		$data = array("objeto"=>"Partido", "id"=>$id, "direccion"=>"partido/activar", "accion" => "activar");
		$this->load->view("admin/modales/confirmacion", $data);
    }

}
