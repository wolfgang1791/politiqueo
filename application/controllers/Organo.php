<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organo extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('organosModel');
        //$this->load->helper('modulo');

        if(!$this->session->userdata('id_usuario')){
            $this->session->sess_destroy();
            redirect('login');
        }
    }

	public function index()
	{
        $resultado = $this->organosModel->listarTodosAdmin();
		$data = array("content"=>'edicion/panelorgano',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $data = array("content"=>'edicion/registrarorgano',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
    }

    public function anadirorgano()
    {
		$this->load->view('edicion/modales/morgano');
	}

    public function actualizarorgano()
    {
        $id = $this->input->post('idObj');
        $resultado = $this->organosModel->obtenerorgano($id);
		$data = array("resultado"=>$resultado);
		$this->load->view("edicion/modales/morgano", $data);
    }

    public function actualizar()
    {
        $this->form_validation->set_rules("descripcion", "Descripcion", "required");
		$this->form_validation->set_rules("titulo", "Titulo", "required");
		$this->form_validation->set_rules("url","URL de imagen","required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('edicion/modales/morgano');
        }
        else
        {
			$data = array(
                'id' => $this->input->post('id'),
				'descripcion'=>$this->input->post('descripcion'),
				'titulo'=>$this->input->post('titulo'),
				'url'=>$this->input->post('url')
			  );

			$this->organosModel->actualizarOrgano($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
        }
    }

    public function recibirdatos()
	{
		$this->form_validation->set_rules("descripcion", "Descripcion", "required");
		$this->form_validation->set_rules("titulo", "Titulo", "required");
		$this->form_validation->set_rules("url","URL de imagen","required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('edicion/modales/morgano');
        }
        else
        {
			$data = array(
				'descripcion'=>$this->input->post('descripcion'),
				'titulo'=>$this->input->post('titulo'),
				'url'=>$this->input->post('url')
			  );

			$this->organosModel->registrarOrgano($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
        }
	}

    public function borrarorgano(){
		$id = $this->input->post('idObj');
		$data = array("objeto"=>"Organo", "id"=>$id, "direccion"=>"organo/borrar", "accion" => "borrar");
		$this->load->view("admin/modales/confirmacion", $data);
	}

    public function borrar()
	{
		$id = $this->input->post('id');
		$result = $this->organosModel->borrarOrgano($id);
		header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
	}

    public function activar(){
        $id = $this->input->post('id');
        $result = $this->organosModel->activarorgano($id);
        header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
	}

    public function activarorgano(){
        $id = $this->input->post('idObj');
		$data = array("objeto"=>"Organo", "id"=>$id, "direccion"=>"organo/activar", "accion" => "activar");
		$this->load->view("admin/modales/confirmacion", $data);
    }

}
