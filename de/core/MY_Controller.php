<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $local;
	public $local_list;

	public function __construct()
	{

		parent::__construct();

		$this->load->library('localization');
	//	$this->load->library('ad');

		$this->local = $this->localization->get_local();
		$local_list = $this->localization->get_city_list();

		foreach ($local_list as $list) {
	//		if ($list['code'] != $this->local['code'])
	//		{
				$this->local_list[] = $list;
	//		}
		}

	}

	public function load_branch()
	{
		$this->load->driver('cache',  array('adapter' => 'file'));

		if ( ! $branch = $this->cache->get('branch'))
		{
		     $this->load->model('branch_model');
		     $branch_list = $this->branch_model
		     				->select("branchid, name, enname, pid, type, tel, address, qq, livechat")
		     				->order_by('displayorder')
		     				->as_array()
		     				->get_many_by(array('status'=>1));

		     $branch = array();


		     foreach ($branch_list as $list) {

		     	if ( ! empty($list['tel']))
		     	{
		     		$list['tels'] = explode(PHP_EOL, $list['tel']);
		     	}		     	
		     	$branch[] = $list;
		     }

		     // Save into the cache for 1 day
		    $this->cache->save('branch', $branch, 86400);
		}

		return $branch;


	}

}
