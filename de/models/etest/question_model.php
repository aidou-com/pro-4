<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_model extends CI_Model {

	function __construct()
	{
  		parent::__construct();
		$this->db = $this->load->database('etest2013', true);
	}
	
	
	public function get_question_list($paperid, $itemid = 5, $testid = NULL, $result = FALSE)
	{		
		if( empty($paperid))
		{
			return FALSE;
		}
		$pre_count = $this->_get_pre_count($paperid, $itemid);
		
		$this->db->select('a.answerid, a.answer, q.questionid, q.question, q.answer_type, q.answer_num, q.readingid, q.listeningid, s.subject');
		if ( ! empty($testid))
		{
			if ($result == TRUE)
			{
			//	$this->db->select('a.isright, q.point');
				$this->db->select('a.isright, ta.answerid AS ta_answerid, ta.answer_text, q.point');
			}
			else
			{
				$this->db->select('ta.answerid AS ta_answerid, ta.answer_text, q.point');
			}
			
		}
		if ($result == TRUE)
		{
			$this->db->select('a.isright, q.point');
			
		}
		$this->db->from('test_question AS q');
		if ( ! empty($testid))
		{
			$this->db->join('test_test_answer AS ta', "q.questionid=ta.questionid AND ta.testid='$testid'", 'left');
		}
		$this->db->join('test_answer AS a',  'a.questionid=q.questionid');
		$this->db->join('test_paper_question AS pq', 'q.questionid=pq.questionid');
		$this->db->join('test_subject AS s', 'q.subjectid=s.subjectid');
		$this->db->join('test_paper_regulation AS pr', 'pr.paper_regulationid=pq.paper_regulationid');
		$this->db->where('pq.paperid', $paperid);
		if( ! empty($itemid))
		{
			$this->db->where('pr.itemid', $itemid);
		}
		$this->db->order_by('pq.paper_questionid', 'asc');
		$this->db->order_by('a.answerid', 'asc');
		$this->db->limit(2000);
		$query = $this->db->get();
		
		$last_questionid = 0 ;
		$i = -1;
		$last_readingid = 0;
		$last_listeningid = 0;
		$last_subject = '';
		$k = 0;
		
		$pre_subject_count = isset($pre_count->subject_count) ? $pre_count->subject_count : 0;
		$pre_quesiton_count = isset($pre_count->count) ? $pre_count->count : 0;
		
		$question_list = array();
		$listening_list = array();
		
		foreach($query->result_array() as $question)
		{
			if($question['questionid'] == $last_questionid)
			{
				$j++;
			}
			else
			{
				$i++;
				$j=0;

				$last_questionid = $question['questionid'];
				if($question['subject'] == $last_subject )
				{
					$question_list[$i]['subject'] = '';
				}
				else
				{
					$k++;
					$question_list[$i]['subject_no'] = $k + $pre_subject_count;
					$question_list[$i]['subject'] = $question['subject'];
					$last_subject = $question_list[$i]['subject'];				
				}	

			}
	
			if($question['readingid'] != $last_readingid)
			{
				$question_list[$i]['reading'] =  $this->get_reading($question['readingid']);
				$last_readingid = $question['readingid'];

			}
	
	
			if($question['listeningid'] != $last_listeningid)
			{		
				if (!in_array($question['listeningid'], $listening_list)){ 
					$listening_list[] = $question['listeningid'];
					$question_list[$i]['listening'] =  $this->get_listening($question['listeningid']);		
					$last_listeningid = $question['listeningid'];
				}
			}
	
			$answer = array();
			$answer['answerid'] = $question['answerid'];
			$answer['answer'] = $question['answer'];
			if ( ! empty($testid) && $result == TRUE)
			{
				$answer['isright'] = $question['isright'];
			}
			if ( $result == TRUE)
			{
				$answer['isright'] = $question['isright'];
			}
			$answer['qno'] = 1+$j;
			$question_list[$i]['answers'][] = $answer;


			if ( $result == TRUE)
			{
				$question_list[$i]['point'] = $question['point'];
			}
			
			$question_list[$i]['questionid'] = $question['questionid'];
			$question_list[$i]['question'] = $question['question'];
			$question_list[$i]['answer_type'] = $question['answer_type'];
			$question_list[$i]['answer_num'] = $question['answer_num'];
			$question_list[$i]['questionno'] = $i+1+$pre_quesiton_count;	
			
			if ( ! empty($testid))
			{
				$question_list[$i]['point'] = $question['point'];
	
				$my_answer = array();
				$my_answer['answerid'] = $question['ta_answerid'];
				$my_answer['answer'] = $question['answer_text'];
				$question_list[$i]['my_answer'] = $my_answer;
			}
		}
		return $question_list;
//		print_r($question_list);exit;
		
	}
	
	protected function _get_pre_count($paperid, $itemid)
	{
		if (empty($paperid))
		{
			return FALSE;
		}
		$this->db->select('COUNT(subjectid) AS subject_count');
		$this->db->select_sum('count');
		$this->db->from('test_paper_regulation');
		$this->db->where('paperid', $paperid);
		$this->db->where('itemid <', $itemid);
		$this->db->where('itemid >', 0);			
		$this->db->order_by('itemid', 'asc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_reading($readingid)
	{
		$this->db->select('reading');
		$this->db->where('readingid', $readingid);
		$query = $this->db->get('test_reading');
		$reading = $query->row();
		if (empty ($reading))
		{
			return FALSE;
		}
		else
		{
			return $reading->reading;
		}
	}
	
	function get_listening($listeningid)
	{
		$this->db->select('security_filename AS voice,listening_img AS img');
		$this->db->where('listeningid', $listeningid);
		$query = $this->db->get('test_listening');
		
		return $query->row_array();
	}
}

