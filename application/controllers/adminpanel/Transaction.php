<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mtransaction','mts');
    $this->load->library('pagination');
	}

  function manage_transaction(){
    $data['title_web'] = 'View All Transaction | Adminpanel medskin';
    $data['path_content'] = 'admin/transaction/manage_transaction';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/transaction/manage_transaction/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('transaction');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mts->fetchTransaction($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('transaction'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mts->fetchTransactionSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }
	function status_pending(){
			$id=$this->uri->segment(4);
		$data['result']=$this->mts->getTransaction($id);
		if($data['result']==FALSE)
			redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));

		$array = array(
				'status_transaction' => 0
			);
		$this->db->where('id_transaction',$id);
		$this->db->update('transaction',$array);

		// sent email changed status


		redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));
	}
	function status_done(){
		$id=$this->uri->segment(4);
		$data['result']=$this->mts->getTransaction($id);
		if($data['result']==FALSE)
			redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));

		$array = array(
				'status_transaction' => 1
			);
		$this->db->where('id_transaction',$id);
		$this->db->update('transaction',$array);

		// increase saldo if status is done
		if($data['result']['transaction_type'] == 0 && $data['result']['debit_credit'] == 0){
			$array = array(
					'amount' => $data['result']['amount']+$data['result']['nominal']
				);
			$this->db->where('id_user',$data['result']['id_user']);
			$this->db->update('user',$array);
		}

		// sent email changed status


		redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));
	}
	function status_cancel(){
			$id=$this->uri->segment(4);
		$data['result']=$this->mts->getTransaction($id);
		if($data['result']==FALSE)
			redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));

		$array = array(
				'status_transaction' => 2
			);
		$this->db->where('id_transaction',$id);
		$this->db->update('transaction',$array);

		// sent email changed status


		redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));
	}

	function edit_transaction(){
		$data['title_web'] = 'Edit Transaction | Adminpanel Medskin';
		$id=$this->uri->segment(4);
		$data['result']=$this->mod->getDataWhere('transaction','id_transaction',$id);
		if($data['result']==FALSE)
			redirect(base_url('adminpanel/transaction/manage_transaction'));

		$this->form_validation->set_rules('status_transaction','Status','required');

		if(!$this->form_validation->run()){
			$this->load->view('admin/index',$data);
		}
		else{
			$save = $this->mts->editTransaction($_POST,$id);
			redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));
		}
	}
	function delete_transaction(){
		$id = $this->uri->segment(4);
		$this->db->where('id_transaction',$id);
		$this->db->delete('transaction');
		redirect(base_url($this->uri->segment(1).'/transaction/manage_transaction'));
	}
}

?>
