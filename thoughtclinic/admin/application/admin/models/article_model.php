<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article_model extends CI_Model{
	
	private $tbl_name='articles';
	
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
	
	function getDetailsByTitle($art_title)
	{
		$query = "select * from $this->tbl_name where  art_title=?";
		
		$q = $this->db->query($query,array($art_title));		
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
	
	function getDetails($id)
	{
		$this->db->where('art_id',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	
     function modify($data,$id){
		$this->db->where('art_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
		
	}
	
	function del($id){
		$this->db->where('art_id',$id);
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