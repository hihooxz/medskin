<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmedicalrecord extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchMedicalRecord($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
			$this->db->join('user','medicalrecord.id_user = user.id_user');

    $this->db->order_by('date_insert','DESC');
    $query = $this->db->get('medicalrecord');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }

  function countAllMedicalRecord() {
    return $this->db->count_all("medicalrecord");
  }



		function fetchMedicalRecordSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('user','medicalrecord.id_user = user.id_user');
			$this->db->order_by('date_insert','DESC');
	    $query = $this->db->get('medicalrecord');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}

		function fetchAllUser(){
				$query = $this->db->get('user');
				if($query->num_rows()>0){
					return $query->result();
				}
				else return FALSE;
			}


}
