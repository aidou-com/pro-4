<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uchome_model extends CI_Model {
	private $group;
	private $db_my2009;

	function __construct()
	{
  		parent::__construct();
		$this->db = $this->load->database('uchome', true);

		$this->uchome_url = 'http://www.onlyjp.cn/home/';
	}
	 
	public function get_album($id)
	{
		$this->db->select('albumid, albumname, uid, username, dateline, updatetime, picnum, pic');						
		$this->db->from('album');
		$this->db->where('albumid', $id);
		$this->db->where('password', '');
		
		$query = $this->db->get();
		
		return $query->row();	
	}
	
	public function get_album_list($condition=array(), $order_by=array(), $page=NULL, $per_page=NULL)
	{
		$this->db->select('albumid, albumname, uid, username, dateline, updatetime, picnum, pic');
		$this->db->from('album');
	
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
			$this->db->order_by('albumid', 'DESC');
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

		$list = array();
		foreach ($query->result()as $row) {
			$row->pic_url = $this->uchome_url.'attachment/'.$row->pic;
			$list[] = $row;
		}
		return $list;
	}

	public function get_pic($id)
	{
		$this->db->select('picid, albumid, uid, dateline, filename, title, size, filepath, thumb, hot, username');						
		$this->db->from('pic');
		$this->db->where('picid', $id);
		
		$query = $this->db->get();
		
		$row = $query->row();

		if ( ! empty($row))
		{
			$row->pic_url = $this->uchome_url.'attachment/'.$row->filepath;
		}

		return $row;
	}
	
	public function get_pic_list($condition=array(), $order_by=array(), $page=NULL, $per_page=NULL)
	{
		$this->db->select('picid, albumid, uid, dateline, filename, title, size, filepath, thumb, hot, username');
		$this->db->from('pic');
	
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
			$this->db->order_by('picid', 'DESC');
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
		
		$list = array();
		foreach ($query->result()as $row) {
			$row->thumb_url = $this->uchome_url.'attachment/'.$row->filepath.'.thumb.jpg';
			$list[] = $row;
		}
		return $list;
	}
	
	public function get_pic_list_count($condition)
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

