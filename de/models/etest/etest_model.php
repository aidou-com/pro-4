<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etest_model extends CI_Model {

	function __construct()
	{
  		parent::__construct();
	}
	

	
	public function create_etest($data = array())
	{	
		if ( empty($data))
		{
			return FALSE;
		}		
	
		$data = array(
			'mobile'	=> $data['mobile'],
			'cnname'	=> $data['cnname'],
			'score'	=> $data['score'],
			'paper_id'	=> $data['paper_id'],
			'creation_time'	=>	$data['creation_time'],
			'created_at'	=>	time(),
			'created_ip'	=>	$this->input->ip_address()
			);
			
		$this->db->insert('etest', $data);
		$id = $this->db->insert_id();
		
		
		if(empty($id))
		{
			return FALSE;
		}
		else
		{
			return $id;
		}
	
	}
	

}

