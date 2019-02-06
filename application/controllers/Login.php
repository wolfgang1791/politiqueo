<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __constuct(){
        parent:: __constuct();

    }

    public function index(){
        if($this->session->userdata('id_usuario')){
            redirect('admin');
            die;
        }
        $data = array("content"=>'admin/login',"dataView"=>'');
        $this->load->view('layoutAdmin',$data);
    }

    public function acceso(){

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("pass", "contraseña", "required");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view("admin/login");
        }
        else
        {
            $data = array('email' => $this->input->post('email'),
                          'pass' => $this->input->post('pass'));
            $this->load->model('loginModel');
            $resultado = $this->loginModel->getUsuario($data);
            $resultado = $resultado[0];
            if($resultado != false){
                $this->session->set_userdata($resultado);
                $result = array("result"=>"success",'dir'=>base_url()."admin");
    			header('Content-Type: application/json');
    			echo json_encode($result);
            }
            else{
                $result = array('result'=>'fail','msj'=>"Los datos ingresados no son correctos, Por favor vuelve a intertarlo.");
                header('Content-Type: application/json');
    			echo json_encode($result);;
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
