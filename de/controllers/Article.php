<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {

	private $ids;
	
	public function __construct()
	{
		parent::__construct();


		$this->ids = array(
					'teaching' => 96,
					'eju' => 97,
					'fee' => 90,
					'condition' => 91, 
					'policy' => 92,
					'prepare' => 93,
					'life' => 93,
					'admission' => 99,
					'cover' => 10
					);

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
			$this->load->view('article/article', $data);
		}
		elseif( in_array($id, array_keys($this->ids)))
		{
			if ( ! empty($page))
			{
				$page = $page[0];
			}
			$this->_lists($id, $page);			
		}
		else
		{
			show_404();
		}
		
	}

	private function _lists($id, $page = NULL)
	{	
		$page = intval($page) ? intval($page) : 1;

		$nodeid = $this->ids[$id];

		$data = array();

		$this->load->model('cms/cms_model');

		$data['article_list'] = $this->cms_model->get_news_list_by_nodeid($nodeid, $page);

		$config['base_url'] = $this->config->site_url('article/'.$id);
		$config['total_rows'] = $this->cms_model->get_news_list_count_by_nodeid($nodeid);
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('article/article_list', $data);
	}
	
	


}	

