<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcomment extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchComment($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
			$this->db->join('user','comment.id_user = user.id_user');
			$this->db->join('news','comment.id_news = news.id_news');
    $this->db->order_by('date_comment','DESC');
    $query = $this->db->get('comment');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllComment() {
    return $this->db->count_all("comment");
  }
	function getComment($id) {

		$this->db->join('user','comment.id_user = user.id_user');
		$this->db->join('news','comment.id_news = news.id_news');
		$this->db->order_by('date_comment','DESC');
		$this->db->where('id_comment',$id);
		$query = $this->db->get('comment');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return FALSE;
	}


    function editComment($data,$id){
      $array = array(
				'comment' => $data['comment']

        );

		  $this->db->where('id_comment',$id);
      $this->db->update('comment',$array);
      return 1;
    }
		function fetchCommentSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('user','comment.id_user = user.id_user');
			$this->db->join('news','comment.id_news = news.id_news');
    $this->db->order_by('date_comment','DESC');
    $query = $this->db->get('comment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
}
