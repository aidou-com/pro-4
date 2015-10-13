<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends MY_Model {

	protected $primary_key = 'courseid';
	protected $_table = 'course';
	protected $_table_class = 'class';
	protected $_table_branch = 'branch';


	public function __construct()
    {
        parent::__construct();
        $this->_database = $this->load->database('my2009', true);

    }

	public function get_course_list($where, $page=1, $per_page=18)
	{
		$timestamp = time();

		
		if (isset($where['date']))
		{
			$date = (string) $where['date'];

			if (empty($date))
			{
				unset($where['date']);

				$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp));
			}
			else
			{
				if (strlen($date) !=4 OR ! is_numeric($date)){
					show_404();
				}
				else
				{
					$year = substr($date, 0, 2);
					$month = substr($date, 2, 2);

					if ($month > 12 OR $month <= 0)
					{
						show_404();
					}
					$this_year = date('y', $timestamp);
					if ($year < ($this_year-5) OR $year >  ($this_year+2))
					{
						show_404();
					}

				}

				$time = mktime(0,0,0,$month,15,'20'.$year)+2592000;

				$finishdate = date('Y-m-1', $time);

				if (date("ym", $timestamp) == $year.$month)
				{	
					$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp),
							'begindate<'=> $finishdate);	
				}
				else
				{
					$where['date'] = array('begindate>='=> '20'.$year.'-'.$month.'-1',
							'begindate<'=> $finishdate);	
				}

				


			}

		}
	//	$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp));
		$course_where = array();
		$class_where = array();
		$class_where = $where['date'];

		

		if ( ! empty($where['category']) )
		{
			$course_where['category'] = $where['category'];
		}

		if ( ! empty($where['timesystem']) )
		{
			$course_where['timesystem'] = $where['timesystem'];
			$class_where['timesystem'] = $where['timesystem'];
		}

		if ( ! empty($where['branch']) )
		{
			$course_where["$this->_table_class.branchid"] = $where['branch'];
			$class_where["$this->_table_class.branchid"] = $where['branch'];
		}
		else
		{

			switch ($this->local['code']) {
				case 'sh':
					$course_where['pid'] = 1;					
					break;
				case 'nj':
					$course_where["$this->_table_class.branchid"] = 9;
					break;
				case 'wx':
					$course_where["$this->_table_class.branchid"] = 17;
					break;
				case 'sz':
					$course_where["$this->_table_class.branchid"] = 10;
					break;
				case 'nt':
					$course_where["$this->_table_class.branchid"] = 12;
					break;
				
				default:
					# code...
					break;
			}

		}

		if ( ! empty($where['base']) )
		{
			$course_where['base'] = $where['base'];
		}


		$this->select("{$this->_table}.courseid, {$this->_table}.name, {$this->_table}.discount, {$this->_table}.tuition, {$this->_table}.viewnum, {$this->_table}.promotion, {$this->_table_branch}.livechat");
		$this->_database->join($this->_table_class, "{$this->_table_class}.courseid = {$this->_table}.courseid");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table_class}.branchid");
		$this->_database->distinct("{$this->_table}.courseid");
		$this->_database->where($where['date']);

		$course_list = $this->limit($per_page, ($page-1)*$per_page)
							->order_by('begindate')
							->get_many_by($course_where);

		$this->load->model('courses/class_model');

		$courses = array();

		foreach ($course_list as $course) {
			$this->class_model->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table_class}.branchid");
			$this->class_model->_database->where('courseid',$course->courseid);
			$course->classes = $this->class_model->limit(4)
									->select("{$this->_table_class}.classid, {$this->_table_branch}.name, {$this->_table_class}.alias, {$this->_table_class}.branchid, begindate, {$this->_table_branch}.livechat")	
									->order_by('begindate')
									->order_by("{$this->_table_branch}.branchid")
									->get_many_by($class_where);
			$courses[] = $course;

		}

		return $courses;

	}

	public function count_course($where)
	{
		$timestamp = time();
		if (isset($where['date']))
		{
			$date = (string) $where['date'];

			if (empty($date))
			{
				unset($where['date']);

				$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp));
			}
			else
			{
				if (strlen($date) !=4 OR ! is_numeric($date)){
					show_404();
				}
				else
				{
					$year = substr($date, 0, 2);
					$month = substr($date, 2, 2);

					if ($month > 12 OR $month <= 0)
					{
						show_404();
					}
					$this_year = date('y', $timestamp);
					if ($year < ($this_year-5) OR $year >  ($this_year+2))
					{
						show_404();
					}

				}

				$time = mktime(0,0,0,$month,15,'20'.$year)+2592000;

				$finishdate = date('Y-m-1', $time);

				if (date("ym", $timestamp) == $year.$month)
				{	
					$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp),
							'begindate<'=> $finishdate);	
				}
				else
				{
					$where['date'] = array('begindate>='=> '20'.$year.'-'.$month.'-1',
							'begindate<'=> $finishdate);	
				}

				


			}

		}
	//	$where['date'] = array('begindate>='=>date("Y-m-d", $timestamp));
		$course_where = array();

		if ( ! empty($where['category']) )
		{
			$course_where['category'] = $where['category'];
		}

		if ( ! empty($where['timesystem']) )
		{
			$course_where['timesystem'] = $where['timesystem'];
		}

		if ( ! empty($where['branch']) )
		{
			$course_where["$this->_table_class.branchid"] = $where['branch'];
		}
		else
		{

			switch ($this->local['code']) {
				case 'sh':
					$course_where['pid'] = 1;					
					break;
				case 'nj':
					$course_where["$this->_table_class.branchid"] = 9;
					break;
				case 'wx':
					$course_where["$this->_table_class.branchid"] = 17;
					break;
				case 'sz':
					$course_where["$this->_table_class.branchid"] = 10;
					break;
				case 'nt':
					$course_where["$this->_table_class.branchid"] = 12;
					break;
				
				default:
					# code...
					break;
			}

		}



		if ( ! empty($where['base']) )
		{
			$course_where['base'] = $where['base'];
		}

		$this->select("{$this->_table}.courseid, {$this->_table}.name, {$this->_table}.discount, {$this->_table}.tuition, {$this->_table}.viewnum, {$this->_table}.promotion");

		$this->_database->join($this->_table_class, "{$this->_table_class}.courseid = {$this->_table}.courseid");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table_class}.branchid");
		$this->_database->distinct("{$this->_table}.courseid");
		$this->_database->where($where['date']);

		return $this->count_by($course_where);
		
	}


	public function update_viewnum($id)
	{
		$this->_database->set('viewnum', 'viewnum+1', FALSE);	
		$this->_database->where_in($id);
		
		return $this->_database->update($this->_table);		
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
	
	

}

