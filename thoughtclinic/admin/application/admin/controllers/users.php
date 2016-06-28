<?php
class users extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		  $this->load->model('users_model');
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
		  $data['get_data'] = $this->users_model->selectAll();
		  
		 $data['main_content'] = 'userslist';
		 
		 $this->load->view('template/body',$data);
	 }
	 
	
	
}