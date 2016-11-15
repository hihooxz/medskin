<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mpayment','mp');
    	$this->load->library('pagination');
  	}

  function manage_payment(){
    $data['title_web'] = 'View All payment | Adminpanel Medskin';
    $data['path_content'] = 'admin/payment/manage_payment';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/payment/manage_payment/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('payment');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mp->fetchPayment($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('payment'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchPaymentSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

		function add_payment(){
			$data['title_web'] = 'Add payment | Adminpanel Medskin';
			$data['path_content'] = 'admin/payment/add_payment';

			$this->form_validation->set_rules('name_payment','Payment Name','required');
			$this->form_validation->set_rules('account_name','Account Name','required');
			$this->form_validation->set_rules('account_number','Account Number','required|numeric');

				if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';



				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/index',$data);
				}

			else{
				$save = $this->mp->savePayment($_POST,$this->upload->data());
				redirect(base_url($this->uri->segment(1).'/payment/manage_payment'));
			}
		}
	}

	function edit_payment(){
			$data['title_web'] = 'Edit payment | Adminpanel Medskin';
			$data['path_content'] = 'admin/payment/edit_payment';

			$id=$this->uri->segment(4);
			$data['result']=$this->mod->getDataWhere('payment','id_payment',$id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/payment/manage_payment'));

				$this->form_validation->set_rules('name_payment','Payment Name','required');
				$this->form_validation->set_rules('account_name','Account','required');
				$this->form_validation->set_rules('account_number','Number','required|numeric');



				if(!$this->form_validation->run()){
					$data['error'] = false;
					$this->load->view('admin/index',$data);
				}
				else{
				$config['upload_path'] = './assets/images';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '5000';



				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mp->editpayment($_POST,FALSE,$id);
					redirect(base_url($this->uri->segment(1).'/payment/manage_payment'));
				}

			else{
				$save = $this->mp->editPayment($_POST,$this->upload->data(),$id);
				redirect(base_url($this->uri->segment(1).'/payment/manage_payment'));
			}
		}
	}

    function delete_payment(){
			$id = $this->uri->segment(4);
			$this->db->where('id_payment',$id);
			$this->db->delete('payment');
			redirect(base_url($this->uri->segment(1).'/payment/manage_payment'));
	}

	function manage_confirm_payment(){
		$data['title_web'] = 'View All Confirm payment | Adminpanel Medskin';
		$data['path_content'] = 'admin/payment/manage_confirm_payment';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/payment/manage-confirm-payment/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countData('confirm_payment');// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchConfirmPayment($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countData('confirm_payment'); // Make a variable (array) link so the view can call the variable
		$this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchConfirmPaymentSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
	}
}



?>
