<?php
class Home_m extends CI_model{
  public function __construct(){
    parent::__construct();
  }

  public function multiple_data($table,$where='',$sort='')
	{
    //print_r($sort);
    //echo array_keys($sort)[0];
		$this->db->select('*');
		$this->db->from($table);
    if($where!=''){
      $this->db->where($where);
    }
    if($sort!=''){
       $this->db->order_by($sort['key'],$sort['order']);
    }
		return $this->db->get()->result_array();
    //return $this->db->last_query();
	}
	public function single_data($table,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row_array();
     $this->db->last_query();
	}

  public function update_data($table,$data,$where)
  {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update($table);
    return $this->db->last_query();
  }



}
?>
