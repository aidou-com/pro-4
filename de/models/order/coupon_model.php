<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_model extends CI_Model {
	private $group;
	private $db_my2009;

	function __construct()
	{
  		parent::__construct();
		$this->db_my2009 = $this->load->database('my2009', true);
	}
	 
	public function create_smscoupon($data)
	{
		if ( empty($data))
		{
			return FALSE;
		}
		
		$data = array(
					'mobile'	=>	$data['mobile'],
					'cnname'	=>	$data['cnname'],
					'base'	=>	$data['base'],
					'area'	=>	$data['area'],
					'enrollment'	=>	0,
					'result'	=>	'',
					'folder'	=>	0,
					'sendip'	=>	$data['sendip'],
					'sendtime'	=>	$data['sendtime'],
					'handler'	=>	0,
					'handletime'	=>	0,
					'lastpostuid'	=>	0,
					'lastpostip'	=>	'',
					'lastposttime'	=>	0,
					'smstopicid'	=>	0,
					'web_source'	=>	'mobile',
					'web_medium'	=>	'',
					'web_term'	=>	'',
					'web_content'	=>	'',
					'web_campaign'	=>	''
					);
		$this->db_my2009->insert('smscoupon', $data);
		$smscouponid = $this->db_my2009->insert_id();
		

		return $smscouponid;

	
	}
	
	
	public function get_smscoupon_list_count($like, $where=NULL)
	{		
		
		$this->db_my2009->from('smscoupon');
		if ( ! empty($where))
		{
			$this->db_my2009->where($where);
		}
		if ( ! empty($like))
		{
			foreach($like as $key => $val)
			{
				$this->db_my2009->like($key, $val);
			}
			
		}

		
		return $this->db_my2009->count_all_results();
	}
	
	
	

}

