<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model {

	function __construct()
	{
  		parent::__construct();
		$this->load->database();
	}
	
	
	public function get_item()
	{		
	}
}

