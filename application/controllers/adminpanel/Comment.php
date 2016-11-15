<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mcomment','mct');
    $this->load->library('pagination');
	}

  function manage_comment(){
    $data['title_web'] = 'View All Comment | Adminpanel medskin';
    $data['path_content'] = 'admin/comment/manage_comment';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/comment/manage_comment/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('comment');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mct->fetchComment($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('comment'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mct->fetchCommentSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }


	function edit_comment(){
		$data['title_web'] = 'Edit Comment | Adminpanel Medskin';
		$data['path_content'] = 'admin/comment/edit_comment';
		$id=$this->uri->segment(4);
		$data['result']=$this->mod->getDataWhere('comment','id_comment',$id);
		if($data['result']==FALSE)
			redirect(base_url('adminpanel/comment/manage_comment'));

		$this->form_validation->set_rules('comment','Comment','required');

		if(!$this->form_validation->run()){
			$this->load->view('admin/index',$data);
		}
		else{
			$save = $this->mct->editComment($_POST,$id);
			redirect(base_url($this->uri->segment(1).'/comment/manage_comment'));
		}
	}
	function delete_comment(){
		$id = $this->uri->segment(4);
		$this->db->where('id_comment',$id);
		$this->db->delete('comment');
		redirect(base_url($this->uri->segment(1).'/comment/manage_comment'));
	}
}

?>
