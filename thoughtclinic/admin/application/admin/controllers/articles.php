<?php
class articles extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		  $this->load->model('article_model');
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
		  $data['get_data'] = $this->article_model->selectAll();
		  
		 $data['main_content'] = 'articlelist';
		 
		 $this->load->view('template/body',$data);
	 }
	 
	 function add(){
		 
		 $data['main_content'] = 'add_article';
		 $this->load->view('template/body',$data);
	 }
	 
	 function edit(){
		$id = $this->uri->segment('3');
		$ad = $this->article_model->getDetails($id);
		if($ad['num']==1){			 
			$data['record'] = $ad['data'][0];
			$data['main_content'] = 'edit_article';		 
			$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('articles');
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
			 
		 if($this->input->post('art_title')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Article Title');
			redirect('articles/add');
		 }else if($this->input->post('art_content')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Article Content');
			redirect('articles/add');
		 }else if($this->input->post('art_tags')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Article Tags');
			redirect('articles/add');
		 }else{
			$insert_data = array(
                'art_title'=>addslashes($this->input->post('art_title')),
                'art_content'=>addslashes($this->input->post('art_content')),
                'art_tags'=>addslashes($this->input->post('art_tags')),
				'art_time'=>date('Y-m-d H:i:s'),
				'art_status'=>'1',	
			);
			if($_FILES['up']['name']!=""){			
				$fileTypes = array('jpeg','jpg','png','gif');
				$trgt='assets/articles/';
				$size = $_FILES['up']['size'];
				$file_name = $_FILES['up']['name'];
				$path_parts=pathinfo($_FILES['up']['name']);
				if(!in_array($path_parts['extension'],$fileTypes)){
					$this->session->set_flashdata('invalid','only jpg,png,gif images are allowed');
					redirect('doctors/add');
				 }else{
				 	$file = time().'.'.$path_parts['extension'];
				 	$insert_data['art_img']=$file;
				 	move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
					
				 }
			}
			$q = $this->article_model->create($insert_data);
			
			
			if($q)
			{
				$this->session->set_flashdata('success',$this->input->post('art_title').' Article created successfully');
				redirect('articles');
			}else{
					$this->session->set_flashdata('invalid','unable to create ,please try again');
					redirect('articles/add');
				
		 }
	 }
	 }
	
	
	 function modify(){
		$id = $this->uri->segment('3');
		$ad = $this->article_model->getDetails($id);
		
		if($ad['num']==1){	
            $fileTypes = array('jpeg','jpg','png','gif');
			$trgt='assets/articles/';
			$size = $_FILES['up']['size'];
			$file_name = $_FILES['up']['name'];
			$path_parts=pathinfo($_FILES['up']['name']);		
			$update_data = array();
			$res = $this->article_model->getDetailsByTitle($this->input->post('art_title'));
		
			 if($this->input->post('art_title')=='' ){
				$this->session->set_flashdata('invalid','Please Article Title');
				redirect('articles/edit/'.$id);
			 }else if($this->input->post('art_content')=='' ){
			$this->session->set_flashdata('invalid','Please Enter Article Content');
			redirect('articles/edit/'.$id);
			 }else if($this->input->post('art_tags')=='' ){
				$this->session->set_flashdata('invalid','Please Enter Doctor Qualification');
				redirect('articles/edit/'.$id);
			 }else{
				 
				 if($res['num']==0){
					$update_data['art_title'] = addslashes($this->input->post('art_title')); 
				 }
				 if(isset($_FILES['up']['name']) && $_FILES['up']['name']!=''){
					if(!in_array($path_parts['extension'],$fileTypes)){
						 $this->session->set_flashdata('invalid','only jpg,png,gif images are allowed');
						redirect('articles/edit/'.$id);
					 }else{
						$file = time().'.'.$path_parts['extension'];
						 move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
						 $update_data['art_img']=$file;
						 
					 }
				 }
				 $update_data['art_content']=addslashes($this->input->post('art_content'));
				 $update_data['art_tags']=addslashes($this->input->post('art_tags'));
				 $update_data['art_status'] = addslashes($this->input->post('art_status'));
				 $update_data['art_time'] = date('Y-m-d H:i:s');
				 $q = $this->article_model->modify($update_data,$id);
				 
				 if($q)
					{
						
						$this->session->set_flashdata('success',$this->input->post('art_title').' Article updated successfully');
						redirect('articles');
					}else{
							$this->session->set_flashdata('invalid','unable to update ,please try again');
							redirect('articles/edit/'.$id); 	 		 	
					}	
			 }
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('articles/edit/'.$id);
		}
	}
	 
	 function del(){
		$id = $this->uri->segment('3');
		$ad = $this->article_model->getDetails($id);
		if($ad['num']==1){			 
			$this->article_model->del($id);
			$this->session->set_flashdata('success','"'.$dd['data']['0']['art_title'].'"Article Deleted Successfully');
			redirect('articles');
			
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('articles');
		}
	}
	
	
}