<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mnews','mn');
    	$this->load->library('pagination');

	}

  function manage_news(){
    $data['title_web'] = 'View All Topic | Adminpanel e-conosmart';
    $data['path_content'] = 'admin/news/manage_news';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/news/manage_news/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mn->fetchNews($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mn->fetchNewsSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

	function add_news(){
		$data['title_web'] = 'Add News | Adminpanel Medskin';
		$data['path_content'] = 'admin/news/add_news';
		$data['user'] = $this->mn->fetchAllUser();
		$this->form_validation->set_rules('news','Content News','required');
		$this->form_validation->set_rules('status_news','status','required');
		if(!$this->form_validation->run()){
			$data['error'] = false;
			$this->load->view('admin/index',$data);
		}
		else{
			$config['upload_path'] = './assets/images/news';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '8000';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/index',$data);
			}

		else{
			$save = $this->mn->saveNewsAdmin($_POST,$this->upload->data());
			redirect(base_url($this->uri->segment(1).'/news/manage_news'));
		}
	}
}

	function edit_news(){
		$data['title_web'] = 'Edit news | Adminpanel Medskin';
		$data['path_content'] = 'admin/news/edit_news';
		$data['user'] = $this->mn->fetchAllUser();
		$id=$this->uri->segment(4);
		$data['result']=$this->mod->getDataWhere('news','id_news',$id);
		if($data['result']==FALSE)
			redirect(base_url('adminpanel/news/manage_news'));
			$this->form_validation->set_rules('news','Content News','required');
			$this->form_validation->set_rules('status_news','status','required');
			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './assets/images/news';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '8000';



			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$save = $this->mn->editNewsAdmin($_POST,FALSE,$id);
				redirect(base_url($this->uri->segment(1).'/news/manage_news'));
			}

		else{
			$save = $this->mn->editNewsAdmin($_POST,$this->upload->data(),$id);
			redirect(base_url($this->uri->segment(1).'/news/manage_news'));
		}
	}
	}

	function delete_news(){
		$id = $this->uri->segment(4);
		$this->db->where('id_news',$id);
		$this->db->delete('news');
		redirect(base_url($this->uri->segment(1).'/news/manage_news'));
	}
}
?>
