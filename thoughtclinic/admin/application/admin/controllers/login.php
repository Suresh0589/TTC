<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
		$this->is_logged_in();
		$this->load->model("admin_model");
		
	}
	
	function is_logged_in(){
		$is_logged_in = $this->session->userdata('thought_adm_logged_in');
		if(isset($is_logged_in) && $is_logged_in == true)
		{
			redirect('dashboard');			
		}		
	}
	
	public function index(){		
		$this->load->view('login_new');
	}

	public function old(){		
		$this->load->view('login');
	}
	
	function validate(){
		
		
		$username = addslashes($_POST['inputEmail']);
		$password = addslashes($_POST['inputPassword']);
		
		$validate_data = array(
			'username'=>$username,
			'password'=>$password,
		);
		$q = $this->admin_model->validate($validate_data);
		
		if($q['num']==1){
			$sess_data = array(
				'thought_adm_name'=>$q['data'][0]['username'],
				'thought_adm_logged_in'=>true
			);
			$this->session->set_userdata($sess_data);
			$resA = array(
				'success'=>1,
				'msg'=>'<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Well Done!</strong>Logged In successfully</div>'
			);
		}else{
			$resA = array(
				'success'=>0,
				'msg'=>'<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning ! </strong> Invalid Details</div>'
			);
		}
		echo json_encode($resA);	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */