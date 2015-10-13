<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $branches;

	public function __construct()
	{
		parent::__construct();
		
		$this->branches = $this->load_branch();
	}

	public function index()
	{
		$this->load->model('cms/cms_model');

		$corpnewsid = array(105);

		$condition['where_in'] = array('ecms_news.classid', $corpnewsid);
		$condition['where'] = array('ecms_news.titlepic !=' =>'');
		$order_by = array('newstime', 'DESC');

		$data['news_list'] = $this->cms_model->get_news_list($condition, $order_by, 1, 4);


		$this->load->view('index', $data);
	}

}