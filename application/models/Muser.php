<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchUser($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }

  function countAllUser() {
    return $this->db->count_all("user");
  }
  function fetchAllPasien() {
    $this->db->where('permission',3);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function saveUser($data,$upload_data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'full_name' => $data['full_name'],
				'birthday' => $data['birthday'],
				'address' => $data['address'],
        'province' => $data['province'],
        'city' => $data['city'],
        'experience' => $data['experience'],
				'status_user' => $data['status_user'],
        'date_register' => date('Y-m-d H:i:s'),
        'permission' => $data['permission'],
				'love' => $data['love'],
				'avatar' => 'assets/images/user/'.$upload_data['orig_name']
      );
    $this->db->insert('user',$array);
    return 1;
  }
    function editUser($data,$upload_data,$id){
      $array = array(
          'username' => $data['username'],
					'email' => $data['email'],
	        'full_name' => $data['full_name'],
					'birthday' => $data['birthday'],
	        'address' => $data['address'],
	        'province' => $data['province'],
	        'city' => $data['city'],
	        'experience' => $data['experience'],
					'status_user' => $data['status_user'],
	        'permission' => $data['permission'],
					'love' => $data['love']
        );
				if($upload_data!=false){
					$array['avatar'] = 'assets/images/user/'.$upload_data['orig_name'];
				}

			if($data['password']!="")
			$array['password']=md5($data['password']);
		  $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
		function fetchUserSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('date_register','DESC');
	    $query = $this->db->get('user');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
    function validLogin($username,$password) {
      $this->db->where('username',$username);
      $this->db->where('password',md5($password));
      $this->db->where_not_in('permission',1);
      $result = $this->db->get('user');
      if($result->num_rows()>0){
        return $result->row_array();
      }
      else{
        return false;
      }
    }
    function fetchDoctor($limit,$start,$pagenumber) {
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->join('fare','user.id_user = fare.id_user','left');
    $this->db->where('permission',2);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function fetchDoctorSearch($data) {
    if(isset($data['city'])){
      $this->db->like('city',$data['city']);
    }
    $this->db->like('full_name',$data['search']);

    $this->db->join('fare','user.id_user = fare.id_user','left');
    $this->db->where('permission',2);
    //$this->db->order_by('date_register','DESC');
		$this->db->order_by('love',$data['by']);
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function getDoctor($id_user) {
    $this->db->where('user.id_user',$id_user);
    $this->db->join('fare','user.id_user = fare.id_user','left');
    $this->db->where('permission',2);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function countExperience($id_user) {
    $this->db->where('id_doctor',$id_user);
    $this->db->where('status_appointment',3); // 3: Done
    return $this->db->count_all_results("appointment");
  }
  function chatRoom($id_member,$id_doctor){
    $this->db->where('id_member',$id_member);
    $this->db->where('id_doctor',$id_doctor);
    $query = $this->db->get('chatroom');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function createChatRoom($id_member,$id_doctor){
    $array = array(
        'id_doctor' => $id_doctor,
        'id_member' => $id_member,
        'date_chatroom' => date('Y-m-d H:i:s')
      );
    $this->db->insert('chatroom',$array);
    return 1;
  }
  function getChatRoom($id){
    /*
    $this->db->where('id_chatroom',$id);
    $query = $this->db->get('chatroom');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
    */
    $sql = "select ms_chatroom.*,doctor.full_name as full_name_doctor,ms_user.*
          FROM
          ms_chatroom
          JOIN ms_user ON ms_chatroom.id_member = ms_user.id_user
          JOIN (select * from ms_user) as doctor ON ms_chatroom.id_doctor = doctor.id_user
          ";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function fetchNotificationUser($limit,$start,$pagenumber,$id_user){
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('id_user',$id_user);
    $this->db->order_by('date_notification','DESC');
    $query = $this->db->get('notification');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return false;
  }
  function readNotif($id_user){
    $array = array(
          'status_notification' => 1
      );
    $this->db->where('id_user',$id_user);
    $this->db->update('notification',$array);
  }
  function fetchTransactionUser($limit,$start,$pagenumber,$id_user){
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('id_user',$id_user);
    //$this->db->where('status_transaction',1); // 1 : Approved
    $this->db->order_by('date_transaction','DESC');
    $query = $this->db->get('transaction');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return false;
  }
  function saveTopup($data,$id_user){
    $user = $this->mod->getDataWhere('user','id_user',$id_user);
    $payment = $this->mod->getDataWhere('payment','id_payment',$data['payment']);
    $array = array(
        'id_user' => $id_user,
        'debit_credit' => 0,
        'nominal' => $data['nominal'],
        'id_payment' => $data['payment'],
        'description' => 'Topup '.number_format($data['nominal']).' use '.$payment['name_payment'].' payment',
        'transaction_type' => 0,
        'date_transaction' => date('Y-m-d H:i:s'),
        'status_transaction' => 0
      );
    $this->db->insert('transaction',$array);
    return 1;
  }
  function getServicePrice($id) {
    $this->db->where('id_user',$id);
    $query = $this->db->get('fare');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function saveServicePrice($data,$id){
    $service = $this->mod->getDataWhere('fare','id_user',$id);
    $array = array(
        'consultation_fare' => $data['consultation_fare'],
        'appointment_fare' => $data['appointment_fare'],
        'id_user' => $id
      );
    if($service == FALSE){
      $this->db->insert('fare',$array);
    }
    else{
      $this->db->where('id_user',$id);
      $this->db->update('fare',$array);
    }
    return 1;
  }
  function registerUser($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'full_name' => $data['name'],
        'birthday' => date('Y-m-d',strtotime($data['birthday'])),
        'status_user' => 1,
        'permission' => 3,
        'phone_number' => '',
        'avatar' => '',
        'address' => '',
        'city' => '',
        'province' => '',
        'gender' => 0,
        'experience' => '',
        'date_register' => date('Y-m-d H:i:s'),
        'date_login' => '0000-00-00',
        'love' => 0,
        'amount' => 0,
        'identity_number' => ''
      );
    $this->db->insert('user',$array);


    // send email verification
    return 1;
  }
  function registerDoctor($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'full_name' => $data['name'],
        'birthday' => date('Y-m-d',strtotime($data['birthday'])),
        'status_user' => 1,
        'permission' => 2,
        'identity_number' => $data['no_praktek'],
        'phone_number' => '',
        'avatar' => '',
        'address' => '',
        'city' => '',
        'province' => '',
        'gender' => 0,
        'experience' => '',
        'date_register' => date('Y-m-d H:i:s'),
        'date_login' => '0000-00-00',
        'love' => 0,
        'amount' => 0
      );
    $this->db->insert('user',$array);


    // send email verification
    return 1;
  }
  function editProfile($data,$id){
      $array = array(
          'full_name' => $data['name'],
          'email' => $data['email'],
          'phone_number' => $data['phone_number'],
          'birthday' => date('Y-m-d',strtotime($data['birthday'])),
          'address' => $data['address'],
          'city' => $data['city'],
          'province' => $data['province'],
          'gender' => $data['gender'],
          'experience' => $data['experience']
        );

      if($data['password']!="")
      $array['password']=md5($data['password']);

      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
    function editProfileMember($data,$id){
      $array = array(
          'full_name' => $data['name'],
          'email' => $data['email'],
          'phone_number' => $data['phone_number'],
          'birthday' => date('Y-m-d',strtotime($data['birthday'])),
          'address' => $data['address'],
          'city' => $data['city'],
          'province' => $data['province'],
          'gender' => $data['gender']
        );

      if($data['password']!="")
      $array['password']=md5($data['password']);

      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
    function uploadAvatar($upload_data,$id){
      $array = array(
          'avatar' => 'assets/images/user/'.$upload_data['orig_name']
        );
      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
    }
    function fetchChat($id){
      $this->db->join('chatroom','chatroom.id_chatroom = chat.id_chatroom');
      $this->db->join('user','user.id_user = chat.id_user');
      $this->db->order_by('date_chat','ASC');
      $this->db->where('chat.id_chatroom',$id);
      $query = $this->db->get('chat');
      if($query->num_rows()>0){
        return $query->result();
      }
      else return false;
    }
    function fetchChatRoomDoctor($id){
      $this->db->join('user','user.id_user = chatroom.id_member');
      $this->db->order_by('date_chatroom','DESC');
      $this->db->where('chatroom.id_doctor',$id);
      $query = $this->db->get('chatroom');
      if($query->num_rows()>0){
        return $query->result();
      }
      else return false;
    }
    function sendChatMember($chat,$id_chatroom){
      // insert chat
      $chatroom = $this->mod->getDataWhere('chatroom','id_chatroom',$id_chatroom);
      $array = array(
          'id_chatroom' => $id_chatroom,
          'id_user' => $this->session->userdata('userId'),
          'chat' => $chat,
          'status_chat' => 1,
          'image_chat' => '',
          'date_chat' => date('Y-m-d H:i:s')
        );
      $this->db->insert('chat',$array);

      // insert notification
      $profile = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
      $message = "Hey, ".$profile['full_name']." just consult with you. Reply their Message.";
      $array = array(
          'id_user' =>  $chatroom['id_doctor'],
          'notification' => $message,
          'link_notification' => '/chatroom/'.$id_chatroom,
          'status_notification' => 0,
          'date_notification' => date('Y-m-d H:i:s'),
          'notification_type' => 3
        );
      $this->db->insert('notification',$array);

      // decrease amount for member
      $fare = $this->mod->getDataWhere('fare','id_user',$chatroom['id_doctor']);
      $total_amount = $profile['amount'];
      $setting = $this->mod->getDataWhere('setting','id_setting',1);
      $total_fare = 0;

      if($fare == false)
        $total_fare = 0;
      else
        $total_fare = $fare['consultation_fare'];

      $array = array(
          'amount' => $total_amount - ($total_fare + $setting['price_consultation'])
        );
      $this->db->where('id_user',$this->session->userdata('userId'));
      $this->db->update('user',$array);

      // increase amount for doctor
      $fare = $this->mod->getDataWhere('fare','id_user',$chatroom['id_doctor']);
      $doctor = $this->mod->getDataWhere('user','id_user',$chatroom['id_doctor']);
      $total_amount = $doctor['amount'];
      $setting = $this->mod->getDataWhere('setting','id_setting',1);
      $total_fare = 0;

      if($fare == false)
        $total_fare = 0;
      else
        $total_fare = $fare['consultation_fare'];

      $array = array(
          'amount' => $total_amount + $total_fare
        );
      $this->db->where('id_user',$chatroom['id_doctor']);
      $this->db->update('user',$array);

      if($profile['full_name'] == ""){
        $patient = "patient";
      }
      else{
        $patient = $profile['full_name'];
      }
      // insert transaction for doctor
      $array = array(
            'id_user' => $chatroom['id_doctor'],
            'id_payment' => 0,
            'debit_credit' => 0,
            'nominal' => $total_fare,
            'description' => 'Yippie! You got '.number_format($total_fare)." Because ".$patient." consult with you",
            'transaction_type' => 1,
            'date_transaction' => date('Y-m-d H:i:s'),
            'status_transaction' => 1
        );
      $this->db->insert('transaction',$array);

      if($doctor['full_name'] == ""){
        $doctor_name = "patient";
      }
      else{
        $doctor_name = $doctor['full_name'];
      }
      // insert transaction for patient
      $array = array(
            'id_user' => $chatroom['id_member'],
            'id_payment' => 0,
            'debit_credit' => 1,
            'nominal' => $total_fare+$setting['price_consultation'],
            'description' => 'Use '.number_format($total_fare+$setting['price_consultation'])." for consult to ".$doctor_name,
            'transaction_type' => 1,
            'date_transaction' => date('Y-m-d H:i:s'),
            'status_transaction' => 1
        );
      $this->db->insert('transaction',$array);

      // update datetime chatroom
      $array = array(
          'date_chatroom' => date('Y-m-d H:i:s')
        );
      $this->db->where('id_chatroom',$id_chatroom);
      $this->db->update('chatroom',$array);
    }
    function sendChatDoctor($chat,$id_chatroom){
      // insert chat
      $chatroom = $this->mod->getDataWhere('chatroom','id_chatroom',$id_chatroom);
      $array = array(
          'id_chatroom' => $id_chatroom,
          'id_user' => $this->session->userdata('userId'),
          'chat' => $chat,
          'status_chat' => 1,
          'image_chat' => '',
          'date_chat' => date('Y-m-d H:i:s')
        );
      $this->db->insert('chat',$array);

      // insert notification
      $doctor = $this->mod->getDataWhere('user','id_user',$chatroom['id_doctor']);
      $message = "Hey, ".$doctor['full_name']." just reply your message. check it out";
      $array = array(
          'id_user' =>  $chatroom['id_member'],
          'notification' => $message,
          'link_notification' => '/chatroom/'.$id_chatroom,
          'status_notification' => 0,
          'date_notification' => date('Y-m-d H:i:s'),
          'notification_type' => 3
        );
      $this->db->insert('notification',$array);

      // update datetime chatroom
      $array = array(
          'date_chatroom' => date('Y-m-d H:i:s')
        );
      $this->db->where('id_chatroom',$id_chatroom);
      $this->db->update('chatroom',$array);
    }
    function getLastChatDB($id_chatroom){
      $this->db->join('chatroom','chatroom.id_chatroom = chat.id_chatroom');
      $this->db->join('user','user.id_user = chat.id_user');
      $this->db->order_by('date_chat','DESC');
      $this->db->where('chat.id_chatroom',$id_chatroom);
      $query = $this->db->get('chat');
      if($query->num_rows()>0){
        return $query->row_array();
      }
      else return false;
    }
    function getLastChat($id_chatroom){
      $result = $this->getLastChatDB($id_chatroom);
       $message = "";
      if($result != FALSE){
        if($result['id_user'] == $result['id_member']) // sender si pasien
              $status = "sender";
        else if($result['id_user'] ==  $result['id_doctor']) // sender si dokter
              $status = "receive";

        if($result['avatar'] == ""){
            $avatar = "<i class=\"fa fa-user fa-4x\"></i>";
        }
        else{
            $avatar = "<img src=\"".base_url($result['avatar'])."\" class=\"img-responsive img-circle\">";
        }
        //$avatar = "test";

        $message .= "
            <div class=\"".$status."\">
              <div class=\"actor\">
                  ".$avatar."
              </div>
              <div class=\"actor-message\">
                <p>".$result['chat']."</p>
                <p><small>".date('H:i',strtotime($result['date_chat']))."</small></p>
              </div>
            </div>
        ";
      }
      else{
        $message = "error not found";
      }
      return $message;
    }
}
