<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users_model extends CI_Model{
	
	private $tbl_name='customers_auth';
	
	function selectAll()
	{
		$q = $this->db->get($this->tbl_name);
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $data) {
			$result[] = $data;
			}
			return $result;
		}
	}
	
}