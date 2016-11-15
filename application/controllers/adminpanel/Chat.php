<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mchat','mc');
    	$this->load->library('pagination');

	}

  function manage_chat(){
    $data['title_web'] = 'View All Chat | Adminpanel Medskin';
    $data['path_content'] = 'admin/chat/manage_chat';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/chat/manage_chat/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('chat');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mc->fetchChat($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('chat'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mc->fetchChatSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }



	function edit_chat(){
		$data['title_web'] = 'Edit chat | Adminpanel Medskin';
		$data['path_content'] = 'admin/chat/edit_chat';
		
		$id=$this->uri->segment(4);
		$data['result']=$this->mod->getDataWhere('chat','id_chat',$id);
		if($data['result']==FALSE)
			redirect(base_url('adminpanel/chat/manage_chat'));
			$this->form_validation->set_rules('chat','chat','required');
			$this->form_validation->set_rules('status_chat','status','required');
			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './assets/images/chat';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '8000';



			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$save = $this->mc->editChat($_POST,FALSE,$id);
				redirect(base_url($this->uri->segment(1).'/chat/manage_chat'));
			}

		else{
			$save = $this->mc->editChat($_POST,$this->upload->data(),$id);
			redirect(base_url($this->uri->segment(1).'/chat/manage_chat'));
		}
	}
	}

	function delete_chat(){
		$id = $this->uri->segment(4);
		$this->db->where('id_chat',$id);
		$this->db->delete('chat');
		redirect(base_url($this->uri->segment(1).'/chat/manage_chat'));
	}
}
?>
