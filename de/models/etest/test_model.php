<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model {

	function __construct()
	{
  		parent::__construct();
		$this->db = $this->load->database('etest2013', true);
	}
	
	public function check_child_test_unfinish($pid, $uid)
	{
		$this->db->from('test_paper');
		$this->db->where('pid', $pid);
		$count_paper = $this->db->count_all_results();
		
		$this->db->from('test_test');
		$this->db->join('test_paper', 'test_paper.paperid = test_test.paperid');
		$this->db->where('pid', $pid);
		$this->db->where('uid', $uid);
		$this->db->where('finish_time > 0');
		$count_test = $this->db->count_all_results();

		if ($count_paper > $count_test)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function create_report($data = array())
	{	
		if ( empty($data))
		{
			return FALSE;
		}		
	
		if (empty($data['testid']))
		{
			return FALSE;
		}
		
		$data = array(
			'testid'	=>	$data['testid'],
			'item'	=> $data['item'],
			'score'	=> $data['score'],
			'level'	=>	$data['level'],
			'add_time'	=>	$data['add_time'],
			);
			
		$this->db->insert('test_report', $data);
		$reportid = $this->db->insert_id();
		
		
		if(empty($reportid))
		{
			return FALSE;
		}
		else
		{
			return $reportid;
		}
	
	}
	
	public function create_report_item($data = array())
	{	
		if ( empty($data))
		{
			return FALSE;
		}		
	
		if (empty($data['testid']))
		{
			return FALSE;
		}
		
		$data = array(
			'testid'	=>	$data['testid'],
			'itemid'	=> (int) $data['itemid'],
			'score'	=> (int) $data['score'],
			'add_time'	=>	$data['add_time'],
			'add_uid'	=>	$data['add_uid'],
			);
			
		$this->db->insert('test_report_item', $data);
		$report_itemid = $this->db->insert_id();
		
		
		if(empty($report_itemid))
		{
			return FALSE;
		}
		else
		{
			return $report_itemid;
		}
	
	}
	
	public function get_item_done_count($testid, $itemid)
	{
	
		$this->db->from('test_question');
		$this->db->join('test_test_answer AS ta', 'test_question.questionid=ta.questionid');
	//	$this->db->join('test_answer AS a', 'a.questionid=test_question.questionid AND a.answerid=ta.answerid AND a.isright=1');
		$this->db->join('test_test AS t', 't.testid=ta.testid');
		$this->db->join('test_paper_question AS pq', 'test_question.questionid=pq.questionid AND pq.questionid=ta.questionid');
		$this->db->join('test_paper_regulation AS pr', 'pr.paper_regulationid=pq.paper_regulationid AND t.paperid=pr.paperid');
		$this->db->where('ta.testid', $testid);
		$this->db->where('ta.answerid !=', '');
		$this->db->where('itemid', $itemid);	
		/*
		$this->db->from('test_test_answer');
		$this->db->join('test_paper_question', 'test_test_answer.questionid = test_paper_question.questionid');
		$this->db->join('test_paper_regulation', 'test_paper_regulation.paper_regulationid = test_paper_question.paper_regulationid');
		$this->db->join('test_test', 'test_test.paperid = test_paper_question.paperid');
		
		$this->db->where('test_test_answer.testid', $testid);
		$this->db->where('test_paper_regulation.itemid', $itemid); */

		return $this->db->count_all_results();	
/*	
		$this->db->from('test_question');
		$this->db->join('test_test_answer AS ta', 'test_question.questionid=ta.questionid');
	//	$this->db->join('test_answer AS a', 'a.questionid=test_question.questionid AND a.answerid=ta.answerid AND a.isright=1');
		$this->db->join('test_test AS t', 't.testid=ta.testid');
		$this->db->join('test_paper_question AS pq', 'test_question.questionid=pq.questionid AND pq.questionid=ta.questionid');
		$this->db->join('test_paper_regulation AS pr', 'pr.paper_regulationid=pq.paper_regulationid AND t.paperid=pr.paperid');
		$this->db->where('ta.testid', $testid);
		$this->db->where('itemid', $itemid);	*/
	}
	
	public function get_report_by_paper($paperid, $uid)
	{
		if (empty($paperid) OR empty($paperid))
		{
			return FALSE;
		}
		$this->db->select('test_report.*, test_test.creation_time');
		$this->db->from('test_report');
		$this->db->join('test_test', 'test_test.testid = test_report.testid');
		$this->db->where('test_test.paperid', $paperid);
		$this->db->where('test_test.uid', $uid);
		$query = $this->db->get();
		return $query->row();
	
	}
	
	public function get_test_list($paperid = 0, $where=NULL, $page=NULL, $per_page=NULL)
	{
		
		
		$this->db->select('t.testid, t.paperid, t.creation_time, t.change_time, t.finish_time, t.score');			
		$this->db->from('test_test as t');
		if ( ! empty($paperid))
		{
			$this->db->where('t.paperid', $paperid);
		}
		else
		{
			$this->db->select('p.paper');
			$this->db->join('test_paper AS p', 'p.paperid=t.paperid AND pid=0');
		
		}
		if ( ! empty($where))
		{
			$this->db->where($where);
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
		$this->db->order_by('t.creation_time', 'desc');
		$query = $this->db->get();
		
		
		
		if ($query->num_rows() > 0)
		{
			$result = array();
			foreach ($query->result() as $row)
			{
				$row->testid = sprintf("%05s",$row->testid);
								
				if($row->finish_time > 0){
					$row->spend_time = max(intval(($row->finish_time - $row->creation_time)/60),1);
					$row->finish_time = date("Y-m-d H:i", $row->finish_time);
				}
				else
				{
					$row->spend_time= max(intval((time() - $row->creation_time)/60),1);
				}
				$row->creation_time = date("Y-m-d H:i", $row->creation_time);
				$result[] = $row;
			}

			return $result;
		}
		else
		{
			return FALSE;
		}
		
	}
	
	public function get_test_list_count($paperid = 0, $where=NULL)
	{		
		
		$this->db->from('test_test as t');
		if ( ! empty($paperid))
		{
			$this->db->where('t.paperid', $paperid);
		}
		else
		{
			$this->db->select('p.paper');
			$this->db->join('test_paper AS p', 'p.paperid=t.paperid');
		
		}
		if ( ! empty($where))
		{
			$this->db->where($where);
		}
		
		return $this->db->count_all_results();
		
	}
	
	public function get_unfinish_test($paperid, $uid)
	{

		if (empty($paperid) || empty($uid))
		{
			return FALSE;
		}
		$this->db->select('testid, creation_time, change_time, finish_time');
		$this->db->where('paperid', $paperid);
		$this->db->where('uid', $uid);
		$this->db->where('finish_time', 0);
		$query = $this->db->get('test_test');
		return $query->row();
	}
	
	public function get_test($testid)
	{

		if (empty($testid))
		{
			return FALSE;
		}
		$this->db->select('*');
		$this->db->where('testid', $testid);
		$query = $this->db->get('test_test');
		return $query->row();
	}
	
	public function get_test_by_user($paperid, $uid)
	{
		if (empty($paperid) OR empty($uid))
		{
			return FALSE;
		}
		$this->db->select('*');
		$this->db->where('paperid', $paperid);
		$this->db->where('uid', $uid);
		$query = $this->db->get('test_test');
		return $query->row();	
	}
	
	public function add_test($paperid, $uid)
	{
		if (empty($paperid) || empty($uid))
		{
			return FALSE;
		}
		$data = array(
					'paperid'		=> $paperid,
					'uid'			=> $uid,
					'ip'			=> $this->input->ip_address(),
					'score'			=> 0,
					'creation_time'			=> time(),
					'change_time'	=> 0,
					'finish_time'	=> 0
					);
		$this->db->insert('test_test', $data); 
		return $this->db->insert_id();
	}
	
	public function save_test($temp_data, $testid)
	{
		
		if (empty($temp_data) || ! is_array($temp_data) || empty($testid))
		{
			return FALSE;
		}
		
			
		
		foreach($temp_data as $data)
		{
			$this->db->select('test_answerid, answerid, answer_text');
			$this->db->where('testid', $testid);
			$this->db->where('questionid', $data['questionid']);
			$query = $this->db->get('test_test_answer');
			
			
			if ($query->num_rows() > 0)
			{
				$test_answer = $query->row();
				$dbdata = array(
							'answerid'	=>	$data['answerid'],
							'answer_text'	=>	'',
							'change_time'	=>	time()
							);
				$this->db->where('test_answerid', $test_answer->test_answerid);
				$this->db->update('test_test_answer', $dbdata); 
				
				
			}
			else
			{
			
			
				$dbdata = array(
							'testid'	=>	$testid,
							'questionid'	=>	$data['questionid'],
							'answerid'	=>	$data['answerid'],
							'answer_text'	=>	'',
							'creation_time'	=>	time(),
							'change_time'	=>	0,
							'reaction_time'	=>	0
							);
							
				$this->db->insert('test_test_answer', $dbdata); 

				
			}
			
			
		
		}
	
	}
	
	public function finish_test($testid)
	{
		
		
		if (empty($testid))
		{
			return FALSE;
		}
		

		$test = $this->get_test($testid);		
		if (empty($test))
		{
			return FALSE;
		}

		if ($test->finish_time > 0)
		{
			return FALSE;
		}
		
		$this->load->model('test/paper_model');
		$paper = $this->paper_model->get_paper($test->paperid);
		
		$item_list = $this->paper_model->get_item_list($paper->paperid);
		
		if ($paper->score_type == '1')
		{
			$point_source = 'regulation';
			
		}
		else
		{
			$point_source = 'question';
		}
		$paper_score = 0;
		foreach($item_list as $item)
		{

			
			$score = $this->get_item_score($testid, $item->itemid, $point_source);
			switch ($item->itemid)
			{
				case 1:
					$score = round($score/40*60);
					break;
				case 3:
					$score = round($score/77*100);
					break;
				case 4:
					$score = round($score/62*70);
					break;			
			}
			$data = array(
					'testid'	=>	$testid,
					'itemid'	=> $item->itemid,
					'score'	=> $score,
					'add_time'	=>	time(),
					'add_uid'	=>	$this->session->userdata('uid'),
					);
					
			$this->create_report_item($data);
			$paper_score += $score;
			
		}
		
/*		
		$this->db->select_sum('test_paper_regulation.point');
		$this->db->from('test_test_answer AS ta');
		$this->db->join('test_question AS q', 'q.questionid=ta.questionid');
		$this->db->join('test_answer AS a', 'a.questionid=q.questionid AND a.isright=1');
		$this->db->join('test_paper_question AS pq', 'q.questionid=pq.questionid');
		$this->db->join('test_paper_regulation', 'test_paper_regulation.paper_regulationid=pq.paper_regulationid');
		$this->db->where('ta.testid', $testid);
		
		$query = $this->db->get();
		
		$row = $query->row();
		$row->point = $row->point ? $row->point : 0;
*/
		$hold_finish_time = $paper->timer * 60 + $test->creation_time;
		
		if( $paper->timer > 0 && $hold_finish_time < time())
		{
			$finish_time = $hold_finish_time;
		}
		else
		{
			$finish_time = time();
		}
		$data = array(
					'finish_time' => $finish_time, 
					'score' => $paper_score
					);
					
		$this->db->where('testid', $testid);		
		$this->db->update('test_test', $data);

		if($paper->pid > 0)
		{
			$return = $this->check_child_test_unfinish($paper->pid, $this->session->userdata('uid'));
			
			if ($return == TRUE){
			
				$parent_test = $this->get_test_by_user($paper->pid, $this->session->userdata('uid'));	
				
				$item_score_list = $this->get_child_item_score_list($paper->pid, $this->session->userdata('uid'));
				
				$paper_score = 0;
				foreach ($item_score_list as $list)
				{
					$paper_score += $list['score'];
				}
				
				$parent_paper = $this->paper_model->get_paper($paper->pid);
				
				$level = $this->get_score_level($paper_score, $parent_paper->scoreid);
	
				$data = array(
					'testid'	=>	$parent_test->testid,
					'item'	=> serialize($item_score_list),
					'score'	=> $paper_score,
					'level'	=>	$level->level,
					'add_time'	=>	time(),
					);
				$this->create_report($data);
				
				$data = array(
					'finish_time'	=>	time(),
					);
				$this->db->where('testid', $parent_test->testid);
				$this->db->update('test_test', $data);
				
			}

		}
		else
		{
			$item_score_list = $this->get_item_score_list($paper->paperid, $this->session->userdata('uid'));
			$paper_score = 0;
			foreach ($item_score_list as $list)
			{
				$paper_score += $list['score'];
			}
			
			$level = $this->get_score_level($paper_score, $paper->scoreid);
		
			$data = array(
					'testid'	=> $testid,
					'item'	=> serialize($item_score_list),
					'score'	=> $paper_score,
					'level'	=>	$level->level,
					'add_time'	=>	time(),
					);
			$this->create_report($data);	
			
		
		}
	}
	
	public function get_item_score($testid, $itemid, $point_source = 'regulation')
	{
		if ($point_source == 'regulation')
		{
			$this->db->select_sum('test_paper_regulation.point');
		}
		else
		{
			$this->db->select_sum('test_question.point');
		}
		$this->db->from('test_question');
		$this->db->join('test_test_answer AS ta', 'test_question.questionid=ta.questionid');
		$this->db->join('test_answer AS a', 'a.questionid=test_question.questionid AND a.answerid=ta.answerid AND a.isright=1');
		$this->db->join('test_test AS t', 't.testid=ta.testid');
		$this->db->join('test_paper_question AS pq', 'test_question.questionid=pq.questionid AND pq.questionid=ta.questionid');
		$this->db->join('test_paper_regulation AS pr', 'pr.paper_regulationid=pq.paper_regulationid AND t.paperid=pr.paperid');
		$this->db->where('ta.testid', $testid);
		$this->db->where('itemid', $itemid);
		
		$query = $this->db->get();
		$row = $query->row();
		return $row->point;	
	}
	
	public function get_item_score_list($paperid, $uid)
	{
		$this->db->select('test_report_item.report_itemid, test_report_item.itemid, test_report_item.score, test_item.item, test_item.point');
		$this->db->from('test_report_item');
		$this->db->join('test_item', 'test_item.itemid = test_report_item.itemid');
		$this->db->join('test_test', 'test_test.testid = test_report_item.testid');
		$this->db->join('test_paper', 'test_paper.paperid = test_test.paperid');
		$this->db->where('test_paper.paperid', $paperid);
		$this->db->where('test_test.uid', $uid);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function get_child_item_score_list($pid, $uid)
	{
		$this->db->select('test_report_item.report_itemid, test_report_item.itemid, test_report_item.score, test_item.item, test_item.point');
		$this->db->from('test_report_item');
		$this->db->join('test_item', 'test_item.itemid = test_report_item.itemid');
		$this->db->join('test_test', 'test_test.testid = test_report_item.testid');
		$this->db->join('test_paper', 'test_paper.paperid = test_test.paperid');
		$this->db->where('test_paper.pid', $pid);
		$this->db->where('test_test.uid', $uid);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function get_score_level($score, $scoreid)
	{
		$this->db->select('level');
		$this->db->where('scoreid', $scoreid);
		$this->db->where('lower <=', $score);
		$this->db->where('upper >=', $score);
		$query = $this->db->get('test_score_level');
		return $query->row();
	
	}
	
	
	public function re_calculate_test($testid)
	{
		
		
		if (empty($testid))
		{
			return FALSE;
		}
		

		$test = $this->get_test($testid);		
		if (empty($test))
		{
			return FALSE;
		}

		
		$this->load->model('test/paper_model');
		$paper = $this->paper_model->get_paper($test->paperid);
		
		$item_list = $this->paper_model->get_item_list($paper->paperid);
		
		if ($paper->score_type == '1')
		{
			$point_source = 'regulation';
			
		}
		else
		{
			$point_source = 'question';
		}
		$paper_score = 0;
		foreach($item_list as $item)
		{

			
			$score = $this->get_item_score($testid, $item->itemid, $point_source);
			switch ($item->itemid)
			{
				case 1:
					$score = round($score/40*60);
					break;
				case 3:
					$score = round($score/77*100);
					break;
				case 4:
					$score = round($score/62*70);
					break;			
			}
			$data = array(
					'score'	=> $score,
					);
					
			$this->db->where('testid', $testid);
			$this->db->where('itemid', $item->itemid);		
			$this->db->update('test_report_item', $data);

			$paper_score += $score;
			
		}
		
/*		
		$this->db->select_sum('test_paper_regulation.point');
		$this->db->from('test_test_answer AS ta');
		$this->db->join('test_question AS q', 'q.questionid=ta.questionid');
		$this->db->join('test_answer AS a', 'a.questionid=q.questionid AND a.isright=1');
		$this->db->join('test_paper_question AS pq', 'q.questionid=pq.questionid');
		$this->db->join('test_paper_regulation', 'test_paper_regulation.paper_regulationid=pq.paper_regulationid');
		$this->db->where('ta.testid', $testid);
		
		$query = $this->db->get();
		
		$row = $query->row();
		$row->point = $row->point ? $row->point : 0;
*/
		$data = array(
					'score' => $paper_score
					);
					
		$this->db->where('testid', $testid);		
		$this->db->update('test_test', $data);

		if($paper->pid > 0)
		{
			$return = $this->check_child_test_unfinish($paper->pid, $test->uid);
			
			if ($return == TRUE){
			
	
				$parent_test = $this->get_test_by_user($paper->pid, $test->uid);	
				
				$item_score_list = $this->get_child_item_score_list($paper->pid, $test->uid);
				
				$paper_score = 0;
				foreach ($item_score_list as $list)
				{
					$paper_score += $list['score'];
				}
				
				$parent_paper = $this->paper_model->get_paper($paper->pid);
				
				$level = $this->get_score_level($paper_score, $parent_paper->scoreid);
	
				$data = array(
					'item'	=> serialize($item_score_list),
					'score'	=> $paper_score,
					'level'	=>	$level->level,
					);
				$this->db->where('testid', $parent_test->testid);	
				$this->db->update('test_report', $data);
				//$this->create_report($data);
				

				
			}

		}
		else
		{
			$item_score_list = $this->get_item_score_list($paper->paperid, $this->session->userdata('uid'));
			$paper_score = 0;
			foreach ($item_score_list as $list)
			{
				$paper_score += $list['score'];
			}
			
			$level = $this->get_score_level($paper_score, $paper->scoreid);
		
			$data = array(
					'item'	=> serialize($item_score_list),
					'score'	=> $paper_score,
					'level'	=>	$level->level,
					);
			$this->db->where('testid', $testid);	
			$this->db->update('test_report', $data);
			
			
		
		}
	}
	

}

