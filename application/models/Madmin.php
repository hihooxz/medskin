<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}
	function validLogin($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->where('permission',1);
	  	$query = $this->db->get('user');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return false;
	}
	function editSetting($data,$id){
		$array = array(
				'title_website' => $data['title'],
				'price_consultation' => $data['consultation'],
				'price_appointment' => $data['appointment']
			);
		$this->db->where('id_setting',$id);
		$this->db->update('setting',$array);
		return 1;
	}
	function getSetting($id){
		$this->db->where('id_setting',$id);
		$query = $this->db->get('setting');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return false;
	}
}
