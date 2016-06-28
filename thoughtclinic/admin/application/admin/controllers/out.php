<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Out extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); header("Cache-Control: no-store,no-cache, must-revalidate");
		//$this->load->model("users_model");
		//$this->is_not_logged_in();
	}
	
	function is_not_logged_in()
	{
		$is_logged_in = $this->session->userdata('thought_adm_logged_in');
		if(isset($is_logged_in) && $is_logged_in != true)
		{
			redirect('login');			
		}		
	}
		
	public function index()
	{		
		$sess_data = array(
			'thought_adm_name'=>'',
			'thought_adm_logged_in'=>false
		);
		$this->session->set_userdata($sess_data);
		redirect("login");
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */