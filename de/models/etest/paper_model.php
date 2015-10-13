<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper_model extends CI_Model {

	function __construct()
	{
  		parent::__construct();
		$this->db = $this->load->database('etest2013', true);
	}
	
	public function get_child_list_by_user($uid, $pid)
	{
		
		if( empty($uid) || empty($pid))
		{
			return FALSE;
		}
	
		
		$this->db->select('test_paper.paperid, test_paper.paper, test_paper.short_name, test_test.testid, test_test.creation_time, test_test.finish_time');
			
		$this->db->from('test_paper');
		$this->db->join('test_test', "test_paper.paperid=test_test.paperid AND uid='$uid'", 'left');
		$this->db->where('pid', $pid);
		$this->db->order_by('test_paper.paperid', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}	
	
	public function get_last_list($categoryid=0, $perpage=10)
	{		
		$this->db->select('paperid, paper');
		$this->db->where('enabled', 1);
		$this->db->where('pid', 0);
		if ( ! empty($categoryid))
		{
			$this->db->where('categoryid', $categoryid);
		}
		if ( ! empty($perpage))
		{
			$this->db->limit($perpage);
		}
		$query = $this->db->get('test_paper');
		return $query->result();
	}
	
	public function get_paper($paperid)
	{

		if (empty($paperid))
		{
			return FALSE;
		}
		$this->db->select('*');
		$this->db->where('paperid', $paperid);
		$query = $this->db->get('test_paper');
		return $query->row();
	}
	
	public function get_paper_list($like=NULL, $where=NULL, $order_by=array(), $page=NULL, $per_page=NULL)
	{
	
		$this->db->select('test_paper.*, test_category.category');
		$this->db->from('test_paper');
		$this->db->join('test_category', 'test_category.categoryid = test_paper.categoryid', 'left');
		
	
		if ( ! empty($where))
		{
			$this->db->where($where);
		}

		if ( ! empty($like))
		{
			foreach($like as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		

		if( ! empty($order_by))
		{
			$this->db->order_by($order_by[0], $order_by[1]);
		}
		
		if ( ! empty($page))
		{
			$this->load->library('pagination');
			$per_page = empty($per_page) ? $this->pagination->per_page : $per_page;	
			$this->db->limit($per_page, ($page-1) * $per_page);
		}elseif( ! empty($per_page))
		{
			$this->db->limit($per_page);
		}
		$query = $this->db->get();

		
		return $query->result();
	}
	
	public function get_paper_list_count($like, $where=NULL)
	{		
		
		$this->db->from('test_paper');
		if ( ! empty($where))
		{
			$this->db->where($where);
		}
		if ( ! empty($like))
		{
			foreach($like as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}

		
		return $this->db->count_all_results();
	}

	//TODO:: FOR IBM 考试的临时解决方案
	public function get_none_test_list($like=NULL, $where=NULL, $order_by=array(), $page=NULL, $per_page=NULL)
	{
	
		$this->db->select('test_paper.*');
		$this->db->from('test_paper');
		$this->db->join('test_test', 'test_test.paperid = test_paper.paperid AND fbf_test_test.uid='.$this->session->userdata('uid'), 'left');
		$this->db->where('test_test.paperid IS NULL AND fbf_test_paper.enabled = 1 AND fbf_test_paper.pid = 0 ORDER BY RAND() LIMIT 1');
	//	$this->db->where('fbf_test_paper.enabled = 1 AND fbf_test_paper.pid=0');
	
		if ( ! empty($where))
		{
			$this->db->where($where);
		}

		if ( ! empty($like))
		{
			foreach($like as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		

		if( ! empty($order_by))
		{
			$this->db->order_by($order_by[0], $order_by[1]);
		}
		
		if ( ! empty($page))
		{
			$this->load->library('pagination');
			$per_page = empty($per_page) ? $this->pagination->per_page : $per_page;	
			$this->db->limit($per_page, ($page-1) * $per_page);
		}elseif( ! empty($per_page))
		{
			$this->db->limit($per_page);
		}
		$query = $this->db->get();

		
		return $query->result();
	}
	
	public function get_item_list($paperid)
	{
		if (empty($paperid))
		{
			return FALSE;
		}
		$this->db->select('i.*, r.paper_regulationid');
		$this->db->select_sum('count');
	//	$this->db->select_sum('test_paper_regulation.point');
		$this->db->from('test_item AS i');
		$this->db->join('test_paper_regulation AS r', 'i.itemid=r.itemid');
		$this->db->where('r.paperid', $paperid);		
		$this->db->group_by('i.itemid');
		$this->db->order_by('i.itemid', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_paper_list_by_user($uid, $categoryid, $grade = NULL)
	{
		$this->db->select('p.paperid, p.paper, p.timer, t.creation_time');
		$this->db->from('test_paper AS p');
		$this->db->join('test_test AS t', "t.paperid=p.paperid AND t.uid='{$uid}'", 'left');
		$this->db->where('p.enabled', 1);
		$this->db->where('p.pid', 0);
		$this->db->where('p.categoryid', $categoryid);
		if ( ! empty($grade))
		{
			$this->db->where('p.grade', $grade);
		}
		$this->db->group_by('p.paperid');
		$this->db->order_by('p.paperid DESC, t.testid DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		
		return $query->result();
	}
}

