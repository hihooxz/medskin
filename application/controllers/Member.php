<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('permission') != 3){
			redirect(base_url('page/login'));
		}
		$this->load->model('mnews');
		$this->load->model('mpayment');
		$this->load->model('muser');
		$this->load->model('mappointment','mapp');
	}
	public function home(){
		// Ngeload data
	    $perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/home/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNews($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/member/home',$data);
	}
	public function news(){
		// Ngeload data
	    $perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/home/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNews($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/member/news',$data);
	}
	public function view_profile(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/home'));

		$perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/user/manage_user/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNewsProfile($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable

		$this->load->view('default/member/profile',$data);
	}
	public function read_news(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mnews->getNews($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/home'));

		$perpage = 5;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/read-news/'.$id.'/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('comment','id_news',$id);// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchComment($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('comment','id_news',$id); // Make a variable (array) link so the view can call the variable

		$this->form_validation->set_rules('comment','Comment','required');
		if(!$this->form_validation->run()){
			$this->load->view('default/member/read_news',$data);
		}
		else{
			$data['save'] = $this->mnews->saveComment($_POST,$this->session->userdata('userId'),$id);
			$this->load->view('default/member/read_news',$data);
		}
	}
	public function chat(){
		$id = $this->uri->segment(3);
		$user = $this->mod->getDataWhere('user','id_user',$id);
		if($user == false){
			redirect(base_url($this->uri->segment(1).'/home'));
		}
		else{
			$result = $this->muser->chatRoom($this->session->userdata('userId'),$id); // param1 : id_pasien, param2:
			if($result == false){
				$this->muser->createChatRoom($this->session->userdata('userId'),$id); // param1 : id_pasien, param2: id_doctor
				$result = $this->muser->chatRoom($this->session->userdata('userId'),$id); // param1 : id_pasien, param2:
				$id_chatroom = $result['id_chatroom'];
				redirect(base_url($this->uri->segment(1).'/chatroom/'.$id_chatroom));
			}
			else{
				$id_chatroom = $result['id_chatroom'];
				redirect(base_url($this->uri->segment(1).'/chatroom/'.$id_chatroom));
			}
		}
	}
	public function chatroom(){
		$id = $this->uri->segment(3);
		$data['result']	= $this->muser->getChatRoom($id);
		if($data['result'] == false)
			show_404();

		$data['results'] = $this->muser->fetchChat($id);
		$this->load->view('default/member/chat',$data);
	}
	public function send_chat(){
		$id_chatroom = $this->input->post('id_chatroom');
		$chat = $this->input->post('chat');

			$chatroom = $this->mod->getDataWhere('chatroom','id_chatroom',$id_chatroom);
			$pasien = $this->mod->getDataWhere('user','id_user',$chatroom['id_member']);
			$doctor = $this->mod->getDataWhere('fare','id_user',$chatroom['id_doctor']);
			$setting = $this->mod->getDataWhere('setting','id_setting',1);
		$this->form_validation->set_rules('chat','Chat','required');
		if(!$this->form_validation->run()){
			$data['result'] = FALSE;
			$data['result_chat'] = "test";
			$data['error'] = validation_errors();
		}
		else{
			$fare = 0;
			if($doctor != false)
				$fare += ($doctor['consultation_fare']+$setting['price_consultation']);
			else
				$fare = $fare+$setting['price_consultation'];

			if($pasien['amount'] >= $fare){
				$data['result'] = $this->muser->sendChatMember($this->input->post('chat'),$this->input->post('id_chatroom'));
				$data['result_chat'] = $this->muser->getLastChat($id_chatroom);
				//$data['result_chat'] = "test";
			}
			else{
				$data['result'] = FALSE;
				$data['result_chat'] = "<script type=\"text/javascript\">$('#chat').modal('show');</script>";
			}
		}
		$user = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$data['amount'] = "IDR ".number_format($user['amount']);
		//$data['result_chat'] = $fare;
		echo json_encode($data);
	}
	public function send_chat_image(){
		$id_chatroom = $this->input->post('id_chatroom');
		$image_chat = $this->input->post('image_chat');
		/*
			$chatroom = $this->mod->getDataWhere('chatroom','id_chatroom',$id_chatroom);
			$pasien = $this->mod->getDataWhere('user','id_user',$chatroom['id_member']);
			$doctor = $this->mod->getDataWhere('fare','id_user',$chatroom['id_doctor']);
			$setting = $this->mod->getDataWhere('setting','id_setting',1);
		$this->form_validation->set_rules('chat','Chat','required');
		if(!$this->form_validation->run()){
			$data['result'] = FALSE;
			$data['result_chat'] = "test";
			$data['error'] = validation_errors();
		}
		else{
			$fare = 0;
			if($doctor != false)
				$fare += ($doctor['consultation_fare']+$setting['price_consultation']);
			else
				$fare = $fare+$setting['price_consultation'];

			if($pasien['amount'] >= $fare){
				$data['result'] = $this->muser->sendChatMember($this->input->post('chat'),$this->input->post('id_chatroom'));
				$data['result_chat'] = $this->muser->getLastChat($id_chatroom);
				//$data['result_chat'] = "test";
			}
			else{
				$data['result'] = FALSE;
				$data['result_chat'] = "<script type=\"text/javascript\">$('#chat').modal('show');</script>";
			}
		}
		$user = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$data['amount'] = "IDR ".number_format($user['amount']);*/
		//$data['result_chat'] = $fare;
		$data['data_chat'] = "testing aja ";
		echo json_encode($data);
	}
	public function find_doctor(){
		$this->form_validation->set_rules('search','Search Keyword','');
		$this->form_validation->set_rules('city','City','');
		$this->form_validation->set_rules('id_search','City','required');

		if(!$this->form_validation->run()){
			$perpage = 10;
			$this->load->library('pagination'); // load libraray pagination
		    $config['base_url'] = base_url($this->uri->segment(1).'/find-doctor/'); // configurate link pagination
		    $config['total_rows'] = $this->mod->countWhereData('user','permission',2);// fetch total record in databae using load
		    $config['per_page'] = $perpage; // Total data in one page
		    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		    $config['num_links'] = round($choice); // Rounding Choice Variable
		    $config['use_page_numbers'] = TRUE;
		    $this->pagination->initialize($config); // intialize var config
		    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		    $data['results'] = $this->muser->fetchDoctor($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
		    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		    $data['total_rows'] = $this->mod->countWhereData('user','permission',2); // Make a variable (array) link so the view can call the variable
			$this->load->view('default/member/find',$data);
		}
		else if($this->form_validation->run() && ($this->input->post('search') != "" || $this->input->post('city') != "" || $this->input->post('by') !="") ){
			$data['results'] = $this->muser->fetchDoctorSearch($_POST); // fetch data
			$this->load->view('default/member/find',$data);
		}
		else{
			$perpage = 10;
			$this->load->library('pagination'); // load libraray pagination
		    $config['base_url'] = base_url($this->uri->segment(1).'/find-doctor/'); // configurate link pagination
		    $config['total_rows'] = $this->mod->countWhereData('user','permission',2);// fetch total record in databae using load
		    $config['per_page'] = $perpage; // Total data in one page
		    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		    $config['num_links'] = round($choice); // Rounding Choice Variable
		    $config['use_page_numbers'] = TRUE;
		    $this->pagination->initialize($config); // intialize var config
		    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		    $data['results'] = $this->muser->fetchDoctor($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
		    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		    $data['total_rows'] = $this->mod->countWhereData('user','permission',2); // Make a variable (array) link so the view can call the variable
			$this->load->view('default/member/find',$data);
		}
	}
	public function notification(){
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/notification/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('notification','id_user',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->muser->fetchNotificationUser($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('notification','id_user',$this->session->userdata('userId')); // Make a variable (array) link so the view

	    // make as read notification
	    $this->muser->readNotif($this->session->userdata('userId'));
		$this->load->view('default/member/notification',$data);
	}
	public function appointment(){
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/appointment/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('appointment','id_member',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mapp->fetchAppointmentUpcoming($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('appointment','id_member',$this->session->userdata('userId')); // Make a variable (array) link so the view can call

	     $config['base_url'] = base_url($this->uri->segment(1).'/appointment/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('appointment','id_member',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results2'] = $this->mapp->fetchAppointmentDone($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links2'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows2'] = $this->mod->countWhereData('appointment','id_member',$this->session->userdata('userId')); // Make a
		$this->load->view('default/member/appointment',$data);
	}
	public function book_appointment(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->muser->getDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/find-doctor'));
		$medskin = $this->mod->getDataWhere('setting','id_setting',1);

		$this->form_validation->set_rules('booked_date','Booked Date','required');
		$this->form_validation->set_rules('date','Booked Time','required');
		if(!$this->form_validation->run()){
			$result = $data['result'];
			$user = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
			if($user['amount'] >= $result['appointment_fare']+$medskin['price_appointment']){
				$this->load->view('default/member/book_appointment',$data);
			}
			else{
				$this->load->view('default/member/book_appointment_failed',$data);
			}
		}
		else{
			$array = array(
					'booked_data' => array(
						'booked_date'=>$this->input->post('booked_date'),
						'booked_time'=>$this->input->post('date')
					)
				);
			$this->session->set_userdata($array);
			redirect(base_url($this->uri->segment(1).'/book-appointment-next/'.$id));
		}
	}
	public function book_appointment_next(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/find-doctor'));

		$data['profile'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));

		$this->form_validation->set_rules('relation','Relation','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('phone_number','Phone Number','required|numeric');
		$this->form_validation->set_rules('disease','Disease','');
		if(!$this->form_validation->run())
			$this->load->view('default/member/book_appointment_next',$data);
		else{
			$data['save'] = $this->mapp->booked($_POST,$this->session->userdata('booked_data'),$id);
			$array = array(
					'booked_data'=>NULL
				);
			$this->session->set_userdata($array);
			redirect(base_url($this->uri->segment(1).'/appointment'));
		}
	}
	public function status_canceled(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$array = array(
				'status_appointment' => 2 // 2: Canceled
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);

		// send notification to pasien
		$result = $data['result'];
		$notif = "How Dear, ".$result['full_name']." Just Canceled their appointment at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
        $array = array(
            'id_user' => $result['id_doctor'],
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);
		redirect(base_url($this->uri->segment(1).'/detail-appointment/'.$id));
	}
	public function love_it(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		$result = $data['result'];
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$dokter = $this->mod->getDataWhere('user','id_user',$result['id_doctor']);

		$array = array(
				'love' => $dokter['love']+1 // love ++
			);
		$this->db->where('id_user',$result['id_doctor']);
		$this->db->update('user',$array);
		$array = array(
				'love_it' => 1 // 1: Already given love
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);

		// send notification to pasien
		$notif = "How Sweet, ".$result['full_name']." Just Love it your appointment at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
        $array = array(
            'id_user' => $result['id_doctor'],
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);
		redirect(base_url($this->uri->segment(1).'/detail-appointment/'.$id));
	}
	public function bookmarked(){
		// Ngeload data
	    $perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/home/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNewsBookmark($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/member/news',$data);
		//$this->load->view('default/member/bookmarked');
	}
	public function medical_record(){
		$this->load->view('default/member/medical_record');
	}
	public function detail_appointment(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$this->load->view('default/member/detail_appointment',$data);
	}
	public function amount(){
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));;

		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/amount/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('transaction','id_user',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->muser->fetchTransactionUser($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('transaction','id_user',$this->session->userdata('userId')); //
		$this->load->view('default/member/amount',$data);
	}
	public function topup(){
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));;

		$this->form_validation->set_rules('amount','Amount','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/member/topup',$data);
		else{
			$array = array(
					'amount' => $this->input->post('amount')
				);
			$this->session->set_flashdata($array);
			redirect(base_url($this->uri->segment(1).'/topup-next'));
		}
	}
	public function topup_next(){
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));;
		$data['results'] = $this->mod->fetchAllData('payment');

		$this->form_validation->set_rules('payment','Payment','required');

		if(!$this->form_validation->run())
			$this->load->view('default/member/topup_next',$data);
		else{
			$data['save'] = $this->muser->saveTopup($_POST,$this->session->userdata('userId'));
			$array = array(
					'amount' => NULL
				);
			$this->session->set_flashdata($array);
			$this->load->view('default/member/topup_finish',$data);
		}
	}
	public function edit_profile(){
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));

			$this->form_validation->set_rules('name','full Name','required');
			$this->form_validation->set_rules('password','Password','');
			$this->form_validation->set_rules('confirm','Confirm Password','matches[password]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('phone_number','Phone Number','required|numeric');
			$this->form_validation->set_rules('birthday','Birthday','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('province','Province','required');
			$this->form_validation->set_rules('gender','Gender','required');

			if(!$this->form_validation->run())
				$this->load->view('default/member/edit_profile',$data);
			else{
				$this->session->set_flashdata(array('form_success'=>TRUE));
				$data['save'] = $this->muser->editProfileMember($_POST,$this->session->userdata('userId'));
				//$this->load->view('default/member/edit_profile',$data);
				redirect(base_url($this->uri->segment(1).'/edit-profile'));
				//echo $this->input->post('gender');
			}
	}
	public function upload_avatar(){
		$this->form_validation->set_rules('name','full Name','required');
			$this->form_validation->set_rules('password','Password','');
			$this->form_validation->set_rules('confirm','Confirm Password','matches[password]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('phone_number','Phone Number','required|numeric');
			$this->form_validation->set_rules('birthday','Birthday','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('province','Province','required');
			$this->form_validation->set_rules('gender','Gender','required');
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
				$config['upload_path'] = './assets/images/user/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('default/doctor/edit_profile',$data);
				}

			else{
				$save = $this->muser->uploadAvatar($this->upload->data(),$this->session->userdata('userId'));
				redirect(base_url($this->uri->segment(1).'/edit-profile/'));
			}
	}
	public function set_bookmark(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mnews->getNews($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/news'));

		$this->mnews->saveBookmark($id,$this->session->userdata('userId'));
		redirect(base_url($this->uri->segment(1).'/news'));
	}
	public function unset_bookmark(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('bookmark','id_bookmark',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/news'));

		$this->db->where('id_bookmark',$id);
		$this->db->delete('bookmark');
		redirect(base_url($this->uri->segment(1).'/news'));
	}
	public function confirm_payment(){
		$this->form_validation->set_rules('name_bank','Bank\'s Name','required');
		$this->form_validation->set_rules('account_name','Account\'s Name','required');
		$this->form_validation->set_rules('account_number','Account\'s Number','required|numeric');
		$this->form_validation->set_rules('nominal','Nominal','required|numeric');
		$this->form_validation->set_rules('date_transfer','Transfer Date','required');

		if(!$this->form_validation->run())
			$this->load->view('default/member/confirm_payment');
		else{
			$array = array(
					'confirmPaymentData' => array(
							'name_bank' => $this->input->post('name_bank'),
							'account_name' => $this->input->post('account_name'),
							'account_number' => $this->input->post('account_number'),
							'nominal' => $this->input->post('nominal'),
							'date_transfer' => $this->input->post('date_transfer')
						)
				);
			$this->session->set_userdata($array);
			redirect(base_url($this->uri->segment(1).'/confirm_payment_next'));
		}
	}
	public function confirm_payment_next(){
		$data['results'] = $this->mod->fetchAllData('payment');

		$this->form_validation->set_rules('payment','Bank\'s Name','required');

		if(!$this->form_validation->run())
			$this->load->view('default/member/confirm_payment_next',$data);
		else{
			$this->mpayment->saveConfirmPayment($_POST,$this->session->userdata('confirmPaymentData'));
			$this->session->set_flashdata(array('confirmPayment'=>TRUE));
			$array = array(
					'confirmPaymentData' => NULL
				);
			$this->session->set_userdata($array);
			redirect(base_url($this->uri->segment(1).'/confirm_payment'));
		}
	}
	public function treatment_enquiry(){
		$this->load->view('default/member/treatment_enquiry');
	}
	function logout(){
		$array = array(
					'permission' => NULL,
					'userId' => NULL,
					'username' => NULL,
				);
			$this->session->set_userdata($array);
		redirect(base_url('page/login'));
	}
	function onlineuser(){
		echo $this->onlineusers->total_users();
	}
}
