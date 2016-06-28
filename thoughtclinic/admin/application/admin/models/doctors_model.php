<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class doctors_model extends CI_Model{
	
	private $tbl_name='doctors';
	private $tbl_ava='avaliability';
	
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
	
	function getDetailsByEmail($doc_email)
	{
		$query = "select * from $this->tbl_name where  doc_email=?";
		
		$q = $this->db->query($query,array($doc_email));		
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	
	function create($data) 
	{
		$q = $this->db->insert($this->tbl_name,$data);
		return $q;
	}
	
	function create_ava($data) 
	{
		$q = $this->db->insert($this->tbl_ava,$data);
		return $q;
	}
	
	function getDetails($id)
	{
		$this->db->where('doc_id',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function getDetailsAva($id)
	{
		$this->db->where('doc_id',$id);	
		$q = $this->db->get($this->tbl_ava);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	
     function modify($data,$id){
		$this->db->where('doc_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
		
	}
	
	 function modify_ava($data,$id){
		$this->db->where('doc_id',$id);
		$q = $this->db->update($this->tbl_ava,$data);
		return $q;
		
	}
	
	function del($id){
		$this->db->where('doc_id',$id);
		$q = $this->db->delete($this->tbl_name);
		return $q;
		
	}
	
	 function selectAllShops(){
		
	
		$q = $this->db->get("$this->tbl_name as s");	
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result();
		}
		return array('num'=>$num,'data'=>$data);
	} 
	
	function selectAllActive()
	{
		$this->db->where('model_status','1');
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function shops()
	{
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
}