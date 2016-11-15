<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mchat extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchChat($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
			$this->db->join('chatroom','chatroom.id_chatroom = chat.id_chatroom');
    $this->db->order_by('date_chat','DESC');
    $query = $this->db->get('chat');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllChat() {
    return $this->db->count_all("chat");
  }

  function saveChat($data,$upload_data){
    $array = array(
				'id_chatroom'=> $data['id_chatroom'],
        'chat' => $data['chat'],
				'status_chat' => $data['status_chat'],
        'date_chat' => date('Y-m-d H:i:s'),
				'image_chat' => 'assets/images/chat/'.$upload_data['orig_name']
      );
    $this->db->insert('chat',$array);
    return 1;
  }
    function editChat($data,$upload_data,$id){
      $array = array(
				'chat' => $data['chat'],
				'status_chat' => $data['status_chat']

        );
				if($upload_data!=false){
					$array['image_chat'] = 'assets/images/chat/'.$upload_data['orig_name'];
				}
		  $this->db->where('id_chat',$id);
      $this->db->update('chat',$array);
      return 1;
    }
		function fetchChatSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('chatroom','chatroom.id_chatroom = chat.id_chatroom');
			$this->db->order_by('date_chat','DESC');
	    $query = $this->db->get('chat');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
}
