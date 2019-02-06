<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('organosModel');
    }

	public function index()
	{
		$dataOrganos = $this->organosModel->listarTodos();
		$data = array("content"=>'home/home',"dataView"=>array('dataOrganos'=>$dataOrganos));
		$this->load->view('layout',$data);
	}

	public function quieroContribuir(){
		$this->load->view('home/contribuir');
	}
}
