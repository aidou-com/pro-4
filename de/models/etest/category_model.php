<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
	protected $cache;
	
	function __construct()
	{
  		parent::__construct();
		$this->load->database();
	}
	
	public function start_cache()
	{
		$this->cache = TRUE;
	}
	
	public function stop_cache()
	{
		$this->cache = FALSE;
	}
	
	public function get_category_list()
	{
		$this->db->select('*');
		$this->db->order_by('categoryid', 'asc');
		$query = $this->db->get('test_category');
	}
	
	public function get_category_list_cache()
	{
		if ($this->cache->get('test_category_list') === FALSE)
		{
			return $this->save_category_list_cache();
		
		}
		else
		{
			return $this->cache->get('test_category_list') ;
		}
			
	} 
	
/*
* test_category_list »º´æ1¸öÔÂ
*/
	public function save_category_list_cache()
	{
		$category_list = $this->get_category_list();
		if ($this->cache->save('test_category_list', $category_list, 2592000) === FALSE)
		{
			return FALSE;
		}
		else
		{
			return $category_list;
		}
	
	}
	
	
	public function get_category($categoryid = NULL)
	{
		if( empty($categoryid)){
			return FALSE;
		}
		$this->db->select('*');
		$this->db->where('categoryid', $categoryid);
		$query = $this->db->get('test_category');
		
		return $query->row();
		
	}
}

