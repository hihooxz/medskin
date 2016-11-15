<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpayment extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchPayment($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
	  $this->db->order_by('name_payment','DESC');
    $query = $this->db->get('payment');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllpayment() {
    return $this->db->count_all("payment");
  }

  function savePayment($data,$upload_data){
    $array = array(
        'name_payment' => $data['name_payment'],
        'account_name' => $data['account_name'],
				'account_number' => $data['account_number'],
			  'image_payment' => 'assets/images/'.$upload_data['orig_name']


      );
    $this->db->insert('payment',$array);
    return 1;
  }
    function editPayment($data,$upload_data,$id){
      $array = array(
				'name_payment' => $data['name_payment'],
        'account_name' => $data['account_name'],
				'account_number' => $data['account_number']
			);
			if($upload_data!=false){
				$array['image_payment'] = 'assets/images/'.$upload_data['orig_name'];
			}

      $this->db->where('id_payment',$id);
      $this->db->update('payment',$array);
      return 1;
    }

		function fetchPaymentSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('name_payment','DESC');
	    $query = $this->db->get('payment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}

		function fetchConfirmPayment($limit,$start,$pagenumber) {

	    if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);
			$this->db->select('confirm_payment.*');
			$this->db->join('payment','confirm_payment.id_payment = payment.id_payment');
		$this->db->order_by('date_confirm_payment','DESC');
	    $query = $this->db->get('confirm_payment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	  }
	  function countAllConfirmPayment() {
	    return $this->db->count_all("confirm_payment");
	  }

		function fetchConfirmPaymentSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('date_transfer','DESC');
			$query = $this->db->get('confirm_payment');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}
	function saveConfirmPayment($data_next,$data){
		$array = array(
				'id_payment' => $data_next['payment'],
				'name_bank' => $data['name_bank'],
				'account_name' => $data['account_name'],
				'account_number' => $data['account_number'],
				'nominal' => $data['nominal'],
				'date_transfer' => date('Y-m-d',strtotime($data['date_transfer'])),
				'date_confirm_payment' => date('Y-m-d H:i:s')
			);
		$this->db->insert('confirm_payment',$array);
		return 1;
	}
}