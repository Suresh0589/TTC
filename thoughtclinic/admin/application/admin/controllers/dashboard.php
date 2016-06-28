<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
		$this->is_not_logged_in();	
        //$this->load->model('sweets_model');			
		//$this->load->model('shops_model');				
		//$this->load->model('cat_model');				
			
		
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
		$data['main_content']='dashboard';		
		//$data['sweets'] = $this->sweets_model->selectAllSweets();	
		//$data['shops'] = $this->shops_model->selectAllShops();	
		//$data['categories'] = $this->cat_model->selectAllCat();	
		
		$this->load->view('template/body',$data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */