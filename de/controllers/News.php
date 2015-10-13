<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {

	public $branches;

	public function __construct()
	{
		parent::__construct();
		
		$this->branches = $this->load_branch();
	}

	public function _remap($id, $page=NULL)
	{
		$data = array();

		$this->load->model('cms/cms_model');

		if (is_numeric($id))
		{
			$data['article'] = $this->cms_model->get_news($id);

			if (empty($data['article']))
			{
				show_404();
			}
			$this->load->view('news/news', $data);
		}
		else
		{
			$this->index();
		}
		
	}

	public function index()
	{
		$this->load->model('cms/cms_model');


		$corpnewsid = array(105);

		$condition['where_in'] = array('ecms_news.classid', $corpnewsid);
		$condition['where'] = array('ecms_news.titlepic !=' =>'');
		$order_by = array('newstime', 'DESC');

		$data['news_list'] = $this->cms_model->get_news_list($condition, $order_by, 1, 40);


		$this->load->view('news/index', $data);
	}

}