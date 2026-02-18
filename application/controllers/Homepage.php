<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('dd');
	}
	
	
	public function index()
	{
		

		$toview['content'] = $this->load->view('homepage', null, true);
		$this->load->view('main', $toview);
	}
}
