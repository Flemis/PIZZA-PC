<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index(){
		$this->load->library("session");
		$name = $this->session->userdata('username');
		if ($name){
			$this->template->show("menu.php",$name);
		} else {
			header("Location: " . base_url() . "home");
		}
	}
}