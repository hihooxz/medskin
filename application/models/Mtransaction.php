<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtransaction extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchTransaction($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
			$this->db->join('user','transaction.id_user = user.id_user');
			$this->db->join('payment','transaction.id_payment = payment.id_payment');
    $this->db->order_by('date_transaction','DESC');
    $query = $this->db->get('transaction');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllChat() {
    return $this->db->count_all("transaction");
  }
	function getTransaction($id) {

		$this->db->join('user','transaction.id_user = user.id_user');
		$this->db->join('payment','transaction.id_payment = payment.id_payment');
	  $this->db->order_by('date_transaction','DESC');
		$this->db->where('id_transaction',$id);
		$query = $this->db->get('transaction');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return FALSE;
	}


    function editTransaction($data,$id){
      $array = array(
				'status_transaction' => $data['status_transaction']

        );

		  $this->db->where('id_transaction',$id);
      $this->db->update('transaction',$array);
      return 1;
    }
		function fetchTransactionSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('user','transaction.id_user = user.id_user');
			$this->db->join('payment','transaction.id_payment = payment.id_payment');
    $this->db->order_by('date_transaction','DESC');
    $query = $this->db->get('transaction');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
}
