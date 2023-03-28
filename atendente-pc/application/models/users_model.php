<?php 

class Users_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_user_data($user_login){

		$this->db
			->select('*')
			->from('usuarios')
			->where('login_usuario',$user_login);

		$result = $this->db->get();

		if ($result->num_rows() > 0){
			return $result->row();
		} else {
			return NULL;
		}
	}

	public function get_clients(){

		$this->db->from("cliente");

		return $this->db->get()->result_array();
	}
}