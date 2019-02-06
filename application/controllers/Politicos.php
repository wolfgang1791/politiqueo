<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicos extends CI_Controller {
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
		if( $this->input->get('id') == ""){
			redirect(base_url());
		}
		$id_politico = $this->input->get('id');
		$data_academica = $this->gradoModel->obtenerestudios($id_politico);
		$data_cargos = $this->cargoModel->obtenercargo($id_politico);
		$data_delitos = $this->delitoModel->obtenerdelitos($id_politico);
		$dataPolitico = $this->politicosModel->getPolitico($id_politico);
		
		$data = array("content"=>'politicos/politico',
					  "dataView"=>array(
								'dataPolitico'=>$dataPolitico,
								'data_academica'=>$data_academica,
								'data_cargos'=>$data_cargos,
								'data_delitos'=>$data_delitos
						)
					);

		$this->load->view('layout',$data);
	}
}
