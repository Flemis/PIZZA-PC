<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
	}

	public function index()
	{
		if ($this->session->userdata("username")) {
			$this->template->show("menu.php");
		} else {
			$this->template->show("home.php");	
		}
		
	}

	public function login()
	{

		if (!$this->input->is_ajax_request()){
			exit("Acesso direto não permitido");
		}

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$username = $this->input->post("username");
		$password = $this->input->post("password");

		if (empty($username)) {
			$json['status'] = 0;
			$json["error_list"]["#username"] = "Usuário vazio";
		} else {
			$this->load->model("users_model");
			$result = $this->users_model->get_user_data($username);
			if ($result) {
				$user_id = $result->id_usuario;
				$user_name = $result->login_usuario;
				$user_password = $result->senha_usuario;
				if ($password == $user_password){
					$this->session->set_userdata("username", $user_name);
				} else {
					$json['status'] = 0;
				}
			} else {
			$json["status"] = 0;
			}
			if ($json['status'] == 0) {
				$json["error_list"]["#btn_login"] = "Usuário e/ou senha incorretos!";
			}
		}

		echo json_encode($json);
	}

	public function logoff(){
		$this->session->sess_destroy();
		header("Location: " . base_url() . 'home');
	}

	public function showSession($item){
		$this->session->userdata($item);
	}
}
