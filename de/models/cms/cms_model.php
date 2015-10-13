<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {

	private $db;

	function __construct()
	{
  		parent::__construct();
		$this->db = $this->load->database('cms', true);
	}

	public function get_school($id)
	{
		$this->db->select('ecms_school.id, ecms_school.title, ecms_school.classid, ecms_school.newspath, ecms_school.checked, ecms_school.keyboard, ecms_school.newstime, ecms_school.isgood, ecms_school.firsttitle, 
						 ecms_school.dokey, ecms_school.smalltext, ecms_school.logo, ecms_school.schooljpname, ecms_school.schooltype, ecms_school.property, ecms_school.areajapan, ecms_school.founding, ecms_school.next, ecms_school.titlefont, ecms_school.titleurl,  ecms_school.onclick, 						 						ecms_school.titlepic, 
						ecms_school_data_1.intro, ecms_school_data_1.address, ecms_school_data_1.url, ecms_school_data_1.tel, ecms_school_data_1.fax');						
		$this->db->from('ecms_school');
		$this->db->join('ecms_school_data_1', 'ecms_school_data_1.id = ecms_school.id');
		$this->db->where('ecms_school.id', $id);
		
		$query = $this->db->get();

		$row = $query->row();

		$row->intro = stripslashes($row->intro);				
		$row->next = stripslashes($row->next);

		return $row;	
	}

	public function get_school_list($condition=array(), $order_by=array(), $page=NULL, $per_page=NULL)
	{
		$this->db->select('ecms_school.*, enewsclass.classname, enewsclass.classpath, enewsclass.classurl');
		$this->db->from('ecms_school');
		$this->db->join('enewsclass', 'enewsclass.classid = ecms_school.classid');
	
		if (isset($condition['where']))
		{
			$this->db->where($condition['where']);
		}

		if (isset($condition['like']))
		{
			foreach($condition['like'] as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		
		if (isset($condition['where_in']))
		{
			$this->db->where_in($condition['where_in'][0], $condition['where_in'][1]);
		}

		if( ! empty($order_by))
		{
			$this->db->order_by($order_by[0], $order_by[1]);
		}
		else
		{
			$this->db->order_by('istop', 'DESC');
			$this->db->order_by('newstime', 'DESC');
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

	public function get_school_list_count($condition)
	{		
		
		$this->db->from('ecms_school');
		$this->db->join('enewsclass', 'enewsclass.classid = ecms_school.classid');
		
		if (isset($condition['where']))
		{
			$this->db->where($condition['where']);
		}

		if (isset($condition['like']))
		{
			foreach($condition['like'] as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		
		if (isset($condition['where_in']))
		{
			$this->db->where_in($condition['where_in'][0], $condition['where_in'][1]);
		}

		
		return $this->db->count_all_results();
	}

	public function get_flash($id)
	{
		$this->db->select('ecms_flash.id, ecms_flash.title, ecms_flash.classid, ecms_flash.newspath, ecms_flash.checked, ecms_flash.keyboard, ecms_flash.newstime, 
						ecms_flash.ztid, ecms_flash.isgood, ecms_flash.firsttitle, ecms_flash.dokey, ecms_flash.filename, 
						ecms_flash.titlefont, ecms_flash.titleurl, ecms_flash.onclick, ecms_flash.titlepic, 
						  ecms_flash.flashurl, ecms_flash.flashsay');						
		$this->db->from('ecms_flash');
		$this->db->where('ecms_flash.id', $id);
		
		$query = $this->db->get();

		$row = $query->row();

		return $row;	
	}
	
	public function get_flash_list($condition=array(), $order_by=array(), $page=NULL, $per_page=NULL)
	{
		$this->db->select('ecms_flash.*, enewsclass.classname, enewsclass.classpath, enewsclass.classurl');
		$this->db->from('ecms_flash');
		$this->db->join('enewsclass', 'enewsclass.classid = ecms_flash.classid');
	
		if (isset($condition['where']))
		{
			$this->db->where($condition['where']);
		}

		if (isset($condition['like']))
		{
			foreach($condition['like'] as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		
		if (isset($condition['where_in']))
		{
			$this->db->where_in($condition['where_in'][0], $condition['where_in'][1]);
		}

		if( ! empty($order_by))
		{
			$this->db->order_by($order_by[0], $order_by[1]);
		}
		else
		{
			$this->db->order_by('istop', 'DESC');
			$this->db->order_by('newstime', 'DESC');
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
	 
	public function get_news($id)
	{
		$this->db->select('ecms_news.id, ecms_news.title, ecms_news.classid, ecms_news.newspath, ecms_news.checked, ecms_news.keyboard, ecms_news.newstime, 
						ecms_news.ztid, ecms_news.isgood, ecms_news.firsttitle, ecms_news.ftitle, ecms_news.dokey, ecms_news.smalltext, ecms_news.filename, 
						ecms_news.titlefont, ecms_news.titleurl, ecms_news.onclick, ecms_news.titlepic, 
						ecms_news_data_1.writer, ecms_news_data_1.befrom, ecms_news_data_1.newstext');						
		$this->db->from('ecms_news');
		$this->db->join('ecms_news_data_1', 'ecms_news_data_1.id = ecms_news.id');
		$this->db->where('ecms_news.id', $id);
		
		$query = $this->db->get();

		$row = $query->row();

		if ( ! empty($row))
		{
			$row->newstext = stripslashes($row->newstext);
			$row->newstext = preg_replace('/ (?:height|width)=(\'|").*?\\1/','',$row->newstext);
			$row->newstext = preg_replace('/text-indent: 2em;/','',$row->newstext);
		}
		
		return $row;	
	}
	
	public function get_news_list($condition=array(), $order_by=array(), $page=NULL, $per_page=NULL)
	{
		$this->db->select('ecms_news.*, enewsclass.classname, enewsclass.classpath, enewsclass.classurl');
		$this->db->from('ecms_news');
		$this->db->join('enewsclass', 'enewsclass.classid = ecms_news.classid');
	
		if (isset($condition['where']))
		{
			$this->db->where($condition['where']);
		}

		if (isset($condition['like']))
		{
			foreach($condition['like'] as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		
		if (isset($condition['where_in']))
		{
			$this->db->where_in($condition['where_in'][0], $condition['where_in'][1]);
		}

		if( ! empty($order_by))
		{
			$this->db->order_by($order_by[0], $order_by[1]);
		}
		else
		{
			$this->db->order_by('istop', 'DESC');
			$this->db->order_by('newstime', 'DESC');
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
	
	public function get_news_list_by_nodeid($nodeid, $page=1, $per_page=NULL)
	{
		$condition = array();		
		
		if (is_array($nodeid))
		{
				
			$condition['where_in'] = array('ecms_news.classid', $nodeid);			
		}
		else
		{
			
			$condition['where'] = array('ecms_news.classid' => $nodeid);	
		}
					
		return $this->get_news_list($condition, NULL, $page, $per_page);
			
	}
	
	public function get_news_list_by_ztid($ztid, $page=1, $per_page=10)
	{
		$condition = array();
		
		if (isset($ztid[0]))
		{
			$condition['where'] = "(ztid LIKE '%{$ztid[0]}%'";
			
			for ($i=1, $count = count($ztid); $i<$count; $i++)
			{
				$condition['where'] .= " OR ztid LIKE '%{$ztid[$i]}%'";
			}
			$condition['where'] .= ")";
		}
		else
		{
			$condition['like'] = array(
						'ztid' => '|{$ztid}|'
						);
		}
		
		$condition['where'] .= " AND titlepic !=''";
					
		return $this->get_news_list($condition, NULL, $page, $per_page);
			
	}
	
	public function get_news_list_count($condition)
	{		
		
		$this->db->from('ecms_news');
		$this->db->join('enewsclass', 'enewsclass.classid = ecms_news.classid');
		
		if (isset($condition['where']))
		{
			$this->db->where($condition['where']);
		}

		if (isset($condition['like']))
		{
			foreach($condition['like'] as $key => $val)
			{
				$this->db->like($key, $val);
			}
			
		}
		
		if (isset($condition['where_in']))
		{
			$this->db->where_in($condition['where_in'][0], $condition['where_in'][1]);
		}

		
		return $this->db->count_all_results();
	}
	
	public function get_news_list_count_by_nodeid($nodeid)
	{
		$condition = array();		
		
		if (is_array($nodeid))
		{
				
			$condition['where_in'] = array('ecms_news.classid', $nodeid);			
		}
		else
		{
			
			$condition['where'] = array('ecms_news.classid' => $nodeid);	
		}
					
		return $this->get_news_list_count($condition);
	}
	
	public function get_news_list_count_by_ztid($ztid)
	{
		$condition = array();
		
		if (isset($ztid[0]))
		{
			$condition['where'] = "(ztid LIKE '%{$ztid[0]}%'";
			
			for ($i=1, $count = count($ztid); $i<$count; $i++)
			{
				$condition['where'] .= " OR ztid LIKE '%{$ztid[$i]}%'";
			}
			$condition['where'] .= ")";
		}
		else
		{
			$condition['like'] = array(
						'ztid' => '|{$ztid}|'
						);
		}
		
		$condition['where'] .= " AND titlepic !=''";
					
		return $this->get_news_list_count($condition);
	}
	
	public function update_news_click($id)
	{
		$this->db->set('onclick', 'onclick+1', FALSE);	
		$this->db->where('id', $id);
		
		return $this->db->update('ecms_news');		
	}

}

