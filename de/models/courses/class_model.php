<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends MY_Model {

	protected $_table = 'class';
	protected $_table_course = 'course';
	protected $_table_branch = 'branch';


	public function __construct()
    {
        parent::__construct();
        $this->_database = $this->load->database('my2009', true);

    }

    public function get_class_list($where, $page=1, $per_page=18)
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
			$course_where["$this->_table.branchid"] = $where['branch'];
		}
		else
		{

			switch ($this->local['code']) {
				case 'sh':
					$course_where['pid'] = 1;					
					break;
				case 'nj':
					$course_where["$this->_table.branchid"] = 9;
					break;
				case 'wx':
					$course_where["$this->_table.branchid"] = 17;
					break;
				case 'sz':
					$course_where["$this->_table.branchid"] = 10;
					break;
				case 'nt':
					$course_where["$this->_table.branchid"] = 12;
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


		$this->select("{$this->_table_branch}.name AS branch_name,{$this->_table_branch}.livechat,
					{$this->_table}.begindate, {$this->_table}.finishdate, {$this->_table}.timedetail,
					{$this->_table}.courseid, {$this->_table_course}.name, {$this->_table_course}.discount, {$this->_table_course}.tuition, {$this->_table_course}.viewnum, {$this->_table_course}.promotion");
		$this->_database->join($this->_table_course, "{$this->_table_course}.courseid = {$this->_table}.courseid");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table}.branchid");

		$this->_database->where($where['date']);

		$course_list = $this->limit($per_page, ($page-1)*$per_page)
							->order_by('begindate')
							->order_by("{$this->_table_branch}.branchid")
							->get_many_by($course_where);

		$courses = array();

		foreach ($course_list as $list) {
			$list->begindate = substr($list->begindate, 2,2).'年'.intval(substr($list->begindate, 5,2)).'月'.intval(substr($list->begindate, 8,2)).'日';
			$list->finishdate = substr($list->finishdate, 2,2).'年'.intval(substr($list->finishdate, 5,2)).'月'.intval(substr($list->finishdate, 8,2)).'日';
			$list->timedetail = $this->get_timedetail_text($list->timedetail);
			$courses[] = $list;

		}


		return $course_list;

	}

	public function count_class($where)
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
			$course_where["$this->_table.branchid"] = $where['branch'];
		}
		else
		{

			switch ($this->local['code']) {
				case 'sh':
					$course_where['pid'] = 1;					
					break;
				case 'nj':
					$course_where["$this->_table.branchid"] = 9;
					break;
				case 'wx':
					$course_where["$this->_table.branchid"] = 17;
					break;
				case 'sz':
					$course_where["$this->_table.branchid"] = 10;
					break;
				case 'nt':
					$course_where["$this->_table.branchid"] = 12;
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


		$this->select("{$this->_table}.courseid, {$this->_table_course}.name, {$this->_table_course}.discount, {$this->_table_course}.tuition, {$this->_table_course}.viewnum, {$this->_table_course}.promotion");
		$this->_database->join($this->_table_course, "{$this->_table_course}.courseid = {$this->_table}.courseid");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table}.branchid");

		$this->_database->where($where['date']);

		return $this->count_by($course_where);
		
	}




	public function count_class_branch($where)
	{
		$this->select("{$this->_table}.*, {$this->_table_branch}.name AS branch_name, {$this->_table_branch}.livechat");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table}.branchid");


		return $this->count_by($where);

	}

	public function get_class_branch($where)
	{
		$this->select("{$this->_table}.*, {$this->_table_branch}.name AS branch_name, {$this->_table_branch}.livechat");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.branchid = {$this->_table}.branchid");

		$class_list = parent::get_many_by($where);

		$classes = array();

		foreach($class_list as $list)
		{
			$list->timedetail = $this->get_timedetail_text($list->timedetail);
			$classes[] = $list;
		}

		return $classes;

	}


	public function get_timedetail_text($time_detail)
	{
		if (substr($time_detail,-1) == '|'){
			$time_detail = substr($time_detail, 0, -1);
		}
		$details = explode('|', $time_detail);
		$countdetail = count($details);
		$text = '';
				$timelines = array();
				$timeweeks = array();
				$timebegins = array();
				$timefinishs = array();
		for ($i=0; $i<$countdetail; $i++){
			$timetimes = explode('/', $details[$i]);
			$numbers = array('1', '2', '3', '4', '5', '6', '7');
			$cnnumbers = array('一', '二', '三', '四', '五', '六', '日');
			$text .= '周'.str_replace($numbers, $cnnumbers, $timetimes[0]).' ';

			$timetimes_temp = explode('-', $timetimes[1]);
			$text .= substr($timetimes_temp[0], 0, 2).':'.substr($timetimes_temp[0], 2, 2).'-'.
					substr($timetimes_temp[1], 0, 2).':'.substr($timetimes_temp[1], 2, 2);
			$text .='<br>';	

		}
		return $text;
	}
}

