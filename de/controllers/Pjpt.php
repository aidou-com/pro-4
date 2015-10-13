<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pjpt extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function _remap($method, $params)
	{
		if ($method == 'index')
		{
			$this->index();
		}
		elseif(in_array($method, array('intro', 'baoming')))
		{
			if (isset($params[0]))
			{
				$page = (int) $params[0];
			}
			else
			{
				$page = 1;
			}
			$this->get_acticle_list($method, $page);
		}
	}

	public function index()
	{
		$this->load->model('cms/cms_model');

		$summary_ids = array(73,74);

		$condition['where_in'] = array('ecms_news.classid', $summary_ids);
		$order_by = array('newstime', 'DESC');

		$data['summary_list'] = $this->cms_model->get_news_list($condition, $order_by, 1, 15);

		unset($condition);

		$condition['where_in'] = array('ecms_news.classid', array(73));
		$order_by = array('newstime', 'DESC');

		$data['news_list'] = $this->cms_model->get_news_list($condition, $order_by, 1, 6);


		$this->load->view('kaoshi/pjpt', $data);
	}

	public function get_acticle_list($id = NULL, $page = NULL)
	{
		$title_ids = array(
						'intro' => 73,
						'baoming' => 74
						);
		$ids = array($title_ids[$id]);

		$this->load->model('cms/cms_model');

		$condition['where_in'] = array('ecms_news.classid', $ids);
		$order_by = array('newstime', 'DESC');

		$data['acticle_list'] = $this->cms_model->get_news_list($condition, $order_by, 1, 30);
		
		$this->load->library('pagination');
		$config['base_url'] = $this->config->site_url('jlpt/'.$id);
		$config['total_rows'] = $this->cms_model->get_news_list_count_by_nodeid($title_ids[$id]);
		$config['uri_segment'] = 3;
		$config['per_page'] = 2; 
		$this->pagination->initialize($config); 

		$this->load->view('kaoshi/pjpt_acticle_list', $data);
	}


	
}