<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends MY_Controller {

	public $courses;
	public $branches;
	
	public function __construct()
	{
		parent::__construct();

		$this->config->load('courses');

		$this->courses = $this->config->item('courses');
		
	//	$this->config->load('branches');
	//	$this->branches = $this->config->item('branches');

		$this->branches = $this->load_branch();

	}

	public function _remap($params, $id)
	{
		$methods = explode('-', $params);
		$method = $methods[0];

		if ($method == 'index')
		{
			$this->index();
		}
		elseif($method == 'list')
		{
			if (count($methods) != 6 OR substr($methods[5], -5) != '.html')
			{
				show_404();
			}

			$_GET['category'] = $methods[1];
			$_GET['timesystem'] = $methods[2];
			$_GET['branch'] = $methods[3];
			$_GET['base'] = $methods[4];
			$_GET['date'] = substr($methods[5], 0, -5);

			$this->index();
		}
		elseif($method == 'classlist')
		{
			if (count($methods) != 6 OR substr($methods[5], -5) != '.html')
			{
				show_404();
			}

			$_GET['category'] = $methods[1];
			$_GET['timesystem'] = $methods[2];
			$_GET['branch'] = $methods[3];
			$_GET['base'] = $methods[4];
			$_GET['date'] = substr($methods[5], 0, -5);

			$this->classes();
		}
		elseif($method == 'course')
		{

			if (! isset($id[0]) || substr($id[0], -5) != '.html')
			{
				show_404();
			}
			else
			{
				$this->course($id);
			}
		}
		elseif($method == 'classes')
		{
			$this->classes();
		}
		elseif($method == 'page')
		{
			if ( ! empty($id))
			{
				$id = $id[0];
			}
			else
			{
				$id =1;
			}

			$this->page($id);
		}
		elseif($method == 'classpage')
		{
			if ( ! empty($id))
			{
				$id = $id[0];
			}
			else
			{
				$id =1;
			}

			$this->classpage($id);
		}
		elseif($method == 'get_class_json')
		{
			$this->get_class_json();
		}
	}

	public function index($page=NULL)
	{

		if ( is_null($page))
		{
			$page = 1;
		}
		else
		{
			$page = (int) $page;
		}

		$this->load->model('courses/course_model');

		$category = (int) $this->input->get('category');
		$timesystem = (int) $this->input->get('timesystem');
		$branch = (int) $this->input->get('branch');
		$base = (int) $this->input->get('base');
		$date = (int) $this->input->get('date');

		$where = array(
				'category' => $category,
				'timesystem' => $timesystem,
				'branch' => $branch,
				'base' => $base,
				'date' => $date
			);

		$data['category'] = $category;
		$data['time_system'] = $timesystem;
		$data['branch'] = $branch;
		$data['base'] = $base;
		$data['date'] = $date;

		$time = mktime(0,0,0,date('m', time()),15,date('Y', time()));

		$data['dates'] = array();

		for($i=0; $i<8; $i++)
		{
			$date_time = $time+($i*2592000);
			$data['dates'][] = array(
								'id'=>date('ym', $date_time),
								'title'=>date('n', $date_time),
								); 

		}

		$this->load->library('pagination');

		$config['base_url'] = site_url('courses/page');
		$config['total_rows'] = $this->course_model->count_course($where);
		$config['per_page'] = 18; 

		$this->pagination->initialize($config); 

		if ($config['per_page']*($page-1) > $config['total_rows'])
		{
			show_404();
		}



		$data['course_list'] = $this->course_model->get_course_list($where, $page, $config['per_page']);


		$this->load->view('courses/index', $data);
	}

	public function page($page=NULL)
	{
		$this->index($page);
	}

	public function classes($page=NULL)
	{
		if ( is_null($page))
		{
			$page = 1;
		}
		else
		{
			$page = (int) $page;
		}

		$this->load->model('courses/class_model');

		$category = (int) $this->input->get('category');
		$timesystem = (int) $this->input->get('timesystem');
		$branch = (int) $this->input->get('branch');
		$base = (int) $this->input->get('base');
		$date = (int) $this->input->get('date');

		$where = array(
				'category' => $category,
				'timesystem' => $timesystem,
				'branch' => $branch,
				'base' => $base,
				'date' => $date
			);

		$data['category'] = $category;
		$data['time_system'] = $timesystem;
		$data['branch'] = $branch;
		$data['base'] = $base;
		$data['date'] = $date;

		$time = mktime(0,0,0,date('m', time()),15,date('Y', time()));

		$data['dates'] = array();

		for($i=0; $i<8; $i++)
		{
			$date_time = $time+($i*2592000);
			$data['dates'][] = array(
								'id'=>date('ym', $date_time),
								'title'=>date('n', $date_time),
								); 

		}



		$this->load->library('pagination');

		$config['base_url'] = site_url('courses/classpage');
		$config['total_rows'] = $this->class_model->count_class($where);
		$config['per_page'] = 18; 

		$this->pagination->initialize($config); 

		if ($config['per_page']*($page-1) > $config['total_rows'])
		{
			show_404();
		}
	


		$data['class_list'] = $this->class_model->get_class_list($where, $page, $config['per_page']);


		$this->load->view('courses/classes', $data);
	}

	public function classpage($page=NULL)
	{
		$this->classes($page);
	}

	public function course($id)
	{
		$this->load->model('courses/course_model');

		$data['course'] = $this->course_model->get($id);

		if (empty($data['course']))
		{
			show_404();
		}

		if (strpos($data['course']->name, '全日制') !== FALSE)
		{
			$data['course']->prefix = '全日制';
		}
		elseif (strpos($data['course']->name, '暑') !== FALSE)
		{
			$data['course']->prefix = '暑期班';
		}
		elseif (strpos($data['course']->name, '寒') !== FALSE)
		{
			$data['course']->prefix = '寒假班';
		}
		elseif (strpos($data['course']->name, '钻石') !== FALSE)
		{
			$data['course']->prefix = '钻石班';
		}
		else
		{
			$data['course']->prefix = '业余制';
		}

		$this->load->model('courses/class_model');

		$where = array(
					'courseid' => $id,
					'begindate>=' => date("Y-m-d", time())
					);

		$data['class_list'] = $this->class_model
						->order_by('begindate')
						->limit(10)
						->get_class_branch($where);

		$data['count'] = $this->class_model->count_class_branch($where);



		$this->course_model->update_viewnum($id);

		$this->load->view('courses/course', $data);
	}

	public function get_class_json()
	{
		$course = $this->input->post('course');
		$offset = $this->input->post('offset');

		$this->load->model('courses/class_model');

		$where = array(
					'courseid' => $course,
					'begindate>=' => date("Y-m-d", time())
					);

		$class_list = $this->class_model
						->order_by('begindate')
						->limit(10, $offset)
						->get_class_branch($where);

		output_json($class_list);

	}

}