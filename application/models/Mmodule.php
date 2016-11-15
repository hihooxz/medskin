<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmodule extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}
	// save data to database
	function saveData($data,$table_name){
		$this->db->insert($table_name,$data);
		return 1;
	}
	// edit data from database
	function editData($data,$table_name,$field,$value){
		$this->db->where($field,$value);
		$this->db->update($table_name,$data);
		return 1;
	}
	// delete data from database
	function deleteData($table_name,$field,$value){
		$this->db->where($field,$value);
		$this->db->delete($table_name);
		return 1;
	}
	// get data using where
	function getDataWhere($table_name,$field,$value){
		$this->db->where($field,$value);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->row_array();
		else return false;
	}
	// fetch all data with no limit
	function fetchAllData($table_name){
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else return false;
	}
	// fetch data with limit
	function fetchData($table_name,$limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else return false;
	}
	// fetch search data by 1 value
	function fetchSearchData($table_name,$field,$value){
		$this->db->like($field,$value);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else return false;
	}
	// fetch where data by 1 value
	function fetchDataWhere($table_name,$field,$value){
		$this->db->where($field,$value);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else return false;
	}
	// fetch where order by
	function fetchDataOrderBy($table_name,$field,$value){
		$this->db->order_by($field,$value);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else return false;
	}
	// count all data
	function countData($table_name){
		return $this->db->count_all($table_name);
	}
	// count search data by 1 value
	function countSearchData($table_name,$field,$value){
		$this->db->like($field,$value);
		return $this->db->count_all_results($table_name);
	}
	// count where data by 1 value
	function countWhereData($table_name,$field,$value){
		$this->db->where($field,$value);
		return $this->db->count_all_results($table_name);
	}
	// get search data can by ascending or descending
	function getSearchData($table_name,$field,$value,$field2,$ascdesc){
		$this->db->like($field,$value);
		$this->db->order_by($field2,$ascdesc);
		$query = $this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->row_array();
		else return false;		
	}
	function countNotification($id_user){
		$this->db->select('count(*) as total_notification');
		$this->db->where('id_user',$id_user);
		$this->db->where('status_notification',0);
		return $this->db->count_all_results('notification');
	}
}
?>