<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends MY_Model {

	protected $_table = 'teacher';
	protected $_table_branch = 'teacher_branch';
	

	public function get_teacher_branch($branch_id = NULL, $page=1, $per_page=10)
	{
		if ( ! empty($branch_id))
		{
			$where = array("{$this->_table_branch}.branch_id" => $branch_id);
		}
		

		$this->select("{$this->_table}.*");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.teacher_id = {$this->_table}.id");
		$this->order_by("{$this->_table_branch}.postion", "DESC");
		$this->order_by("{$this->_table}.postion", "DESC");
		$this->order_by("{$this->_table}.id", "ASC");

		$teacher_list = $this->limit($per_page, ($page-1)*$per_page)
							->get_many_by($where);

		return $teacher_list;
	}

	public function count_teacher_branch($branch_id = NULL)
	{
		if ( ! empty($branch_id))
		{
			$where = array("{$this->_table_branch}.branch_id" => $branch_id);
		}

		$this->select("{$this->_table}.*");
		$this->_database->join($this->_table_branch, "{$this->_table_branch}.teacher_id = {$this->_table}.id");

		return $this->count_by($where);
		
	}
}

