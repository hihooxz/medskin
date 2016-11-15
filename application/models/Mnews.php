<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnews extends CI_Model {
	function __construct(){
		parent::__construct();
	}
  function fetchNews($limit,$start,$pagenumber) {
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
    $this->db->join('user','user.id_user = news.id_doctor');
    $this->db->order_by('date_news','DESC');
    $query = $this->db->get('news');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function fetchNewsBookmark($limit,$start,$pagenumber,$id_user) {
    $this->db->select('user.*,news.*');
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
    $this->db->join('user','user.id_user = news.id_doctor');
    $this->db->join('bookmark','bookmark.id_news = news.id_news');
    $this->db->where('bookmark.id_user',$id_user);
    $this->db->order_by('date_news','DESC');
    $query = $this->db->get('news');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function fetchNewsProfile($limit,$start,$pagenumber,$id_doctor) {
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('id_doctor',$id_doctor);
    $this->db->join('user','user.id_user = news.id_doctor');
    $this->db->order_by('date_news','DESC');
    $query = $this->db->get('news');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function saveNews($data,$upload_data,$id_doctor){
    $array = array(
        'id_doctor' => $id_doctor,
        'news' => $data['news'],
        'date_news' => date('Y-m-d H:i:s'),
        'title' => substr($data['news'], 0,50)."..",
        'view' => 0
      );
    if($upload_data!=FALSE){
      $array['image_news'] = 'assets/images/news/'.$upload_data['file_name'];
    }
    $this->db->insert('news',$array);
    // update notification
    $this->load->model('muser');
    $results = $this->muser->fetchAllPasien();
    if($results!=FALSE){
      $user = $this->mod->getDataWhere('user','id_user',$id_doctor);
      foreach ($results as $rows) {
        $notif = $user['full_name']." Just Submit a News. Check their profile right now.";
        $array = array(
            'id_user' => $rows->id_user,
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 2,
            'notification' => $notif,
            'link_notification' => 'view-profile/'.$id_doctor
          );
        $this->db->insert('notification',$array);
      }
    }
  }
  function getNews($id){
    $this->db->where('id_news',$id);
    $this->db->join('user','user.id_user = news.id_doctor');
    $this->db->order_by('date_news','DESC');
    $query = $this->db->get('news');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;    
  }
  function saveComment($data,$id_user,$id_news){
    $array = array(
        'id_user' => $id_user,
        'id_news' => $id_news,
        'comment' => $data['comment'],
        'date_comment' => date('Y-m-d H:i:s')
      );
    $this->db->insert('comment',$array);
    return 1;
  }
  function fetchComment($limit,$start,$pagenumber,$id_news){
      if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('comment.id_news',$id_news);
    $this->db->join('user','user.id_user = comment.id_user');
    $this->db->order_by('date_comment','DESC');
    $query = $this->db->get('comment');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function checkBookmark($id_news,$id_user){
    $this->db->where('id_news',$id_news);
    $this->db->where('id_user',$id_user);
    $query = $this->db->get('bookmark');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function saveBookmark($id_news,$id_user){
    $array = array(
        'id_news' => $id_news,
        'id_user' => $id_user,
        'date_bookmark' => date('Y-m-d H:i:s')
      );
    $this->db->insert('bookmark',$array);
    return 1;
  }
}