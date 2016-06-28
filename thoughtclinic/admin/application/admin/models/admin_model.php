<?php
class Admin_model extends CI_Model{
	
	private $tbl_name ="admin";
	
	function validate($data){
		$sql ="select * from $this->tbl_name where `username`=? and md5(`password`)=md5(?) ";
		$q = $this->db->query($sql,$data);
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function usr_existA($email){
		$this->db->where('username',$email);
		$q = $this->db->get($this->tbl_name);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data = $q->result_array();
		}
		return array('num'=>$num,'data'=>$data);
	}
}