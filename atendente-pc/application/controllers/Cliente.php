<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	public function index() {

		$data = array(
			"scripts" => array(
				"script_cliente.js"
			)
		);

		$this->template->show('cliente',$data);

	}

	public function show() {
		$this->load->model("users_model");
		$result = $this->users_model->get_clients();
		echo json_encode($result);
	}
}