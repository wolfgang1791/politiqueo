<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Organos extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
    }


    public function index(){
        if($this->input->get('id') == ""){
            redirect(base_url());
        }
        if($this->input->get('id')==1){
            $dataPartidos = $this->partidosModel->listarTodos();
    		$data = array("content"=>'organos/organo',"dataView"=>array('dataPartidos'=>$dataPartidos));
    		$this->load->view('layout',$data);
        }
        else{
            $data = array("content"=>'home/construccion',"dataView"=>array('mensaje'=>"página en construcción"));
    		$this->load->view('layout',$data);
        }
    }

}

?>
