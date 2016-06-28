<?php
class doctors extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		  $this->load->model('doctors_model');
		  $this->is_not_logged_in();		
	 }
	 
	 function is_not_logged_in(){
		$is_logged_in = $this->session->userdata('thought_adm_logged_in');
		if(isset($is_logged_in) && $is_logged_in != true)
		{
			redirect('login');			
		}		
	}
	 
	 function index(){
		  $data['get_data'] = $this->doctors_model->selectAll();
		  
		 $data['main_content'] = 'doctorslist';
		 
		 $this->load->view('template/body',$data);
	 }
	 
	 function add(){
		 
		 $data['main_content'] = 'add_doctor';
		 $this->load->view('template/body',$data);
	 }
	 
	 function edit(){
		$id = $this->uri->segment('3');
		$dd = $this->doctors_model->getDetails($id);
		$ad = $this->doctors_model->getDetailsAva($id);
		//print_r($ad); exit;
		if($dd['num']==1 && $ad['num']==1){			 
			$data['record'] = $dd['data'][0];
			$data['lang'] = explode(",", $dd['data'][0]['doc_lang']);
			//echo $data['lang']; exit;
			$data['ava'] = $ad['data'][0];
			$data['main_content'] = 'edit_doctor';		 
			$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('doctors');
		}

	}

	 function randString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	} 
	 
	 function create(){
			 
		
		$res = $this->doctors_model->getDetailsByEmail($this->input->post('doc_email'));
		
		 if($this->input->post('doc_name')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Name');
			redirect('doctors/add');
		 }else if($this->input->post('doc_spe')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Specilization');
			redirect('doctors/add');
		 }else if($this->input->post('doc_qua')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Qualification');
			redirect('doctors/add');
		 }else if($this->input->post('doc_exp')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Experience');
			redirect('doctors/add');
		 }else if($this->input->post('doc_mobile')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Mobile No');
			redirect('doctors/add');
		 }else if($this->input->post('doc_email')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Email');
			redirect('doctors/add');
		 }else if($this->input->post('doc_add')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Address');
			redirect('doctors/add');
		 }else if($this->input->post('doc_abt')=='' ){
			$this->session->set_flashdata('invalid','Please Enter About Doctor');
			redirect('doctors/add');
		 }else if($this->input->post('doc_tags')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Some Doctor Tags');
			redirect('doctors/add');
		 }else if($res['num']>0){
			 $this->session->set_flashdata('invalid','"'.$this->input->post('doc_email').'" Doctor With This Mail ID Alreay Exists');
			redirect('doctors/add');
		 }else{
				$password = $this->randString(6);
			
			$insert_data = array(
                'doc_name'=>addslashes($this->input->post('doc_name')),
                'doc_spe'=>addslashes($this->input->post('doc_spe')),
                'doc_qua'=>implode(",",$this->input->post('doc_qua')),
                'doc_lang'=>implode(",",$this->input->post('doc_lang')),
				'doc_exp'=>addslashes($this->input->post('doc_exp')),
				'doc_mobile'=>addslashes($this->input->post('doc_mobile')),
				'doc_email'=>addslashes($this->input->post('doc_email')),
				'doc_add'=>addslashes($this->input->post('doc_add')),
				'doc_abt'=>addslashes($this->input->post('doc_abt')),
				'doc_tags'=>addslashes($this->input->post('doc_tags')),
				'text_con'=>addslashes($this->input->post('text_con')),
				'msg_con'=>addslashes($this->input->post('msg_con')),
				'video_con'=>addslashes($this->input->post('video_con')),
				'phone_con'=>addslashes($this->input->post('phone_con')),
				'doc_pass'=>$password,
				'doc_time'=> date('Y-m-d H:i:s'),
				'doc_status'=>'1',	
			);
			
			if($_FILES['up']['name']!=""){			
				$fileTypes = array('jpeg','jpg','png','gif');
				$trgt='assets/doctors/';
				$size = $_FILES['up']['size'];
				$file_name = $_FILES['up']['name'];
				$path_parts=pathinfo($_FILES['up']['name']);
				if(!in_array($path_parts['extension'],$fileTypes)){
					$this->session->set_flashdata('invalid','only jpg,png,gif images are allowed');
					redirect('doctors/add');
				 }else{
				 	$file = time().'.'.$path_parts['extension'];
				 	$insert_data['doc_img']=$file;
				 	move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
					
				 }
			}
			$q = $this->doctors_model->create($insert_data);
			
			
			if($q)
			{
				
				$insert_ava_data = array(
                'mon'=>addslashes($this->input->post('mon')),
                'mon_other'=>addslashes($this->input->post('mon_other')),
                'tue'=>addslashes($this->input->post('tue')),
				'tue_other'=>addslashes($this->input->post('tue_other')),
				'wed'=>addslashes($this->input->post('wed')),
				'wed_other'=>addslashes($this->input->post('wed_other')),
				'thu'=>addslashes($this->input->post('thu')),
				'thu_other'=>addslashes($this->input->post('thu_other')),
				'fri'=>addslashes($this->input->post('fri')),
				'fri_other'=>addslashes($this->input->post('fri_other')),
				'sat'=>addslashes($this->input->post('sat')),
				'sat_other'=>addslashes($this->input->post('sat_other')),
				'sun'=>addslashes($this->input->post('sun')),
				'sun_other'=>addslashes($this->input->post('sun_other')),
				'doc_id'=> $this->db->insert_id(),
			);
			    //$doc_id = $this->db->insert_id();
				$q = $this->doctors_model->create_ava($insert_ava_data);
				
				$this->session->set_flashdata('success',$this->input->post('doc_name').' Doctor created successfully');
				redirect('doctors');
			}else{
					$this->session->set_flashdata('invalid','unable to create ,please try again');
					redirect('doctors/add'); 	 		 	
			}	
				
		 }
	 }
	 
	 function send_email($to,$subject,$message){
		$this->load->library('email');
		$config = array (
				  'mailtype' => 'html',
				  'charset'  => 'utf-8',
				  'priority' => '1'
				   );
		$this->email->initialize($config);
		$this->email->from('noreply@Mithai.com', 'Mithai');
		$this->email->to($to); 
		$this->email->bcc('visureddy19@gmail.com');
		$this->email->subject($subject);
		$this->email->message($message);	
		$this->email->send();				
		$this->email->print_debugger();
	}
	  
	 function view(){
		$id = $this->uri->segment('3');
		$cd = $this->models_model->getDetails($id);
		if($cd['num']==1){			 
			$data['record'] = $cd['data'][0];
			$data['main_content'] = 'viewmodel';		 
			$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('models');
		}
	}
	
	 function modify(){
		$id = $this->uri->segment('3');
		$dd = $this->doctors_model->getDetails($id);
		
		if($dd['num']==1){			
			$fileTypes = array('jpeg','jpg','png','gif');
			$trgt='assets/doctors/';
			$size = $_FILES['up']['size'];
			$file_name = $_FILES['up']['name'];
			$path_parts=pathinfo($_FILES['up']['name']);
		
			$update_data = array();
			$res = $this->doctors_model->getDetailsByEmail($this->input->post('doc_email'));
		
			 if($this->input->post('doc_name')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Name');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_spe')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Doctor Specilization');
			redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_qua')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Qualification');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_exp')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Experience');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_mobile')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Mobile No');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_email')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Email');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_add')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Address');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_abt')=='' ){
				$this->session->set_flashdata('invalid','Please Enter About Doctor');
				redirect('doctors/edit/'.$id);
			 }else if($this->input->post('doc_tags')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Some Doctor Tags');
				redirect('doctors/edit/'.$id);
			 }else{
				 
				 if($res['num']==0){
					$update_data['doc_email'] = addslashes($this->input->post('doc_email')); 
				 }
				 
				 if(isset($_FILES['up']['name']) && $_FILES['up']['name']!=''){
					if(!in_array($path_parts['extension'],$fileTypes)){
						 $this->session->set_flashdata('invalid','only jpg,png,gif images are allowed');
						redirect('doctors/edit/'.$id);
					 }else{
						 $file = time().'.'.$path_parts['extension'];
						 
						 move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
						 $update_data['doc_img']=$file;
						 
					 }
				 }
				 $update_data['doc_name']=addslashes($this->input->post('doc_name'));
				 $update_data['doc_spe']=addslashes($this->input->post('doc_spe'));
				 $update_data['doc_cat']=implode(",",$this->input->post('doc_cat'));
				 $update_data['doc_lang']=implode(",",$this->input->post('doc_lang'));
				 $update_data['doc_qua']=implode(",",$this->input->post('doc_qua'));
				 $update_data['doc_exp'] = addslashes($this->input->post('doc_exp'));
				 $update_data['doc_mobile'] = addslashes($this->input->post('doc_mobile'));
				 $update_data['doc_add'] = addslashes($this->input->post('doc_add'));
				 $update_data['doc_abt'] = addslashes($this->input->post('doc_abt'));
				 $update_data['doc_tags'] = addslashes($this->input->post('doc_tags'));
				 $update_data['doc_status'] = addslashes($this->input->post('doc_status'));
				 $update_data['text_con'] = addslashes($this->input->post('text_con'));
				 $update_data['msg_con'] = addslashes($this->input->post('msg_con'));
				 $update_data['video_con'] = addslashes($this->input->post('video_con'));
				 $update_data['phone_con'] = addslashes($this->input->post('phone_con'));
				 $update_data['doc_time'] =  date('Y-m-d H:i:s');
				 $q = $this->doctors_model->modify($update_data,$id);
				 
				 if($q)
					{
						$id = $this->uri->segment('3');
						$ad = $this->doctors_model->getDetailsAva($id);
						if($ad['num']==1){		
						
						$update_ava_data = array();
						 $update_ava_data['mon']=addslashes($this->input->post('mon'));
						 $update_ava_data['mon_other']=addslashes($this->input->post('mon_other'));
						 $update_ava_data['tue']=addslashes($this->input->post('tue'));
						 $update_ava_data['tue_other']=addslashes($this->input->post('tue_other'));
						 $update_ava_data['wed']=addslashes($this->input->post('wed'));
						 $update_ava_data['wed_other']=addslashes($this->input->post('wed_other'));
						 $update_ava_data['thu']=addslashes($this->input->post('thu'));
						 $update_ava_data['thu_other']=addslashes($this->input->post('thu_other'));
						 $update_ava_data['fri']=addslashes($this->input->post('fri'));
						 $update_ava_data['fri_other']=addslashes($this->input->post('fri_other'));
						 $update_ava_data['sat']=addslashes($this->input->post('sat'));
						 $update_ava_data['sat_other']=addslashes($this->input->post('sat_other'));
						 $update_ava_data['sun']=addslashes($this->input->post('sun'));
						 $update_ava_data['sun_other']=addslashes($this->input->post('sun_other'));
						 $q = $this->doctors_model->modify_ava($update_ava_data,$id);
						 
						 }else{
						$this->session->set_flashdata('invalid','invalid request');
						redirect('doctors/edit/'.$id);
					}
						
						$this->session->set_flashdata('success',$this->input->post('doc_name').' Doctor updated successfully');
						redirect('doctors');
					}else{
							$this->session->set_flashdata('invalid','unable to update ,please try again');
							redirect('doctors/edit/'.$id); 	 		 	
					}	
			 }
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('doctors/edit/'.$id);
		}
	}
	 
	 function del(){
		$id = $this->uri->segment('3');
		$dd = $this->doctors_model->getDetails($id);
		if($dd['num']==1){			 
			if($dd['data'][0]['doc_img']!=""){
				unlink('assets/doctors/'.$dd['data'][0]['doc_img']);
			}
			
			$this->doctors_model->del($id);
			$this->session->set_flashdata('success','"'.$dd['data']['0']['doc_name'].'"Doctor Deleted Successfully');
			redirect('doctors');
			
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('doctors');
		}
	}
	
	
}