<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property LksModel $LksModel
 * 
 */


class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('LksModel');

		$this->load->helper('dd');
	}
	
	
	public function index()
	{
		// fetch all LKS
		$data['lkses'] = $this->LksModel->fetchAll();

		// dd($data);

		$toview['content'] = $this->load->view('homepage', $data, true);
		$this->load->view('main', $toview);
	}
}
