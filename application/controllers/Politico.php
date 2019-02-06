<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politico extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('politicosModel');
        $this->load->model('partidosModel');
        $this->load->model('cargoModel');
        $this->load->model('gradoModel');
        $this->load->model('delitoModel');
        $this->load->helper('modulo');
    }

	public function index()
	{

        $resultado = $this->politicosModel->listarTodosAdmin();
		$data = array("content"=>'edicion/panelpolitico',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $partidos = $this->partidosModel->listarTodosAdmin();
        $data = array('partidos'=>$partidos);
		$this->load->view('edicion/registrarpolitico',$data);
    }

    public function recibirdatos()
    {
        $this->form_validation->set_rules("imagenP", "URL de imagen", "required");
		$this->form_validation->set_rules("nombreP","Nombre de politico","required");
        $this->form_validation->set_rules("apellidoP","Apellido de politico","required");
        $this->form_validation->set_rules("edadP","Año de nacimiento","required");
        $this->form_validation->set_rules("dniP","Numero de DNI","required|min_length[8]|max_length[8]|numeric");
        $this->form_validation->set_rules("bancadaP","Partido","required");
        $this->form_validation->set_rules("representaP","Lugar de representación","required");
        $this->form_validation->set_rules("condicionP","Condicion","required");

        if ($this->form_validation->run() == FALSE)
        {
            $this->panelregistrar();
        }
        else{
            $data_politico = array(
                    'url'=>$this->input->post('imagenP'),
                    'nombres'=>$this->input->post('nombreP'),
                    'apellidos'=>$this->input->post('apellidoP'),
                    'edad'=>$this->input->post('edadP'),
                    'dni'=>$this->input->post('dniP'),
                    'bancada'=>$this->input->post('bancadaP'),
        //            'cargo'=>$this->input->post('cargoP'),
                    'representa'=>$this->input->post('representaP'),
                    'condicion'=>$this->input->post('condicionP')
            );
            $data_academica =  array(
                'grado' => $this->input->post('gradoP'),
                'carrera' => $this->input->post('carreraP'),
                'añoinicio' => $this->input->post('añoinicioP'),
                'añofinal' => $this->input->post('añofinalP')
            );
            $data_cargos =  array(
                'cargo' => $this->input->post('cargoP'),
                'añoinicio' => $this->input->post('añoiniciocP'),
                'añofinal' => $this->input->post('añofinalcP')
            );
            $data_delitos =  array(
                'delito' => $this->input->post('delitoP'),
                'descripcion' => $this->input->post('descripciondP'),
                'fecha' => $this->input->post('fechadP')
            );

            //$data => array('datapolitico'=>$data_politico,'data_academica'=>$data_academica,);
            $resultado = $this->politicosModel->registrarpolitico($data_politico,$data_academica,$data_cargos,$data_delitos);
            header('Content-Type: application/json');
            echo json_encode(array("result"=>$resultado));

        }
    }

    public function actualizar()
    {
        $this->form_validation->set_rules("imagenP", "URL de imagen", "required");
		$this->form_validation->set_rules("nombreP","Nombre de politico","required");
        $this->form_validation->set_rules("apellidoP","Apellido de politico","required");
        $this->form_validation->set_rules("edadP","Año de nacimiento","required");
        $this->form_validation->set_rules("dniP","Numero de DNI","required|min_length[8]|max_length[8]|numeric");
        $this->form_validation->set_rules("representaP","Lugar de representación","required");
        $this->form_validation->set_rules("condicionP","Condicion","required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->actualizarpolitico();
        }
        else
        {
            $data = array(
                    'id'=>$this->input->post('id'),
                    'url'=>$this->input->post('imagenP'),
                    'nombres'=>$this->input->post('nombreP'),
                    'apellidos'=>$this->input->post('apellidoP'),
                    'edad'=>$this->input->post('edadP'),
                    'dni'=>$this->input->post('dniP'),
                    'bancada'=>$this->input->post('bancadaP'),
            //        'cargo'=>$this->input->post('cargoP'),
                    'representa'=>$this->input->post('representaP'),
                    'condicion'=>$this->input->post('condicionP'),
                );

                $data_academica =  array(
                    'grado' => $this->input->post('gradoP'),
                    'carrera' => $this->input->post('carreraP'),
                    'añoinicio' => $this->input->post('añoinicioP'),
                    'añofinal' => $this->input->post('añofinalP')
                );
                $data_cargos =  array(
                    'cargo' => $this->input->post('cargoP'),
                    'añoinicio' => $this->input->post('añoiniciocP'),
                    'añofinal' => $this->input->post('añofinalcP')
                );
                $data_delitos =  array(
                    'delito' => $this->input->post('delitoP'),
                    'descripcion' => $this->input->post('descripciondP'),
                    'fecha' => $this->input->post('fechadP')
                );

			$result = $this->politicosModel->actualizarpolitico($data,$data_academica,$data_cargos,$data_delitos);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$result));
        }
    }

    public function actualizarpolitico()
	{
		$id = $this->input->post('idObj');
        $resultado = $this->politicosModel->getPoliticoAdmin($id);

        $partidopolitico = $this->partidosModel->obtenerpartido($resultado['id_partido']);
        $cargospolitico = $this->cargoModel->obtenercargo($id);
        $estudiospolitico = $this->gradoModel->obtenerestudios($id);
        $delitospolitico = $this->delitoModel->obtenerdelitos($id);

        $cargos = $this->cargoModel->listarTodos();
        $partidos = $this->partidosModel->listarTodosAdmin();
        $grados = $this->gradoModel->listarTodos();
        $delitos = $this->delitoModel->listarTodos();

        $data = array('resultado'=>$resultado,'partidopolitico' => $partidopolitico,
                      'cargos' => $cargos, 'partidos' => $partidos, 'grados'=>$grados, 'delitos' => $delitos,
                       'cargospolitico'=>$cargospolitico, 'estudiospolitico'=>$estudiospolitico,'delitospolitico'=>$delitospolitico);

        $this->load->view('edicion/registrarpolitico',$data);
	}


    public function borrarpolitico(){
		$id = $this->input->post('idObj');
		$data = array("objeto"=>"Politico", "id"=>$id, "direccion"=>"politico/borrar", "accion" => "borrar");
		$this->load->view("admin/modales/confirmacion", $data);
	}

    public function activar(){
        $id = $this->input->post('id');
        $result = $this->politicosModel->activarpolitico($id);
        header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
	}

    public function activarpolitico(){
        $id = $this->input->post('idObj');
		$data = array("objeto"=>"Politico", "id"=>$id, "direccion"=>"politico/activar", "accion" => "activar");
		$this->load->view("admin/modales/confirmacion", $data);
    }

    public function agregaracademico()
    {
        $grados = $this->gradoModel->listarTodos();
        $data=array('grados'=>$grados);
        $this->load->view("edicion/modales/academico",$data);
    }

    public function agregarcargo()
    {
        $cargos = $this->cargoModel->listarTodos();
        $data=array('cargos'=>$cargos);
        $this->load->view("edicion/modales/cargos",$data);
    }

    public function agregardelito()
    {
        $delitos = $this->delitoModel->listarTodos();
        $data=array('delitos'=>$delitos);
        $this->load->view("edicion/modales/delitos",$data);
    }

    public function borrar()
    {
        $id = $this->input->post('id');
        $result = $this->politicosModel->borrarpolitico($id);
        header('Content-Type: application/json');
		echo json_encode(array("result"=>$result));
    }

    public function filtrar()
    {
        $result = $this->politicosModel->filtrarpoliticos($this->input->post('palabra'));
        $data=array('result'=>'success','filtrar'=>$result);
        $this->load->view("politicos/buscapolitico",$data);
        /*header('Content-Type: application/json');
		echo json_encode($data);*/
    }
}
