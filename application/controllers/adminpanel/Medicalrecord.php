<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicalrecord extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mmedicalrecord','mdl');
    $this->load->library('pagination');
	}

  function manage_medicalrecord(){
    $data['title_web'] = 'View All medicalrecord | Adminpanel medskin';
    $data['path_content'] = 'admin/medicalrecord/manage_medicalrecord';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/medicalrecord/manage_medicalrecord/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('medicalrecord');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mdl->fetchMedicalRecord($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('medicalrecord'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mdl->fetchMedicalRecordSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }
}

?>
