<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('madmin');
	}
	function index(){
		if($this->session->userdata('loginAdmin')!=TRUE){
			redirect(base_url('adminpanel/dashboard/login'));
		}
		$data['title_web']= 'adminpanel | Medskin';
		$data['path_content'] = 'admin/module/dashboard';
		$this->load->view('admin/index',$data);
	}
		public function login(){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required|callback_validLogin');
			if(!$this->form_validation->run()){
				$this->load->view('admin/login');
			}else{
				redirect(base_url('adminpanel/dashboard'));
			}
		}

		function validLogin(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->madmin->validLogin($username,$password);
			if($data == false){
				$this->form_validation->set_message('validLogin','Username or Password is not found');
				return false;
			}
			else{
				$session = array(
						'loginAdmin' => TRUE,
						'idAdmin' => $data['id_user'],
						'username'=> $data['username'],
						
					);
				$this->session->set_userdata($session);
				return TRUE;
			}
		}
		function edit_setting(){
			$data['result'] = $this->madmin->getSetting(1);

			$data['title_web'] = 'Edit Setting | '.$data['result']['title_website'];
    		$data['path_content'] = 'admin/module/manage_setting';
			$this->form_validation->set_rules('title','Website Title','required');
			$this->form_validation->set_rules('consultation','Consultation Price','required|numeric');
			$this->form_validation->set_rules('appointment','Appointment Price','required|numeric');

			if(!$this->form_validation->run()){
				$this->load->view('admin/index',$data);
			}
			else{
				$this->madmin->editSetting($_POST,1);
				redirect(base_url('adminpanel/dashboard/edit-setting'));
			}
		}
		function logout(){
			$session = array(
						'loginAdmin' => FALSE,
						'idAdmin' => NULL
					);
				$this->session->set_userdata($session);
			redirect(base_url($this->uri->segment(1).'/dashboard'));
		}
}
