<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();


	}

	public function page_missing()
	{
		$this->load->view('errors/page_missing');
	}


}	

